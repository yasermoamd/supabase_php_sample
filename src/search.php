<?php

include('./services/connection.php');

$query = $_GET['query']; 
$min_length = 5;

if(strlen($query) >= $min_length){
    $query = htmlspecialchars($query); 
    

    $sql = "SELECT * FROM products 
    WHERE (`name` LIKE '%".$query."%') OR (`description` LIKE '%".$query."%')";
    $raw_results = $conn->query($sql);

    if ($raw_results !== false && $raw_results->num_rows > 0) {

        while($results = mysqli_fetch_assoc($raw_results)){
				echo "
                <div>
                <p key={".$results['productID']."}>
                <h3>".$results['name']."</h3>
                ".$results['description']."</p>
                </div>
                ";
			}
    } else{ 
        echo "No results";
    } 

}
else{ 
    echo "Minimum length is ".$min_length;
}

