<?php
//! [**] test them with thunder always, make easy to know is there error ======

// becarful when use thunder we write request name => id not noteid
// we deal with var not db column

// may face alot of problems due to wrong include path
include "../connection_note.php";


// to delete we need to know only id => make easy later to delete its row
$noteid = filterRequest("id");


// connect to our DB
$stmt = $con->prepare(" DELETE FROM notes WHERE `notes_id` = ? ");

// use thunder
// to add values of data to DB if you don't it add empty fields

// excute params
$stmt->execute(array($noteid));

// back json to use it on flutter
$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success delete"));
} else {
    echo json_encode(array("status" => 'fail delete'));
}


