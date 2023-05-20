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
//* make it randomn from 5 digits
$verifycode = rand(10000, 99999);
//? ==========================================================

//* connect to our DB
//* ensure use unique email address and phone number by using => [php + DB unique columns key]
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
        "users_verifycode" => $verifycode,
        //? we use => "0" not 0
    );
    
    //* we need send verifycode to user email
    sendEmail($email,"Verify Code Ecommerce","Verify Code $verifycode");
    //* call insert method
    insertData("users",$data);

    //* test them through thunder

    //? ==========================================================
    //* when we use local host :-
    //* mail() not send

    //* on thunder test => don't enter verifycode == we get it random

}




