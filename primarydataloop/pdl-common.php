<?php
  include_once("pdl-config.php");

  if (!empty($_SERVER["REMOTE_ADDR"])) {
    session_start();
  }
  $wan_ip = gethostbyname($cfg_dns);

  $mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name,$db_port);
  if (mysqli_connect_errno()) {
    echo "fatal: ".mysqli_connect_error()."\n";
    exit();
  }

  function db_output($query)
  {
    global $mysqli;
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    $result->free();
    $mysqli->next_result();
    return $row;
  }

  function db_run($query)
  {
    global $mysqli;
    $result = $mysqli->query($query);
    $mysqli->next_result();
  }

  function indent_begin($_indent = NULL)
  {
    global $indent;
    if (isset($_indent)) {
      $indent = $_indent;
    }
    ob_start("mb_output_handler");
  }

  function indent_end()
  {
    global $indent;
    $output = split("\n",ob_get_contents());
    ob_end_clean();
    echo $output[0]."\n";
    for ($l = 1; $l < sizeof($output)-1; $l++) {
      echo str_repeat(" ",$indent).$output[$l]."\n";
    }
  }

  function proc_output($cmd, $brs = TRUE, $nls = TRUE)
  {
    $dspec = array(1 => array("pipe","w"),2 => array("pipe","w"));
    $proc = proc_open($cmd,$dspec,$pipes,NULL,NULL);
    $output = rtrim(fgets($pipes[1],512).fgets($pipes[2],512));
    while (($line = rtrim(fgets($pipes[1],512))) != NULL
    || ($line = rtrim(fgets($pipes[2],512))) != NULL) {
      if ($brs) {
        $output = $output."<br/>\n".$line;
      //} else {
      //  $output .= "\n".$line;
      } else {
        $output .= "\n".$line;
      }
    }
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($proc);
    return $output;
  }

  /*function proc_run()
  {
  
  }*/
?>
