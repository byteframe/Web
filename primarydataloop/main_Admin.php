<?php
  include_once("pdl-common.php");

  if (!isset($_SESSION['admin_nav'])) {
    $_SESSION['admin_nav'] = "";
  }

  if (strpos($_SERVER["REMOTE_ADDR"],"192.168.1.") > -1
  || $_SERVER["REMOTE_ADDR"] == $wan_ip) {
    if (isset($_GET['httpd'])) {
      if ($_GET['httpd'] == "Error Log") {
        $_SESSION['admin_nav'] = "httpderror";
      } else if ($_GET['httpd'] == "Access Log") {
        $_SESSION['admin_nav'] = "httpdaccess";
      } else if ($_GET['httpd'] == "back") {
        $_SESSION['admin_nav'] = "";
      }
    }
    if ($_SESSION['admin_nav'] == "httpderror"
    || $_SESSION['admin_nav'] == "httpdaccess") {
      echo
      "<div style=\"float: right;\">\n".
      "  <a href=\"?httpd=back\">(Back)</a>\n".
      "</div>\n";
      if ($_SESSION['admin_nav'] == "httpderror") {
        echo "<b>httpd error_log</b>\n";
        $p = proc_output("tail -n 2000 /var/log/httpd/error_log");
        echo
        "<hr/>\n".
        "<span style=\"font-size: x-small;\">\n".
        $p."<br/>\n".
        "</span>\n";
      } else if ($_SESSION['admin_nav'] == "httpdaccess") {
        echo "<b>httpd access_log</b>\n";
        $p = proc_output("tail -n 400 /var/log/httpd/access_log".
          " | grep -v ".$wan_ip." | grep -v 192.168.1.101");
        echo
        "<hr/>\n".
        "<span style=\"font-size: x-small;\">\n".
        $p."<br/>\n".
        "</span>\n";
      }
    } else {
      $p = proc_output("uptime");
      echo
      "<b>".$_SERVER['SERVER_NAME']." (".$wan_ip.")</b><br/>\n".
      "<hr/>\n".
      substr($p,10)."<br/>\n".
      "<br/>\n";
      $p = proc_output("df -h / /mnt/Datavault");
      echo
      $p."<br/>\n".
      "<br/>\n";
      $p = explode("<br/>\n",proc_output("/usr/sbin/httpd -v"));
      echo
      "<b>httpd (Version ".substr($p[0],23,-7).")</b><br/>\n".
      "<hr/>\n".
      "<form id=\"apache\" method=\"get\">\n".
      "  <input name=\"httpd\" type=\"submit\" value=\"Access Log\"/>\n".
      "  <input name=\"httpd\" type=\"submit\" value=\"Error Log\"/>\n".
      "</form>\n".
      "<br/>\n".
      "<b>Samba (".proc_output("smbclient --version").")</b><br/>\n".
      "<hr/>\n";
      $p = proc_output("/usr/bin/smbstatus | grep \"Datavault/Video\"".
      " | grep -v \"x100081\" | grep -v \"randumb\"");
      if (empty($p)) {
        echo "<i>No Locked Files</i><br/>\n";
      } else {
        $p = explode("<br/>\n",$p);
        foreach ($p as &$o) {
          echo substr($o,strrpos($o,"/")+1,-27)."<br/>";
        }
      }
      echo
      "<br/>\n".
      "<b>Users</b><br/>\n".
      "<hr/>\n";
      //db
    }
  } else {
    echo
    "<p style=\"text-align: center;\">\n".
    "  <h4>Access Denied</i></h4>\n".
    "</p>\n";
  }
?>
