<?php 

$host = getenv('DB_HOST'); 
$dbname = getenv('DB_DATABASE_NAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$table_name = "breads";

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Error: ' . $e->getMessage();
    exit;
}
?>