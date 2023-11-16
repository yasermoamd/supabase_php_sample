<?php 

$host = 'localhost';  // DB HOST
$dbname = 'cakecove';  // DBNAME
$username = 'fushia'; // DBUSERNAME
$password = 'Password123#@!'; // DBPASSWORD  

/**
 *  connection using mysqli -> php
 */

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_errno) {
        printf("Connect failed: %s<br />", $conn->connect_error);
        exit();
     }
    // printf('Connected successfully.<br />');
} catch (Exception $e) {
    echo 'Connection Error: ' . $e->getMessage();
    exit;
}
?>