<?php

// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================
// explain by comments this php code,
//* 1.
define("MB", 1048576);

//* 2.


// Define a function named "filterRequest" which takes in a parameter named $requestname
function filterRequest($requestname)
{
    // Use the $_POST superglobal array to get the value of the specified $requestname, then strip any HTML and PHP tags from it using the "strip_tags" function, and encode any special characters using the "htmlspecialchars" function
    return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

/*
This PHP code defines a function named "filterRequest" that takes in a parameter named $requestname, and returns a filtered version of the corresponding $_POST request value.

The function gets the value of the specified $requestname from the $_POST superglobal array, and then uses the "strip_tags" function to remove any HTML and PHP tags from it.

After that, the function uses the "htmlspecialchars" function to encode any special characters in the $requestname value, such as quotes and ampersands.

The filtered string is then returned by the function for use in further processing or display. 

This function is useful for sanitizing user input to prevent cross-site scripting (XSS) attacks and other security vulnerabilities.

function filterRequest($requestname)
{
  return  htmlspecialchars(strip_tags($_POST[$requestname]));
}
*/
//* 3.


// Define a function named "getAllData" which takes in two optional parameters - $where and $values - with $table being a required parameter
function getAllData($table, $where = null, $values = null)
{
    // Globalize the $con variable, which is assumed to be a PDO object representing a connection to a database
    global $con;
    
    // Create an empty array named $data
    $data = array();
    
    // Prepare an SQL SELECT statement to fetch all data from the specified $table and with the specified $where clause
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    
    // Execute the prepared statement with the specified $values
    $stmt->execute($values);
    
    // Fetch all rows from the result set as an associative array and store them in the $data array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get the number of rows returned by the query
    $count  = $stmt->rowCount();
    
    // Check if the number of rows returned is greater than zero
    if ($count > 0){
        // If so, output a success JSON message with the $data array
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        // Otherwise, output a failure JSON message
        echo json_encode(array("status" => "failure"));
    }
    
    // Return the number of rows returned by the query
    return $count;
}
/*

This PHP code defines a function named "getAllData" that takes in two optional parameters ($where and $values) and a required parameter ($table), and returns the number of rows returned by the database query.

The function globalizes a PDO connection object named $con, which is assumed to be established previously.

The function uses the $table parameter to construct an SQL SELECT statement to fetch all rows from the specified table.

If the optional $where and $values parameters are provided, the SQL statement includes the WHERE clause and values to bind to its parameters respectively.

The function then prepares and executes the SQL statement with the PDO object, and fetches all the returned rows as an associative array, which it stores in the $data array.

The function then counts the number of rows returned by the query and uses an if statement to check whether this number is greater than 0.

If the number of returned rows is greater than 0, the function outputs a success JSON message with the returned rows in the $data array. Otherwise, the function outputs a failure JSON message.

Finally, the function returns the number of rows returned by the query.


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

*/

//* 4.


// Define a function named "insertData" which takes in three parameters: a string $table, an array $data, and a boolean $json with a default value of true
function insertData($table, $data, $json = true)
  
{
    // Access the global variable $con, which is a database connection object
    global $con;
    
    // Create an empty array to hold field values, then iterate over the $data array and add a colon prefix to each key as an array element
    foreach ($data as $field => $v) {
        $ins[] = ':' . $field;
    }
    
    // Convert the fields array into a comma-separated string
    $ins = implode(',', $ins);
    
    // Convert the keys of the $data array into a comma-separated string to use in the SQL query
    $fields = implode(',', array_keys($data));
    
    // Construct the SQL query by inserting the $table, $fields, and $ins variables into the appropriate places
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";
    
    // Prepare the SQL statement by binding the values in $data to their corresponding placeholders in the query
    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    //Execute the prepared SQL statement
    $stmt->execute();
    
    // Get the number of rows affected by the insert operation
    $count = $stmt->rowCount();
    
    // If the $json parameter is set to true, return JSON-encoded status data that reflects the success or failure of the insert operation
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    
    // Return the number of rows affected by the insert operation
    return $count;
}
/*

This PHP code defines a function named "insertData" that is used to insert data into a database table. The function takes three parameters: 

- $table: a string representing the name of the database table to insert data into;
- $data: an associative array containing the field names and values for the data to be inserted into the table; 
- $json: a boolean that indicates whether the function should return JSON-encoded data indicating the success or failure of the insert operation (default value is true).

The function first accesses the global $con variable, which is assumed to hold a database connection object. Then, it iterates over the $data array to construct an array of values with colon prefixes to be used as placeholders in the SQL statement.

Next, the function constructs the SQL statement by concatenating the $table, $fields, and $ins variables. It then prepares the statement and binds the values in the $data array to the placeholders in the statement using the PDO method bindValue.

The function executes the prepared statement and gets the number of rows affected. If the $json parameter is true, it then returns a JSON-encoded string indicating the success or failure of the insert operation. Finally, the function returns the number of affected rows.

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

function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
   
}

//* 10.

 // save your time, by what json we need when failed
 function printFailure($message = "none"){
    echo json_encode(array("status" => "failure", "message" => $message));
}


//* 11.

// send email
// what we need to do it, by using => mail() function
// title == subject, body == message
// we use fixed header
function sendEmail($to , $title , $body){
    // $header = "From: support@waelabohamza.com " . "\n" . "CC: waeleagle1243@gmail.com" ; 
    // CC == send copy to admin frpm email that send into user
    $header = "From: support@sheikhalarab.com " . "\n" . "CC: sheikhalarabelrayah@gmail.com" ; 
    mail($to , $title , $body , $header) ; 
    // after end check
    echo "Success" ; 
    }