<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
 
    if(isset($_GET['ticketID'])){
		//get the session ticket ID
		$ticketID = $_GET['ticketID'];

		//access to complaint database and extract their data
		$query = ("SELECT * FROM usercomplaint as user, register as reg WHERE user.userID = reg.userID and  user.ticketID =  '$ticketID'");
        $tbl  = mysqli_query($conn, $query);
		$row = $tbl->fetch_array();
        $userID = $row['userID'];
		$ticketID = $row['ticketID'];
		$title = $row['title'];
		$description = $row['description'];
		$address = $row['address'];
		$ministry = $row['ministry'];
		$date_created = $row['date_created'];
		$fullname = $row['fullname'];
		$deletebyuser = $row['deletebyuser'];
		$status = $row['status'];
		$image = $row['image'];

		$query_sec = ("SELECT * FROM comment WHERE ticketID =  '$ticketID'");
        $tbl_sec  = mysqli_query($conn, $query_sec);
		
	}

 ?>