<?php
//*we upload our projrct folder to host by filezilla
//* I use free one => https://app.infinityfree.ne
//* don't forget change your DB on connection file 

include "connect.php";

//* [1] write value immediately
//! function sendEmail($to, $title, $body) { }
sendEmail("btoox8python@gmail.com", "hi","from function");

//* [2] use variables to use them values to pass them as parameters of method
// $to = "sheikhalarabelrayah@gmail.com";
// $title ="Hi";
// $body = "your email address verification";
//? use header 
//* CC == corbon copy == send email copy to admain
// $header = "From: support@btoox8python.com" . "\n" . "CC: btoox8python@gmail.com";

//* call method
//* [A] use built-in => mail();
// mail($to,$title,$body,$header);

//* [B] use my email method
// sendEmail($to,$title,$body);

//! ================== [ test them ] =================
//? you should copy your db into your hosting website and upload your php files into it

//* buy hosting => https://www.hostinger.com/
// connect its ftp with that of filezilla client 
// use data you get from hostinger.com of ftp account
// we write name && pw and port 21
// back to lesson 31, min 8
// http://localhost/ecommerce/test_sendmail.php
// Warning: mail(): Failed to connect to mailserver at "localhost" port 25,
// verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() 
// in C:\xampp\htdocs\ecommerce\functions.php on line 161
