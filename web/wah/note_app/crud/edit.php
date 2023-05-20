<?php
//! [**] test them with thunder always, make easy to know is there error ======

// becarful when write update no () , no VALUES with using where

// may face alot of problems due to wrong include path
include "../connection_note.php";

//by know this
$noteid = filterRequest("id");
// edit this
$title = filterRequest("title");
$content = filterRequest("content");



// connect to our DB
// don't update notes id big mistake
// $stmt = $con->prepare("UPDATE `notes` SET `notes_title` = ? , `notes_content` = ? WHERE `notes_users` = ? ");
$stmt = $con->prepare("UPDATE notes SET `notes_title` = ? , `notes_content` = ? WHERE `notes_id` = ? ");



// excute params
$stmt->execute(array($title, $content, $noteid));

// back json to use it on flutter
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success edit"));
} else {
    echo json_encode(array("status" => 'fail edit'));
}


