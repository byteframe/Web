<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
    <?php
      echo "<title>Source :: ".$_GET['main']." - ".$_GET['app']."</title>\n";
    ?>
  </head>

  <body>
    <?php
      echo
      "<pre>\n".
      htmlspecialchars(file_get_contents(
        "http://".$_SERVER['SERVER_ADDR']."/primarydataloop/?main=".$_GET['main']."&app=".$_GET['app'])).
      "</pre>\n";
    ?>
  </body>
<html>
