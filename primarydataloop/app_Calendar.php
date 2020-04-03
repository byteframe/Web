<?php
  include_once("pdl-common.php");

  $moon = proc_output("/usr/games/pom");
  echo
  "<div>\n".
  "  <b>".date("l").", ".date("M").". ".date("j").", ".date("o")."</b>\n".
  "  <hr/>\n".
  "  <i>".str_replace("<br/>\n",". ",proc_output("ddate").". ".$moon).".</i>\n".
  "</div>\n";

  $firstweekday = date("w",mktime(0,0,0,date("n"),1,date("o")));
  echo "<table cellspacing=\"0\" cellpadding=\"0\">\n";
  $day = -1;
  for ($r = 0; $r < 6; $r++) {
    if ($r%2) {
      echo "  <tr style=\"height: 15px; background: white;\">\n";
    } else {
      echo "  <tr style=\"height: 15px; background: #777; color: white;\">\n";
    }
    for ($c = 0; $c < 7; $c++) {
      echo "    <td style=\"width: 16px; padding-right: 2px; border-left: 1px solid #000;\">\n";
      if ($c == $firstweekday && $day == -1) {
        $day++;
      }
      if ($day > -1 && $day < date("t")) {
        $day++;
        if ($day == date("j")) {
          echo "      <span style=\"color: orange;\"><b>".$day."</b></span>\n";
        } else if ($day < date("j")) {
          echo "      <span style=\"text-decoration: line-through;\">".$day."</span>\n";
        } else {
          echo "      ".$day."\n";
        }
      }
      echo "    </td>\n";
    }
    echo "  </tr>\n";
  }
  echo "</table>\n";
?>
