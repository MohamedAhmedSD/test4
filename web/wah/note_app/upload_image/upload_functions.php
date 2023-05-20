<?php
// define("variablename",its value)
define('MB',1048576); // to convert byte into MB
function filterRequest($requestname){
    return htmlspecialchars(strip_tags($_POST[$requestname]));
}
function imageUpload($imageRequest){
    global  $msgError;
    // for information of file
    $imagename = $_FILES[$imageRequest]['name'];
    $imagetmp = $_FILES[$imageRequest]['tmp_name'];
    $imagesize = $_FILES[$imageRequest]['size'];
    // what extension allowed
    $allowExt = array("jpg", "jpeg", "gif","png","pdf","mp3","mp4");
    $strtoarray = explode(".",$imagename);
    // get extension
    $ext = end($strtoarray);
    // override to ensure all small letters as  that on => $allowExt
    $ext = strtolower($ext);

    // check:
    // we can face some problems 
    // [1] wrong extension
    if(!empty($imagename) && !in_array($ext,$allowExt)){
        $msgError[] = "EXT";
    }
    // [2] image size
    // if more than 10 MB
    if($imagesize > 2 * MB){
        $msgError[] = "size";
    }
    // handle if no error to uplad
    if(empty($msgError)){
    // [**] move img from temporary path to upload it
    // I make new folder to upload img on it == uploaded folder inside my php files
    // it follows by img name

        move_uploaded_file($imagetmp,"upload/".$imagename);
    }else{
        echo "<pre>";
        print_r($msgError);
        echo "</pre>";

    }
// test it by adding this function to connection file then test it on test page
}