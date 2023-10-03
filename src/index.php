<?php
require_once '../vendor/autoload.php';
include 'connection.php';

// user=postgres password=[YOUR-PASSWORD] host=db.khhmaxbegomuwdzkaxpj.supabase.co port=5432 dbname=postgres

try {
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	die($e->getMessage());
} finally {
	if ($pdo) {
		$pdo = null;
	}
}