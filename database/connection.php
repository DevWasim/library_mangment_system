<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','libraryms');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$conn){
    die('some error accured');
}
?>