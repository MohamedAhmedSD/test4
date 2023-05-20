<?php

//! [**] test them with thunder always, make easy to know is there error ======

//* add same to signup

// may face alot of problems due to wrong include path
include "../connection_note.php";


$title = filterRequest("title");
$content = filterRequest("content");
$userid = filterRequest("id");


// connect to our DB
$stmt = $con->prepare(" INSERT INTO `notes` ( `notes_title`, `notes_content`, `notes_users`) VALUES (?, ?, ?)
");

// $stmt = $con->prepare(" INSERT INTO `users` ( `notes_title`, `notes_content`, `notes_users`) VALUES (?, ?, ?)
// ");
// use thunder
// to add values of data to DB if you don't it add empty fields

// excute params
$stmt->execute(array($title, $content, $userid));

// back json to use it on flutter
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success add"));
} else {
    echo json_encode(array("status" => 'fail add'));
}
