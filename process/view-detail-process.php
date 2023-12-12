<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];
 
    if(isset($_GET['ticketID'])){
		//get the session ticket ID
		$ticket = $_GET['ticketID'];

		//access to complaint database and extract their data
		$query = ("SELECT * FROM complaint WHERE ticketID =  '$ticket'");
        $tbl  = mysqli_query($conn, $query);
		$row = $tbl->fetch_array();
        $ticket = $row['ticketID'];
		$title = $row['title'];
		$description = $row['description'];
        $address = $row['address'];
		$ministry = $row['ministry'];
		$status = $row['status'];
		$date_created = $row['date_created'];
		$image = $row['image'];

		$query_sec = ("SELECT * FROM comment WHERE ticketID =  '$ticket'");
        $tbl_sec  = mysqli_query($conn, $query_sec);
		
	}

	if(isset($_POST['submit'])){
		$ticketID = $_POST['ticket'];
		$comment = $_POST['comment'];

		$query = "INSERT INTO comment (comments, type, ticketID, userID) VALUES('$comment', 'user', '$ticketID', '$userID')";
        $tbl  = $conn->query($query);
		
		if($tbl == true) {
			echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'You reply to this complaint!',
                showConfirmButton: false,
				timer: 2000,
            });setTimeout(function() {
				window.location.href = './view-detail.php?ticketID=$ticketID';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Failed to change!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = './view-detail.php?ticketID=$ticketID';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		}	
	}

 ?>