<?php

//* [1] import code from connection file
include "../pdo/connect_file.php";

//* [2] after connect use => 
//? [A] preper attribute to write your Mysql code
$stmt = $con->prepare("SELECT * FROM users");

//? [B] you should execute it 
$stmt->execute();

//? [C] now we can fetch data after excute it
//* and save it under certain var to use it

$usersfromdb = $stmt->fetchAll(PDO::FETCH_ASSOC);
///Specifies that the fetch method shall return each row as 
///an array indexed by column name as returned in the corresponding result set. 
///If the result set contains multiple columns with the same name,

//? [D] print all data
echo "<pre>";
print_r($usersfromdb);
echo "</pre>";

//* it back dara as array
//* Array ( [0] => Array ( [id] => 1 [name] => btoo [email] => btoox8python@gmail.com ) [1] => Array ( [id] => 2 [name] => ali [email] => btoo@gmail.com ) )

//! I can print certain data on array
echo $usersfromdb[0]["name"]; // btoo

