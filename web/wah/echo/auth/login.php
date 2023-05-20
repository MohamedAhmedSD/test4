<?php
include "../connect.php";

//* when create an account => check is email or phone not used before
//* when login to the account => check from its data is it match that on our DB

//? we use function inside our connect file
//* for security we use POST request filterd

$username = filterRequest("username");
$password = filterRequest("password");
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfyCode = "0";
//? ==========================================================

//* connect to our DB
$stmt = $con->prepare("SELECT * FROM users WHERE `users_email` = ? Or `users_phone` = ?");

//? use thunder
//* to add values of data to DB if you don't it add empty fields

//! becarful => if you write phone then email on exceute => fail
//? orgnization is important 
//* excute params

$stmt->execute(array($email,$phone));
//? ==========================================================
$count = $stmt->rowCount();

//? ==========================================================
//* avoid add existing user
if($count > 0){
    //* it's method inside out functions file
    //* add certain message
    printFailure("USED EMAIL OR PHONE");
} else{
    //* add new user, use inser method with need two arguments
    //* table name + data

    $data = array(
        "users_name" => $username,
        "users_password" => $password,
        "users_email" => $email,
        "users_phone" => $phone,
        "users_verfyCode" => "0",
        //? we use => "0" not 0
    );
    //* call insert method
    insertData("users",$data);

    //* test them through thunder
}

//? ==========================================================



