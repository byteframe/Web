<?php
  include_once("pdl-common.php");

//'Foggy','Very Cold' 'Snow Showers'
  if (!isset($_SESSION['weather']) || isset($_SESSION['weather_time'])
    && time()-$_SESSION['weather_time'] > 300) {
    include_once("geoip/geoip.inc");
    include_once("geoip/geoipcity.inc");
    $geoip = geoip_open("geoip/GeoLiteCity.dat.gz",GEOIP_STANDARD);
    if (strpos($_SERVER["REMOTE_ADDR"],"192.168.1.") > -1) {
      $location = geoip_record_by_addr($geoip,"173.194.33.104");
    } else {
      $location = geoip_record_by_addr($geoip,$_SERVER['REMOTE_ADDR']);
    }
    geoip_close($geoip);
    if ($location->country_code == "US") {
      $data = file_get_contents("http://weather.noaa.gov/pub/data/forecasts/"
      ."city/".strtolower($location->region)."/"
      .str_replace(" ","_",strtolower($location->city)).".txt");
      $_SESSION['weather_title'] = $location->city.",".$location->region;
      if (strpos($data,"404 Not Found") > -1) {
        $web = file_get_contents("http://weather.noaa.gov/pub/data/forecasts/"
        ."city/".strtolower($location->region)."/");
        $web = explode("\n",$web);
        for ($w = 0; $w < count($web); $w++) {
          if (($i = strpos($web[$w],".txt\">")) > -1) {
            $j = strpos($web[$w],"</a>");
            $cities[$w] = substr($web[$w],$i+6,$j-$i-10);
          }
        }
        $random_city = $cities[array_rand($cities,1)];
        $_SESSION['weather_title'] = ucwords(str_replace("_"," ",$random_city))
        .",".$location->region;
        $data = file_get_contents("http://weather.noaa.gov/pub/data/forecasts/"
        ."city/".strtolower($location->region)."/".$random_city.".txt");
      }
      $_SESSION['weather_time'] = time();
    } else {
      $_SESSION['weather_title'] = "New York NY (".$location->country_code.","
      .$location->region." Fail)";
      $data = file_get_contents("http://weather.noaa.gov/pub/data/forecasts/"
      ."city/ny/new_york.txt");
    }
    $data = array_slice(explode("\n",rtrim($data)),5);
    $_SESSION['weather'] = "";
    foreach ($data as &$d) {
      $_SESSION['weather'] .= substr($d,1,3).",";
      if (($i = stripos($d,"Low "))) {
        $_SESSION['weather'] .= "Low,";
        preg_match("/[,.]/",$d,$m,PREG_OFFSET_CAPTURE,$i+4);
        $_SESSION['weather'] .= substr($d,$i+4,$m[0][1]-($i+4)).",";
      } else if (($i = stripos($d,"High "))) {
        $_SESSION['weather'] .= "Hi,";
        preg_match("/[,.]/",$d,$m,PREG_OFFSET_CAPTURE,$i+5);
        $_SESSION['weather'] .= substr($d,$i+5,$m[0][1]-($i+5)).",";
      }
      if (strpos($d,"night")) {
        $_SESSION['weather'] .= "Night,";
      } else {
        $_SESSION['weather'] .= "Day,";
      }
      if (!stripos($d,"... High") && !stripos($d,"... Low")) {
        $l = strpos($d,"... ")+4;
        $_SESSION['weather'] .= ucwords(substr($d,$l,strpos($d,",")-$l)."-");
      } else {
        $_SESSION['weather'] .= "Clear-";
      }
    }
  }

  echo
  "<div style=\"float: right;\">\n".
  "  <a href=\"wasd\">(Change)</a>\n".
  "</div>\n".
  "<b>Forecast: ".$_SESSION['weather_title']."</b>\n".
  "<hr/>\n";
  $cols = explode("-",$_SESSION['weather'],-1);
  foreach ($cols as &$col) {
    $col = explode(",",$col);
    echo
    "<div style=\"text-align: center; width: 64px; float: left;\">\n".
    "  ".$col[0]."<br/>\n".
    "  <img alt=\"".$col[4]."\" src=\"image/app-Weather-";
    if ($col[4] == "Clear" || $col[4] == "Partly Cloudy") {
      echo $col[4]."_".$col[3].".png\"\n";
    } else if (strpos($col[4],"Cloudy") > -1) {
      echo "Cloudy.png\"\n";
    } else {
      echo $col[4].".png\"\n";
    }
    echo
    "       title=\"".$col[4]."\"/><br/>\n".
    "  ".$col[1]." ".$col[2]."&deg;<br/>\n".
    "  <i>".$col[3]."</i>\n".
    "</div>\n";
  }
?>
