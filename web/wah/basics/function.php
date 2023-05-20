<?php

// function

//* start by word function
//? we need call function to work

//? globale var, out function scope, can call by 2 ways
$name = "var out function scope call by GLOBALS";
$sur_name = 'second way by global $varname';

function printName($lastname)
{
echo 'welcome';
echo '<br/>';
echo $GLOBALS['name'];// [1] hard way
echo '<br/>';
global $sur_name; // [2] easy way
echo '<br/>';
echo $sur_name;
echo '<br/>';
echo $lastname; // its parameter of our function
}

printName('ali');//call it, and give its parameter a value




