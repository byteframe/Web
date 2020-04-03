<?php
  include_once("pdl-common.php");

  if ($_SESSION['user'] == -7 || $_SESSION['user'] == -10) {
    $userN = "";
    if (isset($_SESSION['userN'])) {
      $userN = "value=\"".$_SESSION['userN']."\" ";
    }
    echo
    "<a href=\"?user=back\">&lt;</a> <b>Username</b>\n".
    "<a href=\"#\" onclick=\"document.forms['user'].submit()\">&gt;</a>\n".
    "<form action=\"\" id=\"user\" method=\"post\">\n".
    "  <div>\n".
    "    <input name=\"userN\" ".$userN."maxlength=\"20\" />\n".
    "  </div>\n".
    "</form>\n";
  } else if ($_SESSION['user'] == -6 || $_SESSION['user'] == -9) {
    echo
    "<a href=\"?user=back\">&lt;</a> <b>Password</b>\n".
    "<a href=\"#\" onclick=\"document.forms['user'].submit()\">&gt;</a>\n".
    "<form action=\"\" id=\"user\" method=\"post\">\n".
    "  <div>\n".
    "    <input name=\"userP\" maxlength=\"20\" type=\"password\"/>\n".
    "  </div>\n".
    "</form>\n";
  } else if ($_SESSION['user'] == -8) {
    echo
    "<a href=\"?user=back\">&lt;</a> <b>Confirm</b>\n".
    "<a href=\"#\" onclick=\"document.forms['user'].submit()\">&gt;</a>\n".
    "<form action=\"\" id=\"user\" method=\"post\">\n".
    "  <div>\n".
    "    <input name=\"userC\" maxlength=\"20\" type=\"password\"/>\n".
    "  </div>\n".
    "</form>\n";
  } else if ($_SESSION['user'] < 0) {
    if ($_SESSION['user'] == -5) {
      echo "<b><span id=\"user_title\">Bad Password!</span></b>\n";
    } else if ($_SESSION['user'] == -4) {
      echo "<b><span id=\"user_title\">Username Taken!</span></b>\n";
    } else if ($_SESSION['user'] == -3) {
      echo "<b><span id=\"user_title\">Login Failed!</span></b>\n";
    } else if ($_SESSION['user'] == -2) {
      echo "<b><span id=\"user_title\">Goodbye!</span></b>\n";
    } else {
      echo "<b><span id=\"user_title\">".$_SESSION['userG']."</span></b>\n";
    }
    echo "<div>\n";
    if ($_SERVER['REQUEST_TIME'] - $_SESSION['userT'] >= $_SESSION['userW']) {
      echo
      "  <a href=\"?user=login\">&nbsp;Sign-In</a> |\n".
      "  <a href=\"?user=register\">Register</a>\n";
    } else {
      echo "  <span id=\"user_wait\">Please Wait...</span>\n";
    }
    echo "</div>\n";
  } else {
    $row = db_output("CALL UserGet(".$_SESSION['user'].")");
    $o = "";/*$o = "Profile |";
    if ($_SESSION['main'] != "Profile") {
      $o = "<a href=\"?main=Profile\">Profile</a> |\n ";
    }*/
    echo
    "<b>".$row[0]."</b><br/>\n".
    "<div>\n".
    "  $o <a href=\"?user=back\">Logout</a>\n".
    "</div>\n";
  }
?>
