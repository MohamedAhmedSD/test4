<?php
//* I change dsn ...
//! 1. dbname to that I use it
//! 2. hostname
//? test them by create => test.php

//! [1] local database
$dsn = "mysql:host=localhost;dbname=ecommerce_wael";
$user = "root";
$pass = "";


//! [2] use hosting
// $dsn = "mysql:host=localhost;dbname=epiz_34011609_ecommerce_project";
// I am on locak so no user or pw
// test them by create => test.php
// $dsn = "mysql:host=sql204.epizy.com;dbname=epiz_34011609_ecommerce_project";
// $user = "epiz_34011609";
// $pass = "XbBALRBrQDOI";
$option = array(
   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);

$countrowinpage = 9;
try {
   $con = new PDO($dsn, $user, $pass, $option);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
   header("Access-Control-Allow-Methods: POST, OPTIONS , GET");

   //* import functions file
   include "functions.php";
   // include "./functions.php";

   if (!isset($notAuth)) {
      //* stop check authentication
      // checkAuthenticate();
      //! when upload to server we use it
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}
