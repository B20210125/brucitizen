<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 
	require 'connection.php';

	if (isset($_GET['delete'])) {
		$ticket = $_GET['delete'];
        $delete = "DELETE FROM complaint WHERE ticketID='$ticket'";
        $conn->query( "UPDATE usercomplaint SET deletebyuser='delete' where ticketID = '$ticket'");

		if($conn->query($delete)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Record Delete successfully!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../history.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Record Delete failed!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../history.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        }

	}

 ?>