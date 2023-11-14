<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display with Bootstrap</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
<?php
require_once '../vendor/autoload.php';

$host = 'localhost'; 
$dbname = 'bakery';
$username = 'root';
$password = '';
$tbl_name = 'cake';
 
$conn = new mysqli($host, $username, $password, $dbname);


if($conn->connect_errno ) {
    printf("Connect failed: %s<br />", $conn->connect_error);
    exit();
 }
 printf('Connected successfully.<br />');

 $sql = "SELECT product_id, product_name, description, product_price,  product_image FROM cake";
 $result = $conn->query($sql);

 if ($result !== false && $result->num_rows > 0) {
   echo '<main style="
   display: flex;
    justify-content: space-around;
    align-items: center;
   ">';
   
   while ($row = $result->fetch_assoc()) {
       echo '
           <div class="section_type">
               <div class="product_item" key="' . $row['product_id'] . '">
                   <img src="' . $row['product_image'] . '" alt="">
                   <article>
                       <h3 class="product_title">' . $row['product_name'] . '</h3>
                       <span class="description">' . $row['description'] . '</span>
                       <span class="product_price">£ ' . $row['product_price'] . '</span>
                   </article>
                   <div class="btns">
                       <input value="View" type="button" class="view_btn" />
                       <input type="button" class="basket_btn" value="Add To Basket" />
                   </div>
               </div>
           </div>';
   }

   echo '</main>';
}
 else {
   echo "0 result";
 }

 $conn->close();
    
?>
<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
