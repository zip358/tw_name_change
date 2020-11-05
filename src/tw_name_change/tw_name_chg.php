<?php
namespace zip358\tw_name_change;

ini_set("display_errors", 0);

use zip358\tw_name_change\init_config;
init_config::init_config();
use zip358\tw_name_change\moon;
use zip358\tw_name_change\tenki;
use Abraham\TwitterOAuth\TwitterOAuth;

if ($argv[0]) {


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
    tenki::$url = "https://api.openweathermap.org/data/2.5/weather?id=" . tenki::$ken->kochi["id"] . "&appid=" . tenki::$appid;
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
