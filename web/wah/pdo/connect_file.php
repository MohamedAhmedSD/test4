<?php
//* PDO : php data object
// save this file to use it later
//? aim to => [connect yourself with DB , use arabic lang, deal with exceptions]
//* we make simple db, with 3 cols

//? [1] Establish connection to the database
//? ==========================================
$dsn = "mysql:host=localhost;dbname=course_php";
$user = "root";
$pass = "";
$option = array(
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' //? for arabic lang
);

//? [2] calling & connect
//? ==========================================

try {

//* to pass what write above
//? new PDO() == make an object, that need 4 parameter values to pass through it
//* con => instance from PDO that connect with db
//* better use => new before => PDO

//! [A]
$con = new PDO($dsn, $user, $pass, $option);

//*  Set the error mode of the connection to => ERRMODE_EXCEPTION

//![B]
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

//* ->  it equal . to access function & attribute inner class
echo $e->getMessage();
}

//! we upload it 
//? if we need to change things it may => db name, user & pw

//* test it by use => include "your connect php file"; // from other page
//* include == import



