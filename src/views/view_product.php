<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>
<body>
    <?php
include ('../services/connection.php');
include('./navbar.php');


    echo '<h1>Product Details</h1>';
    $id = $_GET['id'];
    $sql = "SELECT * FROM cake WHERE productID = '$id'";

    $raw_results = $conn->query($sql);
    if ($raw_results !== false && $raw_results->num_rows > 0) {

        while($results = mysqli_fetch_assoc($raw_results)){ 
            echo '
            <div class="section_type">
                <div class="product_item" key="' . $results['productID'] . '">
                    <img src="' . $results['image'] . '" alt="">
                    <article> 
                        <h3 class="product_title">' . $results['name'] . '</h3>
                        <span class="description">' . $results['description'] . '</span>
                        <span class="product_price">£ ' . $results['price'] . '</span>
                    </article>
                    <div class="btns">
                    <a class="view_product" href="views/view_product.php?id=' . $results['productID'] . '"> 
                        <input value="View" type="button" class="view_btn"  /></a>
                        <input type="button" class="basket_btn" value="Add To Basket" />
                    </div>
                </div>
            </div>';
        }
    } else 
        {
            echo "No results";
        }
    ?>
</body>
</html>