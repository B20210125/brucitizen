<?php 

	$server = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'citizen_portal';

	$conn = mysqli_connect($server, $user, $password, $db);

	if ($conn->connect_error) {
		die('Database error:' . $conn->connect_error);
	}
 ?>