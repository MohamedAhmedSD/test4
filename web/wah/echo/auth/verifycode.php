
<?php 
//* to check if user enter same dgits that send to its email


//! don't forget connect file
// include "../connect.php";
include "../connect_host.php";


$email = filterRequest("email");
$verify = filterRequest("verifycode");

//* use sql to compare between verifycode from user and that on db for certain email

//* we can reach email first then check or both together as bellow
$stmt = $con->prepare("SELECT * FROM users WHERE users_email = '$email' AND users_verifycode = '$verify'");

$stmt->execute();

$count = $stmt->rowCount();

if($count > 0){
    //* if enter right verify code change column on our db == users_approve into 1
    //? if we want add admain approve also == make user_approve == 2

    $data = array("users_approve" => 1);
    //* update data => ($table, $data, $where, $json = true)
    updateData("users",$data,"users_email = '$email'");
}else{
    printFailure("Wrong Verify Code");
}
//! [test] after upload by thunder client
//* enter both email && verify code from db
?>

