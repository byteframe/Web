<?php
  include_once("user.php");

  if (!isset($_SESSION['fortune']) && $_SESSION['user'] > 0) {
    $row = db_output("CALL FortuneGet(".$_SESSION['user'].")");
    $_SESSION['fortune'] = $row[0];
    $_SESSION['fortuneT'] = $row[1];
  }
  if (!isset($_SESSION['fortune']) || isset($_GET['Fortune'])) {
    static $owners = array("A","My","Our","Everyone's","Some","Someone's","The",
      "The People's","Their","Your");
    static $nouns = array("Adage","Adagium","Apothegm","Axiom","Banality",
      "Dictum","Fortune","Nonsense","Non-Sequitor","Platitude","Proverb","Quip",
      "Witticism");
    $owner = $owners[array_rand($owners)];
    $noun = $nouns[array_rand($nouns)];
    if ($owner == "A" && substr($noun,0,1) == "A") {
      $owner = "An";
    }
    $_SESSION['fortuneT'] = $owner." ".$noun;
    $_SESSION['fortune'] = proc_output("/usr/games/fortune -s",FALSE);
    if ($_SESSION['user'] > 0) {
      db_run("CALL FortuneSet(".$_SESSION['user'].",'".
        $_SESSION['fortune']."','".$_SESSION['fortuneT']."')");
    }
  }

  echo
  "<div>\n".
  "  <a href=\"?Fortune\">(Another)</a>\n".
  "</div>\n".
  "<b>".$_SESSION['fortuneT'].":</b>\n".
  "<hr/>\n".
  $_SESSION['fortune']."\n";
?>
