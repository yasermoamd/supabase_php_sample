<?php
include 'connection.php';
require_once '../vendor/autoload.php';

$sql = "SELECT * FROM \"$table_name\"";
$result = $pdo->query($sql);
?>
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
    if ($result) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            foreach ($data[0] as $column => $value) {
                echo '<th>' . $column . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($data as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">There are no data to display.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Error exception.</div>';
    }
    ?>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
