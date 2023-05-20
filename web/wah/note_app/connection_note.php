<?php

$dsn = "mysql:host=localhost;dbname=noteapp";
$user = "root";
$pass = "";
$option = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' //? for arabic lang
);

//* calling & connect
try {
$con = new PDO($dsn, $user, $pass, $option);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//! call my function on connection file, make it easy to reach them from one file
//? on same level
include "my_note_function.php";
// include "../../functions.php";
// include "../note_app/upload_image/upload_functions.php";
// include "./upload_image/upload_functions.php";


} catch (PDOException $e) {
echo $e->getMessage();
}



