<?php

require_once "../vendor/autoload.php";

function OpenCon() {
    $dbhost = "localhost"; 
    $dbuser = "root";
    $dbpass = "123";
    $db = "bakery";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}


function CloseCon($conn) {
    $conn -> close();
}

?>