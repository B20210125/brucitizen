<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];
 
    if(isset($_GET['edit-ticketID'])){
		$ticket = $_GET['edit-ticketID'];
		$query = ("SELECT * FROM complaint WHERE ticketID='$ticket'");
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
	}

	if(isset($_POST['save'])) {
		$ticketID = $_POST['ticketID'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$address = $_POST['address'];
		$ministry = $_POST['ministry'];
		$image = $_FILES['image'];

		$fileName = basename($image["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $image['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

        }
		if($imgContent == null) {
		$sql = "UPDATE complaint SET title='$title', description='$description', address='$address', ministry='$ministry' WHERE ticketID = '$ticketID'";
        if ($conn->query($sql)) {
			$update = "UPDATE usercomplaint SET title='$title', description='$description', address='$address', ministry='$ministry' WHERE ticketID = '$ticketID'";
			$conn->query($update);
			echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Lodge complaint updated successfully!',
                showConfirmButton: false,
				timer: 2000,
            });setTimeout(function() {
				window.location.href = 'edit-detail.php?edit-ticketID=$ticketID';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
            exit();
		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Lodge complaint updated failed!',
                showConfirmButton: false,
				timer: 2000,
            });setTimeout(function() {
				window.location.href = 'dashboard.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		}
		} else {
		$sql = "UPDATE complaint SET title='$title', description='$description', address='$address', ministry='$ministry', image='$imgContent' WHERE ticketID = '$ticketID'";
        if ($conn->query($sql)) {
			$update = "UPDATE usercomplaint SET title='$title', description='$description', address='$address', ministry='$ministry', image='$imgContent' WHERE ticketID = '$ticketID'";
			$conn->query($update);
			echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Lodge complaint updated successfully!',
                showConfirmButton: false,
				timer: 2000,
            });setTimeout(function() {
				window.location.href = 'edit-detail.php?edit-ticketID=$ticketID';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
            exit();
		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Lodge complaint updated failed!',
                showConfirmButton: false,
				timer: 2000,
            });setTimeout(function() {
				window.location.href = 'dashboard.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
		}
		}
	
}

 ?>