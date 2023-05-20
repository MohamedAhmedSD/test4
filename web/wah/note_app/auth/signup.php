<?php

include "../connection_note.php";

//* we import function file inside our file, our inside connection file as we do here
//!  for security when we use POST
//?  we call it => filterRequest => it POST request

// var = callfuction("db column name")
// $username = filterRequest("username");
$username = filterRequest("username");
$email = filterRequest("email");
$password = filterRequest("password");
//? ==============================================
// if(isset($_POST["username"])){
//     $username = $_POST["username"];
//     echo $username;
// }

//? ==============================================
//? connect to our DB, to add data 
//* we send POST data not see by our browser so we use thunder

$stmt = $con->prepare("
INSERT INTO `users` (`username`,`email`,`password`) 
VALUES (?,?,?)
");

//* excute params
//? data will be add to DB
$stmt->execute(array($username, $email, $password));


//* to know result of process
$count = $stmt->rowCount();

if ($count > 0) {
//* back json to use it on flutter
echo json_encode(array("status" => "success"));
// when you use => print_r => not be able recive data on flutter
// because mixed data type json & others
// print_r($stmt);
} else {
echo json_encode(array("status" => 'fail'));
}

//? ==============================================
//! test our api => use thunder [ http://localhost/ecommerce/wah/note_app/auth/signup.php?username=mohamed&email=b@b&password=1321321 ] => POST
//* first add values of data to DB if you don't, it add empty fields =>
//? and not back any data
//* also don't forget change db name on connection file

//!HINT =/=/=/============
//* when you refresh signup page on your browser it add empty users, becarful, better use thunder


