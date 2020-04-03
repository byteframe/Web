<?php
  include_once("pdl-common.php");

  if (!isset($_SESSION['dictW']) && !isset($_GET['dictW'])) {
    $_GET['dictW'] = "dirty";
  } else if (isset($_GET['dictW'])) {
    $_GET['dictW'] = preg_replace("/[^a-zA-Z0-9\s]/","",$_GET['dictW']);
  }

  if (isset($_GET['dictW']) && (!isset($_SESSION['dictW'])
  || !strcasecmp($_GET['dictW'],$_SESSION['dictW']) == 0)) {
    $_SESSION['dictW'] = $_GET['dictW'];
    $output = str_replace("\n","",
      proc_output("dict -d wn ".strtolower($_SESSION['dictW']),FALSE));
////////////////////////////////////////////////////////////////////////////////
    if (strpos($output,"No definitions found ") > -1) {
      if ($i = strpos($output,":")) {
        $_SESSION['dict'] = substr($output,0,$i+1)."<br/>\n";
        $words = explode("  ",substr($output,$i+6));
        foreach ($words as &$word) {
          $_SESSION['dict'] .= "<a href=\"?dictW=".$word."\">".$word."</a>\n";
        }
        $_SESSION['dict'] = $output."\n";
      }
    } else {
      for ($i = strpos($output,": ")+2; $i < strlen($output);) {
        $s = strpos($output,"[",$i);
        if ($s < 1) {
          break;
        }
        $e = strpos($output,"]",$s)+1;
        $output = str_replace(substr($output,$s,($e-$s)),"",$output);
        $i = $s;
      }
      $output = preg_replace('/\s\s+/'," ",$output);
      $a = array(strpos($output,": ")+2);
      if ($i = strpos($output," adj ")) {
        array_push($a,$i);
      }
      if ($i = strpos($output," n ")) {
        array_push($a,$i);
      }
      if ($i = strpos($output," v ")) {
        array_push($a,$i);
      }
      $_SESSION['dict'] = "";//<b><i><span style=\"font-size: 12pt;\">".$_SESSION['dictW']."</span></i></b><br/>\n";//"<b>".substr($output,$a[0],$a[1]-$a[0])."</b><br/>\n";
      for ($i = 1; $i < count($a); $i++) {
        $n = strlen($output);
        if (isset($a[$i+1])) {
          $n = $a[$i+1];
        }
        $segment = substr($output,$a[$i]+1,$n-$a[$i]);
$segment = preg_replace("/ 1*: /",":</b> ",$segment);
        $segment = preg_replace('/[0-9]+:/',"<br/>\n<b>$0</b>",$segment);
        //$segment = str_replace(' "'," \"<i>",$segment);
        //$segment = str_replace('"',"</i>\"",$segment);
        $_SESSION['dict'] .= "<b>".$segment."<br/>\n";
      }
    }
  }

  echo
  "<form action=\"\" id=\"dict\" method=\"get\">\n".
  "<div id=\"dictionary\">\n".
  "  <input name=\"dictW\" value=\"".$_SESSION['dictW']."\"/>\n".
  "  <input type=\"submit\" value=\"Find\" />\n".
  "  <hr/>\n".
  "</div>\n".
  "</form>\n".
  $_SESSION['dict']."<br/><br/>\n";
?>
