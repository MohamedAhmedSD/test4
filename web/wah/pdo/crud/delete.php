<?php

include "../connect_file.php";

//* A => normal
//* I get error due to I add , in wrong place
$stmt = $con->prepare("DELETE FROM users WHERE id = 21");
$stmt->execute();
//* B => ? and value
$stmt = $con->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute(array(22));


//* using rowCount()
//? tell us if there any data added

$count = $stmt->rowCount();
echo $count;

//* make condition

if ($count > 0) {
echo "Succes";
} else {
//! error no data => wrong where condition
//* if I make delete for more than 1 stmt
//* and one done and another not => failed from rowCount but => delete one that have right where condition
echo " failed";
}




