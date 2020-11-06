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
