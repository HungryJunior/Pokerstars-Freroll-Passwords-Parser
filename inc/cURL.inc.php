<?php
//Url на который будем отправлять данные
$url = "http://www.pokerist.by/json/freerolls/filter/";
//наш "реферер"
$ref = "http://www.pokerist.by/freerolls/paroli-na-frirolly/";
//Юзерагент
$userAgent = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0";
//Параметры которые будем отправлять.
$params_array = array("rooms" => [4],
                      "games" => ["HOLDEM_NOLIMIT", "HOLDEM_POTLIMIT", "HOLDEM_FIXEDLIMIT"],
                      "daysToDisplay" => 1,
                      "payOutTypes" => [0, 1, 2],
                      "maxPayout" => "100000",
                      "minPayout" => "0",
                      "isDeposited" => false,
                      "isPassworded" => true,
                      "isByinned" => false,
                      "isTicketed" => false,
                      "isOtherConditioned" => false,
                      "isNoRestriction" => false,
                      "isPrivate" => false);
//Формируем json
$post_json = json_encode($params_array);

//Далее работаем с курлом:посылаем данные, заголовки,сохраняем ответ...
$curl = new \Curl\Curl();
$curl->setUserAgent($userAgent);
$curl->setReferrer($ref);
$curl->setHeader("Content-Type", "application/json");
$curl->setHeader("Content-Length", strlen($post_json));
$curl->post($url, $post_json);

//Формируем переменную,которую отдадим парсеру(html_Parser.inc.php)
$curl_html_data = $curl->response;
