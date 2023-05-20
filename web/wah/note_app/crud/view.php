<?php
//! [**] test them with thunder always, make easy to know is there error ======

//* id => is unique key to deal with user
//! it same to deal with =>  login

include "../connection_note.php";

//* we have relation [ cascade by phpmayadmin ]
//* between user => id & notes_users so we give it value of userid

$userid = filterRequest("id"); //! user id, user id, user id ====

//* connect to our DB
$stmt = $con->prepare("SELECT * FROM notes WHERE `notes_users` = ?");
// $stmt = $con->prepare("SELECT * FROM notes WHERE `notes_users` = '$userid'");
// $stmt->execute();

// excute params
$stmt->execute(array($userid));
//? =================================================

//* to get data from user to use it later on sharedpreferences
// $data = $stmt->fetch(PDO::FETCH_ASSOC);
// we use fetchAll to back list on dart from our json
// fetch back map, fetchall back list

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

//* or manually =>
// $data = array(
//     "notes_users" => $userid,
//  );
// back json to use it on flutter

//?============= check and send data =========================
$count = $stmt->rowCount();

if ($count > 0) {
    // don't forget we pass data to convert array into json
    echo json_encode(array("status" => "success: from view php", "data" => $data));
} else {
    echo json_encode(array("status" => 'fail : from view php'));
}

?>

