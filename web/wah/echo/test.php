<?php 

include 'connect.php';

//! we use insert method which need 2 parameters
//* table && data 

//* 1.
$table = "users";
// $name = filterRequest("namerequest");


//* 2.
//? avoid writing error by copy columns name and paste them here 
$data = array( 
"users_name" => "wael",
"users_email" => "wael2@gmail.com",
"users_phone" => "3242345",
"users_verifycode" => "3243243",       
);

//? call our method
//* use this method to add data into your database
$count = insertData($table , $data);



