<?php
// when we use variable it should start with $
// to read on local host put your folder inside
// linux;
// /opt/lampp/htdocs
// for windows;
// C:\xampp\htdocs

$name = 'ali';
$age = 25;

// we can make concatination by 2 methods
echo $name;
echo '<br/>';
echo "age = " . $age;
echo '<br/>';
echo "My name is $name and I am $age";
echo '<br/>';


// if condition
// make condition according your budget you can buy certain car
echo 'If condition';
echo '<br/>';

$price = 1200;

if ($price < 1000) {
echo 'price < 1000';
} elseif ($price > 1000 || $price < 1500) {
echo 'nice budget';
} else {
echo 'price > 1500';
}






