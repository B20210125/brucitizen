<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	require 'connection.php';
 
    if(isset($_GET['open'])){
		//get the session ticket ID
		$open = $_GET['open'];

		//update status to open for 2 table
		$query = ("UPDATE usercomplaint SET status='open' where ticketID = '$open'");
        $tbl  = mysqli_query($conn, $query);
		
		$query01 = ("UPDATE complaint SET status='open' where ticketID = '$open'");
        $tbl01  = mysqli_query($conn, $query01);

		if($tbl == true && $tbl01 == true) {
			echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Ticket Status changed to Open!',
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