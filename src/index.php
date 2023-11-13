<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display with Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
<?php
require_once '../vendor/autoload.php';

$host = 'localhost'; 
$dbname = 'bakery';
$username = 'root';
$password = '123';
$tbl_name = 'cake';
 
$conn = new mysqli($host, $username, $password, $dbname);


if($conn->connect_errno ) {
    printf("Connect failed: %s<br />", $conn->connect_error);
    exit();
 }
 printf('Connected successfully.<br />');

 $sql = "SELECT product_id, product_name, product_description,  product_image FROM cake";
 $result = $conn->query($sql);

   
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        printf("Id: %d, Name: %s, description: %s, image: <img src=%s> <br />",  
          $row["product_id"], 
          $row["product_name"], 
          $row["product_description"],
          $row["product_image"]);               
    }
 } else {
    printf('No record found.<br />');
 }
 mysqli_free_result($result);
 $conn->close();

?>
<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
