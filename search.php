<?php

define("DB_HOST","localhost");
define("DB_NAME","mini"); //Имя базы
define("DB_USER","Adminjane"); //Пользователь
define("DB_PASSWORD","1q2w3e4r5t"); //Пароль
define("PREFIX","lesson_"); //Префикс если нужно

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

if(!empty($_POST["referal"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

    $db_referal = $mysqli -> query("SELECT *, id FROM lesson_articles
            WHERE `title` LIKE '%".$referal."%' OR full_text LIKE '%".$referal."%' OR intro_text LIKE '%".$referal."%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li>".$row["title"]."</li>"; //$row["name"] - имя таблицы
    }

}


?>