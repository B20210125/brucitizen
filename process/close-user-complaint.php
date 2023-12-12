<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	require 'connection.php';
 
    if(isset($_GET['close'])){
		//get the session ticket ID
		$close = $_GET['close'];

		//update status to close for 2 table
		$query = ("UPDATE usercomplaint SET status='close' where ticketID = '$close'");
        $tbl  = mysqli_query($conn, $query);
		
		$query01 = ("UPDATE complaint SET status='close' where ticketID = '$close'");
        $tbl01  = mysqli_query($conn, $query01);

		if($tbl == true && $tbl01 == true) {
			echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Ticket Status changed to Close!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-complaint.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Failed to change!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-complaint.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		}	
	}

 ?>