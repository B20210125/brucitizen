<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];
 
	$query = ("SELECT * FROM register WHERE type='user'");
    $tbl  = mysqli_query($conn, $query);

 ?>