<?php
include 'config.php';

$conn = OpenCon();
echo "Connected Succcessfully";
CloseCon($conn);

$sql = 'SELECT id, name,  FROM breads';
?>