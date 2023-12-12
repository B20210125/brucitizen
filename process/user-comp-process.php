<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];
 
	$query = ("SELECT * FROM usercomplaint as comp, register as reg WHERE reg.type='user' and comp.status = 'open' and comp.userID = reg.userID");
    $tbl  = mysqli_query($conn, $query);

    $query01 = ("SELECT * FROM usercomplaint as comp, register as reg WHERE reg.type='user' and comp.status = 'close' and comp.userID = reg.userID");
    $tbl01  = mysqli_query($conn, $query01);

 ?>