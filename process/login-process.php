<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	session_start();

	require 'connection.php';


	if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

	// validation
	if (empty($email)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Email required.',
            showConfirmButton: false,
            timer: 2000,
        });
    </script>";
	}
	if (empty($password)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Password are required.',
            showConfirmButton: false,
            timer: 2000,
        });
    </script>";
	}
    
    // verify if the email exist in the database
    $query = "SELECT * FROM register WHERE email = '$email'";
    $tbl = mysqli_query($conn, $query);

    if (mysqli_num_rows($tbl) == 1 && !empty($password)) {
        $row = mysqli_fetch_array($tbl);
        $hash = $row['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['id'] = $row['userID'];
			$_SESSION['fullname'] = $row['fullname'];
            $_SESSION['icnumber'] = $row['icnumber'];
			$_SESSION['email'] = $row['email'];
            $_SESSION['type'] = $row['type'];
            $userID = $_SESSION['id'];
            $currentDate = date('Y-m-d h:i:s');
            $upd = "UPDATE register SET last_activity = '$currentDate' WHERE userID = '$userID'";
            mysqli_query($conn, $upd);

            $profile = "SELECT * FROM profile where userID = '$userID'";
            $check = mysqli_query($conn, $profile);

            if (mysqli_num_rows($check) == 0) {
                $insert = "INSERT into profile (userID) VALUES ('$userID')";
                $conn->query($insert);
            }

            $type = $_SESSION['type'];
            if ($type == 'user') {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    text: 'Redirecting to the next page...',
                    showConfirmButton: false,
                });
                setTimeout(function() {
                    window.location.href = 'dashboard.php';
                }, 2000); // Redirect after 2 seconds (adjust as needed)
            </script>";
                exit();
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    text: 'Redirecting to the next page...',
                    showConfirmButton: false,
                });
                setTimeout(function() {
                    window.location.href = 'dashboard-admin.php';
                }, 2000); // Redirect after 2 seconds (adjust as needed)
            </script>";
                exit();
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Wrong Password.',
                showConfirmButton: false,
                timer: 2000,
            });
        </script>";
        }
    } else if (!empty($email) && !empty($password)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: 'Invalid Account.',
            showConfirmButton: false,
            timer: 2000,
        });
    </script>";
    }
}


 ?>