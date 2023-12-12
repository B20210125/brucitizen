<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 
	require 'connection.php';

	if (isset($_GET['delete'])) {
		$userID = $_GET['delete'];
        $array = ['register', 'complaint', 'usercomplaint', 'profile'];

        // loop through each table
        for($i = 0; $i < count($array); $i++){

        // get each single array
        $single_array = $array[$i];

        // build your query
        $query = "DELETE FROM $single_array WHERE userID = '$userID'";

        $data = $conn->query($query);

        }

		if($data) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Record Delete successfully!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-info.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Record Delete Failed!!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = '../user-info.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        }

	}

 ?>