<?php 

$host = 'localhost'; 
$dbname = 'bakery';
$username = 'root';
$password = '123';
 
$conn = new mysqli($host, $username, $password, $dbname);
try {
    $conn = new mysqli($host, $username, $password);
} catch (Exception $e) {
    echo 'Connection Error: ' . $e->getMessage();
    exit;
}
?>