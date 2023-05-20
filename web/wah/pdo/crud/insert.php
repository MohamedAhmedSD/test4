<?php

include "../connect_file.php";

//! we can pass value of variables by using excute and use placeholder on values as (? or :)
//? all 3 stmts will be done because we use => excute =====================================
//? stmt may be 3 with same name our different name

//* A => normal
$stmt = $con->prepare("INSERT INTO `users`(`name`, `email`) VALUES ('batman','turkey')");
$stmt->execute();

//* B => ? and value, here we need use array to pass value through it 
//! => index array

$stmt2 = $con->prepare("INSERT INTO `users`(`name`, `email`) VALUES (?,?)");
$stmt2->execute(array("alibaba", "theif")); //! => index array

//* C => by placeholder : and short simple to placeholder, key => value
//! associtive array

$stmt3 = $con->prepare("INSERT INTO `users`(`name`, `email`) VALUES (:un,:uc)");
$stmt3->execute(array(
"un" => "khalid",
"uc" => "home"
)); //! associtive array




//? using rowCount()
//* tell us if there any data added

$count = $stmt->rowCount();
echo $count;
echo "<br>";

//* make condition

if ($count > 0) {
echo "Succes";
} else {
echo " failed";
}




