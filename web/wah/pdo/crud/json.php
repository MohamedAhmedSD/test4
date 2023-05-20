<?php

include "../connect_file.php"; 

//!  ============= Build Api page =============
//?=================== prepare, execute, fetch , encode ===============
$stmt = $con->prepare("SELECT * FROM users");
$stmt->execute();
//
// $stmt2 = $con->prepare("SELECT * FROM users where `name` = 'btoo'"); //! btoo == false == not found it , try ali
$stmt2 = $con->prepare("SELECT * FROM users where `name` = 'ali'"); //! ali => back all data about ali
$stmt2->execute();
// look only column from row
$stmt3 = $con->prepare("SELECT `name` FROM users where `email` = 'btoo@gmail.com'");
$stmt3->execute();

//?===================== associative ================================
// as associte
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user_name = $stmt2->fetch(PDO::FETCH_ASSOC);
$user_email = $stmt3->fetchColumn();

//?===================== json ================================
//! json encode, our dart not understand array
//* 1. 
//* deal with array to convert it into json

echo "<pre>";
echo json_encode($users); //* encode array => list of map => [{},{}]
echo "</pre>";

echo "<pre>";
echo json_encode($user_name); //!false => no user found by certain data you enter , our get all user data if true
echo "</pre>";

echo "<pre>";
echo json_encode($user_email); //* ali
echo "</pre>";


//* 2. 
//* immediatlly write json 
//! associative array inside => json encode

echo "<pre>";
echo json_encode(array("message" => 'its just start')); //! display it immediatly
echo "</pre>";




