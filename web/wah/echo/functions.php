<?php

// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================

//* 1.
define("MB", 1048576);

//* 2.

function filterRequest($requestname)
{
  return  htmlspecialchars(strip_tags($_POST[$requestname]));
}
//* 3.

function getAllData($table, $where = null, $values = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    return $count;
}

//* 4.

function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
  }
    return $count;
}

/*
 * This PHP code defines a function named "insertData" that takes in three parameters - $table, $data, and $json (where $json is set to true by default).

The function first globalizes the $con variable, which is assumed to be a PDO object representing a connection to a database.

The function then uses a foreach loop to convert keys in the $data array to named placeholders in the form of :key, and stores them in an $ins array. This array is then imploded by commas to make it into a string.

The function further constructs an SQL query by imploding the keys in the $data array by a comma, and concatenating them with the previously created $ins array, which are separated by commas and enclosed in parentheses.

The function then prepares and executes the SQL statement using the $con PDO object. Inside the loop, it binds each value from the $data array to its corresponding named parameter in the prepared statement.

The function then counts the number of rows affected by the insertion by calling the PDO method rowCount.

Finally, an if statement is used to check the value of $json. If it's true and the number of affected rows is greater than zero, the function outputs a success JSON message. Otherwise, it outputs a failure message. At the end, the function returns the number of affected rows. 
 */
//* 5.


function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    }
    return $count;
}
//* 6.

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}

//* 7.

function imageUpload($imageRequest)
{
  global $msgError;
  $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
  $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
  $imagesize  = $_FILES[$imageRequest]['size'];
  $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
  $strToArray = explode(".", $imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if (!empty($imagename) && !in_array($ext, $allowExt)) {
    $msgError = "EXT";
  }
  if ($imagesize > 2 * MB) {
    $msgError = "size";
  }
  if (empty($msgError)) {
    move_uploaded_file($imagetmp,  "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}

//* 8.


function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

//* 9.

// function checkAuthenticate()
// {
//     if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
//         if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
//             header('WWW-Authenticate: Basic realm="My Realm"');
//             header('HTTP/1.0 401 Unauthorized');
//             echo 'Page Not Found';
//             exit;
//         }
//     } else {
//         exit;
//     }

//     // End 
   
// }

//* 10. printFailure

 //! save your time, by what json we need when failed
 //* add certain messages when call it if you want
 function printFailure($message = "none"){
    echo json_encode(array("status" => "failure", "message" => $message));
}


//* 11. send email

//? what we need to do it, by using => mail() function
//* title == subject, body == message
//* we use fixed header
function sendEmail($to , $title , $body){
    // $header = "From: support@waelabohamza.com " . "\n" . "CC: waeleagle1243@gmail.com" ; 
    // CC == send copy to admin frpm email that send into user
    // $header = "From: support@sheikhalarab.com " . "\n" . "CC: sheikhalarabelrayah@gmail.com" ; 
    $header = "From: sheikhalarabelrayah@gmail.com " . "\n" . "CC: sheikhalarabelrayah@gmail.com" ; 
    mail($to , $title , $body , $header) ; 
    
    //* after end check
    echo "Success" ; 
    }