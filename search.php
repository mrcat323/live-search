<?php

define("DB_HOST","HOST");
define("DB_NAME","DATABASE"); 
define("DB_USER","USERNAME"); 
define("DB_PASSWORD","PASSWORD"); 
define("PREFIX","DB_PREFIX"); 

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

if(!empty($_POST["referal"])){ 

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

    $db_referal = $mysqli -> query("SELECT *, id FROM lesson_articles
            WHERE `title` LIKE '%".$referal."%' OR full_text LIKE '%".$referal."%' OR intro_text LIKE '%".$referal."%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li>".$row["title"]."</li>"; 
    }

}


?>