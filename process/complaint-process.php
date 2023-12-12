<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	require 'connection.php';

    if(isset($_POST['submit'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $ministry = $_POST['ministry'];
        $address = $_POST['address'];
        $images = $_FILES['image'];
        $user = $_POST['user'];
        $currentDate = date('Y-m-d h:i:s');
        $cur_date = date('dmyHis');
        $ticket = 'TKT'.$user. $cur_date;

        $fileName = basename($images["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $images['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
        }

        $sql = "INSERT INTO complaint (ticketID, title, description, ministry, address, status, date_created, image, userID) VALUES('$ticket', '$title', '$description', '$ministry', '$address', 'open', '$currentDate', '$imgContent', '$user')";
        $compile = $conn->query($sql);
        if ($compile) {
            $conn->query( "INSERT INTO usercomplaint (ticketID, title, description, ministry, address, status, date_created, image, userID) VALUES('$ticket', '$title', '$description', '$ministry', '$address', 'open', '$currentDate', '$imgContent', '$user')");
            echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Lodge Complaint capture successfully!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = 'complaint.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
        exit();
		} else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Lodge Complaint capture failed!',
                showConfirmButton: false,
                timer: 2000,
            });
        </script>";
		}
}


 ?>