<?php

namespace zip358\tw_name_change;

ini_set("display_errors", 0);

// define("KENNO","KENNO");
// define("TIME_ZONE","TIME_ZONE");
// define("OPENWEATHERMAP_API_ID","Openweathermap_api_id");
// define("USER_SCREEN_NAME","user_screen_name");
// define("CONSUMER_KEY", "CONSUMER_KEY");
// define("CONSUMER_SECRET", "CONSUMER_SECRET");
// define("ACCESS_TOKEN", "ACCESS_TOKEN");
// define("ACCESS_TOKEN_SECRET", "ACCESS_TOKEN_SECRET");

use zip358\tw_name_change\moon;
use zip358\tw_name_change\tenki;
use Abraham\TwitterOAuth\TwitterOAuth;

class tw_name_change
{

  function main()
  {
    $user_screen_name = USER_SCREEN_NAME;
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

    $user_data = $connection->get("users/show", ["screen_name" => $user_screen_name]);
    $name = $user_data->name;

    date_default_timezone_set(TIME_ZONE);
    $icons = moon::$icon + tenki::$icon + array("■" => "■");
    $year = date("Y");
    $mon = (int) date("m");
    $day = (int) date("d");
    $H = date("H");

    if ($H >= 6 and $H <= 17) {
      tenki::main();
      tenki::$url = "https://api.openweathermap.org/data/2.5/weather?id=" . tenki::$ken->kenno[KENNO]->id . "&appid=" . tenki::$appid;
      tenki::api();
      $chg = tenki::$icon[str_replace("n", "d", tenki::$response->weather[0]["icon"])];
    } else {
      moon::main($year, $mon, $day);
      $chg = moon::icon();
    }

    foreach ($icons as $key => $val) {
      if (preg_match("/$val/", $name)) {
        $hit = $val;
      }
    }

    $name = $chg ? str_replace("$hit", $chg, $name) : $name;
    $connection->post("account/update_profile", ["name" => $name]);
  }
}
