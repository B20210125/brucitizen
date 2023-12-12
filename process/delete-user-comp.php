<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 
	require 'connection.php';

	if (isset($_GET['ticketID'])) {
		$ticketID = $_GET['ticketID'];

        // build your query
        $query = "DELETE FROM usercomplaint WHERE ticketID = '$ticketID' and deletebyuser='delete'";

        $data = $conn->query($query);

		if($data) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Record Delete successfully!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-complaint.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Record Delete Failed!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-complaint.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        }

	}

 ?>