<?php
include "../connection_note.php";

//? we use function inside our connect file
//* for security we use POST

$email = filterRequest("email");
$password = filterRequest("password");
//? ==========================================================

// connect to our DB
$stmt = $con->prepare("SELECT * FROM users WHERE `password` = ? AND `email` = ?");

//? use thunder
//* to add values of data to DB if you don't it add empty fields

//! becarful => if you write email then pw on exceute => fail
//? orgnization is important 
//* excute params

$stmt->execute(array($password,$email));
//? ==========================================================

//* to get data from user to use it later on sharedpreferences

//? we assign what we get into new variable called data
//* data it is array => need to key to send it into flutter when success

$data = $stmt->fetch(PDO::FETCH_ASSOC);
//?* mack json to use it on flutter
//? ==========================================================

$count = $stmt->rowCount();
//! how we send array data on flutter ==>
//* "data" => $data
//? it back all data

if ($count > 0) {
    //! don't forget call data
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => 'fail'));
}


