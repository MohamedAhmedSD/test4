<?php 
//* explode => it convert String into array
//?  it depend on both seprator & variable
//* we need them to get image extension from its path

$fileName = "myimage.jpg";
$strtoarray = explode(".",$fileName);

// print only its extension
echo $strtoarray[1];

//* or by using end() to get last item on array
$ext = end($strtoarray);


//* search inside array to confirm first is this file was an image
//? better use in_array to check rather than if - else

// what type of file we allowed
$allowExt = array("jpg","png","gif");

//* check
if(in_array($ext,$allowExt)){
    echo "Yes";
}else{
    echo "No";
}