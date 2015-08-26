<?php
//Массивы для хранения конечной инфы
$date = "";
$game_id = array();
$game_title = array();
$game_time = array();
$game_pass = array();
$total_game_data = array();
$saw = new nokogiri($curl_html_data);

//ID(удобно для поиска фриролла)
$html_id = $saw->get('.comment')->toArray();
//Разбираем данные
$search_str = array("ID:","ID: ","(register on PokerStars via our website to enter the freeroll)");
for ($i = 0; $i < count($html_id); $i++) {
    $game_id[$i] = trim(str_replace($search_str, "", $html_id[$i]["#text"][0]));
}

//Название фрироллов
$html_title = $saw->get('.freeroll-data .game-title')->toArray();
//Разбираем данные
for ($i = 0; $i < count($html_title); $i++) {
    $game_title[$i] = $html_title[$i]["#text"][0];
}

//Пароли
$html_pass = $saw->get('.freeroll-data .passwText')->toArray();
//Разбираем данные
for ($i = 0; $i < count($html_pass); $i++) {
    $game_pass[$i] = trim(iconv("UTF-8", "ISO-8859-1", $html_pass[$i]["#text"][0]));
}

//Время проведения/Дата
$html_time = $saw->get('.getOnlyTime')->toArray();
//Разбираем данные
for ($i = 0; $i < count($html_time); $i++) {
    $hour = date("h:i:s",strtotime($html_time[$i]["#text"][0]));
    $date = date("Y-m-d",strtotime($html_time[$i]["#text"][0]));
    $game_time[$i]=$hour;
}

//Формируем общий массив,который отдадим шаблонизатору
for ($i = 0; $i < count($game_id); $i++) {
    $total_game_data[$i] = array("id" => $game_id[$i],
                                 "title" => $game_title[$i],
                                 "hour" => $game_time[$i],
                                 "pass" => $game_pass[$i],
                                 "date" => $date);
}