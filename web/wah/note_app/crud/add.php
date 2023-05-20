<?php
//! how use it under condition of image must upload first to add note

//! [**] test them with thunder always, make easy to know is there error ======

//* add same to signup

// may face alot of problems due to wrong include path
include "../connection_note.php";


$title = filterRequest("title");
$content = filterRequest("content");
$userid = filterRequest("id");

$imagename = imageUpload('file');
//? we put all code under if condition

if($imagename != 'fail'){
    // connect to our DB
    // don't forget add image to your DB
    $stmt = $con->prepare(" INSERT INTO `notes` ( `notes_title`, `notes_content`, `notes_users`,`notes_image`) VALUES (?, ?, ?,?)
    ");

    // $stmt = $con->prepare(" INSERT INTO `users` ( `notes_title`, `notes_content`, `notes_users`) VALUES (?, ?, ?)
    // ");
    // use thunder
    // to add values of data to DB if you don't it add empty fields

    // excute params
    $stmt->execute(array($title, $content, $userid,$imagename));

    // back json to use it on flutter
    $count = $stmt->rowCount();

    if ($count > 0) {
        echo json_encode(array("status" => "success add"));
    } else {
        echo json_encode(array("status" => 'fail add'));
    }

}else{
        echo json_encode(array("status" => 'fail add'));    }






