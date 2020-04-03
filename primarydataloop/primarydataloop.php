<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <script src="pdl-at_domready.js" type="text/javascript"></script>
    <script src="pdl-clock.js" type="text/javascript"></script>
    <script src="pdl-external_link.js" type="text/javascript"></script>
    <link href="image/favicon.ico" rel="shortcut icon"/>
    <link href="primarydataloop.css" rel="stylesheet" type="text/css"/>
    <?php
      include_once("pdl-common.php");
      indent_begin(4);
      include_once("user.php");
      if (isset($_GET['main'])) {
        $_SESSION['main'] = $_GET['main'];
      } else if (!isset($_SESSION['main'])) {
        $_SESSION['main'] = "About";
      }
      if (isset($_GET['app'])) {
        $_SESSION['app'] = $_GET['app'];
      } else if (!isset($_SESSION['app'])) {
        $_SESSION['app'] = "Fortune";
      }
      if (file_exists("app_".$_SESSION['app'].".css")) {
        echo
        "<link href=\"app_".$_SESSION['app'].".css\" rel=\"stylesheet\" ".
        "type=\"text/css\"/>\n";
      }
      if (file_exists("main_".$_SESSION['main'].".css")) {
        echo
        "<link href=\"main_".$_SESSION['main'].".css\" rel=\"stylesheet\" ".
        "type=\"text/css\"/>\n";
      }
      echo "<title>primarydataloop :: ".$_SESSION['main']."</title>\n";
      indent_end();
    ?>
  </head>

  <body>
    <div id="container">
      <div class="col_left">
        <div class="shadow">
          <div class="outer">
            <div class="inner" id="inner_main">
              <?php indent_begin(14);
                include("main_".$_SESSION['main'].".php");
                indent_end();
              ?>
            </div>
          </div>
        </div>

        <div class="float_left" id="panel_icon">
          <?php indent_begin(10);
            $icon = array("Calendar","Converter","Dictionary","Fortune",
              "Notepad","Radio","Theme","Weather");
            foreach ($icon as &$app) {
              $o = "outer";
              if ($_SESSION['app'] == $app) {
                $o = "outer_icon_select";
              }
              echo
              "<div class=\"shadow_col_left\">\n".
              "  <div class=\"".$o."\">\n".
              "    <div class=\"inner_icon\">\n";
              $o = "<img alt=\"\" src=\"image/app_".$app.".png\" ".
              "title=\"".$app."\"/>";
              if ($_SESSION['app'] != $app) {
                $o = "<a href=\"?app=".$app."\">\n      ".$o."</a>";
              }
              echo
              "      ".$o."\n".
              "    </div>\n".
              "  </div>\n".
              "</div>\n";
            }
            indent_end();
          ?>
        </div>

        <div class="shadow_float_left">
          <div class="outer">
            <div class="inner" id="inner_apps"> 
              <?php indent_begin(14);
                include("app_".$_SESSION['app'].".php");
                indent_end();
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="float_left">
        <div class="shadow">
          <div class="outer">
            <div class="inner" id="inner_clock">
              <span id="clock">&nbsp;</span>
            </div>
          </div>
        </div>

        <div class="shadow">
          <div class="outer">
            <div class="inner" id="inner_menu">
              <?php indent_begin(14);
                $menu = array(
                  "About","Demos","Fun","Links","Misc","Resume","Writing");
                foreach ($menu as $main) {
                  if ($_SESSION['main'] != $main) {
                    $main = "<a href=\"?main=".$main."\">".$main."</a>";
                  }
                  echo
                  $main."\n".
                  "<hr/>\n";
                }
                if (strpos($_SERVER["REMOTE_ADDR"],"192.168.4.10") > -1
                || $_SERVER["REMOTE_ADDR"] == $wan_ip) {
                  if ($_SESSION['main'] == "Admin") {
                    echo " Admin\n";
                  } else {
                    echo "<a href=\"?main=Admin\">Admin</a>\n";
                  }
                  echo "<hr/>\n";
                }
                indent_end();
              ?>
            </div>
          </div>
        </div>

        <div class="shadow">
          <div class="outer">
            <div class="inner" id="inner_user">
              <?php indent_begin(14);
                include("user-form.php");
                indent_end();
              ?>
            </div>
          </div>
        </div>

        <div class="shadow">
          <div class="outer">
            <div class="inner" id="inner_logo">
              <div>
                <?php indent_begin(16);
                  echo
                  "<a href=\"view_source.php?main=".$_SESSION['main'].
                    "&amp;app=".$_SESSION['app']."\"\n".
                  "   rel=\"ext\">[view]</a>\n".
                  "<a href=\"http://validator.w3.org/check?uri=http://".$wan_ip.
                    "/%3Fmain=".$_SESSION['main']."%26app=".$_SESSION['app'].
                    "\"\n".
                  "   rel=\"ext\">[test]</a>\n";
                  indent_end();
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
