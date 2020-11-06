### Twitterの名前を■部分を天気予報のアイコン、夜は月のアイコンへと変更する。

1.コマンドより実行する。  
2.cronより定期実行を行ってください。  
  
```
php  Twitter_name_change.php

```
  
```php:Twitter_name_change.php
if($argv[0]){
	require './vendor/autoload.php';
	use zip358\tw_name_change\tw_name_change;
	define("KIGOU","■");
	define("KENNO","KENNO");
	define("TIME_ZONE","TIME_ZONE");
	define("OPENWEATHERMAP_API_ID","Openweathermap_api_id");
	define("USER_SCREEN_NAME","user_screen_name");
	define("CONSUMER_KEY", "CONSUMER_KEY");
	define("CONSUMER_SECRET", "CONSUMER_SECRET");
	define("ACCESS_TOKEN", "ACCESS_TOKEN");
	define("ACCESS_TOKEN_SECRET", "ACCESS_TOKEN_SECRET");
	$tw_name_change = new tw_name_change();
	$tw_name_change->main();
}
```

|KENNO|県名|
|:------------:|:------------:|
|0| 北海道|
|1| 青森県|
|2| 岩手県|
|3| 宮城県|
|4| 秋田県|
|5| 山形県|
|6| 福島県|
|7| 茨城県|
|8| 栃木県|
|9| 群馬県|
|10| 埼玉県|
|11| 千葉県|
|12| 東京都|
|13| 神奈川県|
|14| 新潟県|
|15| 富山県|
|16| 石川県|
|17| 福井県|
|18| 山梨県|
|19| 長野県|
|20| 岐阜県|
|21| 静岡県|
|22| 愛知県|
|23| 三重県|
|24| 滋賀県|
|25| 京都府|
|26| 大阪府|
|27| 兵庫県|
|28| 奈良県|
|29| 和歌山県|
|30| 鳥取県|
|31| 島根県|
|32| 岡山県|
|33| 広島県|
|34| 山口県|
|35| 徳島県|
|36| 香川県|
|37| 愛媛県|
|38| 高知県|
|39| 福岡県|
|40| 佐賀県|
|41| 長崎県|
|42| 熊本県|
|43| 大分県|
|44| 宮崎県|
|45| 鹿児島県|
|46| 沖縄県|