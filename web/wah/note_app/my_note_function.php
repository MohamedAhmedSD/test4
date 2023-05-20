<?php
// echo "we call my note function";
// define("variablename",its value)
define('MB',1048576); // to convert byte into MB
//* Signup => Insert
//? Login => Select
//! we make function and call it inside our signup file to not include it every time
//? our inside our connection file, so when call connection call functions inside it

//* we use $_POST , we don't use "" inside [] when call our param
function filterRequest($requestname){
    //* we need encrypt our post code ====== [security] =====
    return htmlspecialchars(strip_tags($_POST[$requestname]));
}

//! we need unique image name + save its path

function imageUpload($imageRequest){
    global  $msgError;
    // for information of file
    $imagename = rand(1000,1000000) .$_FILES[$imageRequest]['name'];
    $imagetmp = $_FILES[$imageRequest]['tmp_name'];
    $imagesize = $_FILES[$imageRequest]['size'];
    // what extension allowed
    $allowExt = array("jpg", "jpeg", "gif","png","pdf","mp3","mp4");
    $strToArray = explode(".",$imagename);
    // get extension
    $ext = end($strToArray);
    // override to ensure all small letters as  that on => $allowExt
    $ext = strtolower($ext);

    // check:
    // we can face some problems 
    // [1] wrong extension
    if( !empty($imagename) && !in_array($ext,$allowExt)){
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
        // edit path according where we stand from upload folder
        move_uploaded_file($imagetmp,"../upload/".$imagename);
        return $imagename; // return image path
    }else{
        // echo "<pre>";
        // print_r($msgError);
        // echo "</pre>";
        return "failed to upload";

    }
}

// delete function we use deleteFile() && unlink => both need path of file and its name
function deleteFile($dir, $imagename){
    // we must ensure file exist first before deleting 
    if(file_exists($dir."/".$imagename)){
        unlink($dir."/".$imagename);
    }
}

// test it by adding this function to connection file then test it on test page

// to call it
// include "connection_note.php";
// imageUpload('file');