<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

session_start();

require 'connection.php';

$fullname = '';
$icno = '';
$email = '';
$password = '';

if (isset($_POST['register'])) {
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $icno = mysqli_real_escape_string($conn, $_POST['icno']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

	// Hash the password
	$passwords = password_hash($password, PASSWORD_BCRYPT);

	// Check if the current email exist
	$emailQuery = " SELECT * FROM register WHERE email='$email' or icnumber='$icno'";
    $query = mysqli_query($conn, $emailQuery);
	$userCount = mysqli_num_rows($query);

	if ($userCount > 0) {
		echo "<script>
            Swal.fire({
                icon: 'warning',
                text: 'Email Address or IC Number already exist!',
                showConfirmButton: false,
                timer: 2000,
            });
        </script>";
	} else {
		if (isset($_POST['type'])) {
		$type = mysqli_real_escape_string($conn, $_POST['type']);
		$sql = "INSERT INTO register (fullname, icnumber, email, password, type)
		VALUES ('$fullname', '$icno', '$email', '$passwords', '$type')";

		if ($conn->query($sql)) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Register Successful',
				showConfirmButton: false,
			});
			setTimeout(function() {
				window.location.href = 'index.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
		</script>";
			exit();
		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Failed to Register',
                showConfirmButton: false,
                timer: 2000,
            });
        </script>";
		}
	} else {
		$sql = "INSERT INTO register (fullname, icnumber, email, password, type)
		VALUES ('$fullname', '$icno', '$email', '$passwords', 'user')";

		if ($conn->query($sql)) {
			echo "<script>
			Swal.fire({
				icon: 'success',
				title: 'Register Successful',
				showConfirmButton: false,
			});
			setTimeout(function() {
				window.location.href = 'index.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
		</script>";
			exit();

		} else {
			echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Failed to Register',
                showConfirmButton: false,
                timer: 2000,
            });
        </script>";
		}
	}
	}

}


?>