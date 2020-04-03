<?php
  $full = false;
  if (!isset($_SERVER["REMOTE_ADDR"])) {
    $full = true;
  }

  if ($full) {
    echo
    "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n".
    "  \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n".
    "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n".
    "  <head>\n".
    "    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\"/>\n".
    "    <style type=\"text/css\">\n".
    "      #resume { font-family: sans-serif; }\n".
    "      #resume a { font-style: italic; }\n".
    "      #resume table { border-collapse: collapse; }\n".
    "      #resume td, #resume th { border-top: 2px solid #000; }\n".
    "      #resume td { padding-right: 0.5em; }\n".
    "      #resume th { padding-left: 0.5em; background: #ccc; font-style: italic;\n".
    "        text-align: right; vertical-align: top; }\n".
    "      #resume ul { padding-left: 3em; }\n".
    "    </style>\n".
    "    <title>Resume</title>\n".
    "  </head>\n".
    "  <body>\n".
    "    <div id=\"resume\">\n";
  } else {
    $indent = 10;
    echo "<div id=\"main_resume\">\n";
  }

  if ($full) {
    echo
    "      <big><b>byteframe</b></big><br/>\n".
    "      ISS<br/>\n";
  } else {
    echo
    "      <big><b>primarydataloop</b></big><br/>\n".
    "      ISS<br/>\n";
  }

  if ($full) {
    echo
    "  </body>\n".
    "</html>\n";
  }
?>
