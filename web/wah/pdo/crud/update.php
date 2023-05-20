<?php

include "../connect_file.php";
// we can pass value of variables by using excute and use placeholder on values as (? or :)
//* A => normal
// I get error due to I add , in wrong place
$stmt = $con->prepare("UPDATE `users` SET `name` = 'btoo' where id = 20");
$stmt->execute();

//* B => ? and value
$stmt = $con->prepare("UPDATE `users` SET `name` = ? WHERE id = ?");
$stmt->execute(array("ahmed", 21));

//* C => multible columns
$stmt = $con->prepare("UPDATE `users` SET `name` = ?,email =? WHERE id = ?");
$stmt->execute(array(
"taha","taha#",22
));



//* using rowCount()
// tell us if there any data added
$count = $stmt->rowCount();
echo $count;
echo "<br>";
//* make condition

if ($count > 0) {
echo "Succes";
} else {
//! error even when repeat data
//* also when error on where => condition => not found id
echo " failed";
}




