<?php
require_once "vendor/autoload.php";
require_once "inc/cURL.inc.php";
require_once "inc/html_Parser.inc.php";

//Создаем экземпляр шаблонизатора.
$smarty = new Smarty();
//Передаем данные из парсера (html_Parser.inc.php) в шаблон
$smarty->assign("data", $total_game_data);
//Проверяем существует ли шаблон
if (!$smarty->templateExists('freerolls.tpl')) {
    exit('Такого шаблона не существует');
} else {
    $smarty->display("freerolls.tpl");
}
