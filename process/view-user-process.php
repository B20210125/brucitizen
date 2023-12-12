<?php 

	require 'connection.php';

    
 
    if(isset($_GET['userID'])){
		//get the session ticket ID
		$userID = $_GET['userID'];

		//access to complaint database and extract their data
		$query = ("SELECT * FROM register as reg, profile as pro WHERE pro.userID =  '$userID' and reg.userID='$userID' and reg.type='user'");
        $tbl  = mysqli_query($conn, $query);
		$row = $tbl->fetch_array();
        $userID = $row['userID'];
		$fullname = $row['fullname'];
		$icnumber = $row['icnumber'];
		$email = $row['email'];
		$color = $row['iccolor'];
		$gender = $row['gender'];
		$datebirth = $row['birthdate'];
		$birthplace = $row['birthplace'];
		$nationality = $row['nationality'];
		$race = $row['race'];
		$religion = $row['religion'];
		$marital = $row['maritalstatus'];
		$image = $row['profileimage'];

		
	}

 ?>