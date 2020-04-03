<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <link href="../css/base.css" rel="stylesheet" type="text/css"></link>
    <link href="../css/system_checker.css" rel="stylesheet" type="text/css"></link>
    <title>SYSTEM CHECKER</title>
  </head>

  <body>
    <div id="main">
      <div id="title">
        <img src="../images/system_checker/system_checker_title.png"></img>
      </div>
      
<%@   page import="java.util.Date" %>
<%
      Date the_date = new Date();
      String my_os = System.getProperty("os.name");
      String my_os_arch = System.getProperty("os.arch");
      String my_browser = request.getHeader("User-Agent");
      String java_version = System.getProperty("java.version");
%>
      <div id="scorecard">
        <h3 class="scorecard_header">
          SYSTEM CHECKER Initialized. Beep. <br />
          Test Started: <%= the_date %>
        </h3>
        <ul>
          <li>Operating System:      <%= my_os %>        </li>
          <li>Computer Architecture: <%= my_os_arch %>   </li>
          <li>Browser Type:          <%= my_browser %>   </li>
          <li>Java Version:          <%= java_version %> </li>
        </ul>
      </div>
    
      <div id="icons">
<%    
      if (my_os.substring(0,5).equals("Linux"))
          %><img class="os_image" src="../images/tux.png"></img><%
      else if (my_os.substring(0,7).equals("Windows"))
          %><img class="os_image" src="../images/system_checker/windows_xp_logo.png"></img><%
      else
          %><img class="os_image" src="../images/system_checker/rotten_apple.png"></img><%

      if (my_browser.substring(0,7).equals("Mozilla"))
          %><img class="my_browser_image" src="../images/system_checker/firefox_logo.png"></img><%
      else
          %><img class="my_browser_image" src="../images/system_checker/ie_logo.png"></img><%

      if (java_version.substring(0,3).equals("1.5"))
          %><img class="java_image" src="../images/system_checker/java_yes.png"></img><%
      else
          %><img class="java_image" src="../images/system_checker/java_no.png"></img><%
%>
      </div>
    </div>
  <body>
</html>
