<?php
session_start(); 
include "../service/connect.php";

if (!isset($_POST['username'], $_POST['password'])) {
	exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['password'])) {
	exit('Please complete the registration form');
}

if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo 'Username exists, please choose another!';
	} else {
		echo 'Register successfully!';
        header("Location: ../index.php");
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$conn->close();