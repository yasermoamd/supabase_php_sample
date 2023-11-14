<?php

include('./services/connection.php');

$query = $_GET['query']; 
$min_length = 5;

if(strlen($query) >= $min_length){
    $query = htmlspecialchars($query); 
    

    $sql = "SELECT * FROM cake 
    WHERE (`product_name` LIKE '%".$query."%') OR (`product_description` LIKE '%".$query."%')";
    $raw_results = $conn->query($sql);

    if ($raw_results !== false && $raw_results->num_rows > 0) {

        while($results = mysqli_fetch_assoc($raw_results)){
				echo "<p><h3>".$results['product_name']."</h3>".$results['product_description']."</p>";
			}
    } else{ 
        echo "No results";
    } 

}
else{ 
    echo "Minimum length is ".$min_length;
}

