<?php
//? A. import our connect file
//! if there any error on include, try csll path by different way
include "../connect_file.php"; 

//? B. deal with DB orders ( prepare, excute , fetch , print_r)

//* param to our connected DB, prepare( take sql order) then  excute them
//* 1
$stmt = $con->prepare("SELECT * FROM users");
$stmt->execute();

//* 2
$stmt2 = $con->prepare("SELECT * FROM users where `name` = 'ali'");
$stmt2->execute();

//* 3
//* look only column from row => email column
$stmt3 = $con->prepare("SELECT email FROM users");
$stmt3->execute();

//? =================================================
//* now we can call data [
//? fetchAll() => all table data,
//? fetch()=> row according Mysql instruction,
//? fetchColumn() => column
//* ] & save them to new param


//! if you don't determain fetchAll datatype, it back both indexed & associted array

//? $users = $stmt->fetchAll();
//! avoid them by use => PDO::FETCH_ASSOC

//* as associte
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $users = $stmt->fetchAll();

$user_name = $stmt2->fetch(PDO::FETCH_ASSOC);

$user_email = $stmt3->fetchColumn();
// best way to view your array data, by put them betwwn <pre>
echo '<pre>';
print_r($users);
echo '<pre/>';
echo "<br/>";


// we deal with associative array
echo '<pre>';
print_r($users[0]["name"]);
echo '<pre/>';
echo "<br/>";

echo '<pre>';
print_r($users[1]["email"]);
echo '<pre/>';
echo "<br/>";

echo '<pre>';
echo $user_name["name"];
echo "<br>";
echo $user_name["email"];
echo '<pre/>';
echo "<br/>";


//* we should determain our column first with mysql
// as stmt3

$email_col = $stmt3->fetchColumn();
// print_r($email_col);
//* we deal with only one value => use echo not print_r
//! it back first value on column only => btoox8python@gmail.com
echo $email_col;
echo "<br/>";


// if there result when fetch our data fields
// count back 0 if empty our number if there data
$count = $stmt->rowCount();
echo $count; //4
echo "<br/>";





