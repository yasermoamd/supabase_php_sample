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
include ('services/connection.php');
include('views/navbar.php');

 $sql = "SELECT productID, name, description, price,  image FROM products";
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
               <div class="product_item" key="' . $row['productID'] . '">
                   <img src="' . $row['image'] . '" alt="">
                   <article>
                       <h3 class="product_title">' . $row['name'] . '</h3>
                       <span class="description">' . $row['description'] . '</span>
                       <span class="product_price">£ ' . $row['product_price'] . '</span>
                   </article>
                   <div class="btns">
                   <a class="view_product" href="../views/view_product.php"> <input value="View" type="button" class="view_btn"  /></a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/redux/4.2.1/redux.min.js" integrity="sha512-1/8Tj23BRrWnKZXeBruk6wTnsMJbi/lJsk9bsRgVwb6j5q39n0A00gFjbCTaDo5l5XrPVv4DZXftrJExhRF/Ug==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
</body>
</html>


 