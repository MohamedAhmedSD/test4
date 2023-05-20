<?php   
// $username = $_POST['username'];

//? how we recive file data when uploading it
//* as when uplad file through post request? how I recive file data from it

$file = $_FILES['file']; // it's array
echo "<pre>";
print_r($_FILES['file']);
echo "</pre>";


// go to thunder client => post and tick on files then call it