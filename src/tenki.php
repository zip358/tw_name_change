<?php
namespace zip358\tw_name_change;
//Openweathermap_api
class tenki{
    static public $url = "https://api.openweathermap.org/data/2.5/weather?id=";
    static public $appid = OPENWEATHERMAP_API_ID;
    static public $ken ="";
    static public $response ="";
    static public $icon = array(
        "01d"=>"🌞",
        "02d"=>"⛅",
        "03d"=>"🌥",
        "04d"=>"☁",//
        "09d"=>"☔",
        "10d"=>"🌦",
        "11d"=>"⛈",
        "13d"=>"☃",
        "50d"=>"🌫",
    );
    static function main()
    {
        static::$ken = (object)(json_decode(@file_get_contents("ken.json"),true));
    }

    static function api(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, static::$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        static::$response =  (object)json_decode(curl_exec($ch),true);
        curl_close($ch);
    }
}
