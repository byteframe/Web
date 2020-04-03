<?php
  include_once("pdl-common.php");

  function user_begin($user = -1, $wait = 4)
  {
    static $greetings = array("&iexcl;Bienvenidos!","Bonjour.","Bonjour!",
      "&iexcl;Buenos D&iacute;as!","Ch&agrave;o.","Ciao.","Greetings.",
      "Greetings!","Guten Tag.","Guten Tag!","Hallo.","Hallo!","Hall&oacute;.",
      "Hello.","Hello!","Hei.","Hej.","Hey!","Hey, Hey, Hey!","Hey You!","Hi.",
      "Hi!","&iexcl;Hola!","How Are You?","Kamusta.","Namaste.",
      "Nice to See You.","Nice to See You!","Ol&aacute;.","&iquest;Que Pasa?",
      "Salam.","Salut.","Shalom.","Shalom!","Sveiki.","Sveiki!","Tere.",
      "Welcome.","Welcome!","What's Up?","What's Up!?","Who Are You?",
      "Word Up.","Word Up!"
    );
    $_SESSION['user'] = $user;
    $_SESSION['userG'] = $greetings[array_rand($greetings)];
    $_SESSION['userT'] = $_SERVER['REQUEST_TIME'];
    $_SESSION['userW'] = $wait;
  }

  function user_login($userP)
  {
    $row = db_output("CALL UserLogin('".$_SESSION['userN']."','".$userP."')");
    if ($row[0] > 0) {
      $_SESSION['user'] = $row[0];
    } else {
      user_begin(-3);
    }
  }

  if (!isset($_SESSION['user'])) {
    user_begin();
  }

  if ($_SERVER['REQUEST_TIME'] - $_SESSION['userT'] >= $_SESSION['userW']) {
    if ($_SESSION['user'] < -1 && $_SESSION['user'] > -6) {
      $_SESSION['user'] = -1;
    }

    if (isset($_GET['user'])) {
      if ($_GET['user'] == "back") {
        if ($_SESSION['user'] == -7 || $_SESSION['user'] == -10) {
          $_SESSION['user'] = -1;
          unset($_SESSION['userN']);
        } else if ($_SESSION['user'] < -5) {
          $_SESSION['user']--;
          unset($_SESSION['userP']);
        } else if ($_SESSION['user'] > 0) {
          //logout $_SESSION = array(); || unset($_SESSION);
          user_begin(-2,8);
        }
      } else if ($_SESSION['user'] < 0 && $_SESSION['user'] > -6) {
        if ($_GET['user'] == "login") {
          $_SESSION['user'] = -7;
        } else if ($_GET['user'] == "register") {
          $_SESSION['user'] = -10;
        }
      }
    }

    if (isset($_POST['userN'])
    && strlen($_POST['userN']) > 0 && strlen($_POST['userN']) < 21
    && ($_SESSION['user'] == -7 || $_SESSION['user'] == -10)) {
      if (!ctype_alnum($_POST['userN'])) {
        $_SESSION['userN'] = preg_replace("/[^a-zA-Z0-9]/","",$_POST['userN']);
      } else if ($_SESSION['user'] == -10) {
        $row = db_output("CALL UserExists('".$_POST['userN']."')");
        if ($row[0] > 0) {
          user_begin(-4);
        } else {
          $_SESSION['user']++;
          $_SESSION['userN'] = $_POST['userN'];
        }
      } else {
        $_SESSION['user']++;
        $_SESSION['userN'] = $_POST['userN'];
      }
    }

    if (isset($_POST['userP'])
    && strlen($_POST['userP']) > 0 && strlen($_POST['userP']) < 21
    && ($_SESSION['user'] == -9 || $_SESSION['user'] == -6)) {
      if (!ctype_alnum($_POST['userP'])) {
        user_begin(-5);
        unset($_SESSION['userN']);
      } else if ($_SESSION['user'] == -9) {
        $_SESSION['user'] = -8;
        $_SESSION['userP'] = $_POST['userP'];
      } else {
        user_login($_POST['userP']);
        unset($_SESSION['userN']);
      }
    }

    if (isset($_POST['userC'])
    && strlen($_POST['userC']) > 0 && $_SESSION['user'] == -8) {
      if ($_SESSION['userP'] == $_POST['userC']) {
        db_run("CALL UserNew('".$_SESSION['userN']."','".$_POST['userC']."')");
        user_login($_POST['userC']);
      } else {
        user_begin(-5,8);
      }
      unset($_SESSION['userN']);
      unset($_SESSION['userP']);
    }
  }

  if ($_SERVER['REQUEST_TIME'] - $_SESSION['userT'] < $_SESSION['userW']) {
    $counter = $_SESSION['userW']-($_SERVER['REQUEST_TIME']-$_SESSION['userT']);
    echo
    "<script type=\"text/javascript\">\n".
    "  /* <![CDATA[ */\n".
    "  window.onDomReady(user_wait);\n".
    "  var interval = setInterval(\"user_wait()\",1000);\n".
    "  var c = ".$counter.";\n".
    "  function user_wait()\n".
    "  {\n".
    "    document.getElementById(\"user_wait\").innerHTML = ".
    "'Please Wait... ' + c;\n".
    "    if (c == 0) {\n".
    "      clearInterval(interval);\n".
    "      document.getElementById(\"user_title\").innerHTML = ".
    "'".$_SESSION['userG']."';\n".
    "      document.getElementById(\"user_wait\").innerHTML =\n".
    "        '<a href=\"?user=login\">&nbsp;Sign-In</a> | ' +\n".
    "        '<a href=\"?user=register\">Register</a>';\n".
    "    }\n".
    "    c = c-1;\n".
    "  }\n".
    "  /* ]]> */\n".
    "</script>\n";
  }
?>
