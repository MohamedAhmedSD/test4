<?php

// for [ all between bracates]
// while [check then excute] 
// do - while [excute code then check]

for ($x = 0; $x < 10; $x++) { // initial value, condition, how increase => not end ;
    echo '<br/>';
    echo $x;
    }
echo "<br>";
echo "=============";


$i = 0; // initial value
while ($i < 10) {// condition
echo '<br/>'; // html new make line
echo $i;// print
$i++;// how increase [ what is next step ]
}
echo "<br>";
echo "=============";


$n = 0; // initial value
do {
echo '<br/>';
echo $n;
$n++; // how increase
} while ($n < 10);// condition, should end line with ;


?>