<?php
//! [? &]
//* this is done on your browser
//? Undefined array key => when just run your code
//* edit your path => ?

//? to see certain result of your Get request
//* http://localhost/ecommerce/learnphp/lesson1.php

//! change it into
//* http://localhost/ecommerce/learnphp/lesson1.php?firstvar=val&others shoud use & before them
//? http://localhost/ecommerce/wah/request.php?name=%22ali%22&age=12&email=%22b@b.com%22

// include "connect.php";
//* becareful when use your path and ? to start coding and write post>body>form

//* Request=> Get, Post

//? get  : less secure so use it with reading data (select)
//! post : hide, more secure so we use it with insert & update data

//* extension: thunder client or use postman

//* on my browser go to php file then add
// ?param=value&p2=v2&p3=v3
// ?name=btoo&age=10&email=btoo@gmail.com
//! we see we can call one or more param with or without orders

//? =============================================================
//* [1] write get request for 3 things
//? $_GET
// ["a key of Get"]
$name = $_GET['name'];//? what we write on browser is between []
$age = $_GET['age'];
$email = $_GET['email'];
$phone = $_GET["phone"];

//! to see what happen when send Get request
// <pre> => 
echo "to see what happen when send Get request";
echo '<pre>';
echo $name;
echo "<br/>";
echo $age;
echo "<br/>";
echo $email;
echo '<pre/>';
echo "<br/>";


//! to see all array of my Get request
//? you can see both var && its val
//* we can see phone also here

echo "we see all Gets as array...";
print_r($_GET);
echo "<br/>";



//! use thunder or postman
//? on thunder
//* test Get
// new request => http://localhost/ecommerce/learnphp/lesson1.php
// then use query to write our key & val
// if not write any thing we get empty array => ()

echo "POST...";
echo "<br/>";

//* [2] post
//! $_POST
//? you call it from thunder, you cann't write it immeditlly on browser tap
//* 1. write on php file your params & print_r
//* 2. write it on thunder: body => form => fill gap
//* 3. change GET to POST on thunder then press on SEND

//! we can vot see post on browser !!!!!!!!!!!!!!!!!!!!!!
//? even if we write it as get => key and value on browser bar == not work

// echo "<br/>";
//! no need to use ? after php
$newname = $_POST['newname'];
// we see result of post only on thunder response page

$degree = $_POST["degree"];
echo $newname;
echo $degree;
echo "<br/>";
print_r($_POST);




