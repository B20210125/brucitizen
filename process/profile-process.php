<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];

    if(isset($userID)){
        $userID = $userID;
        $query = ("SELECT * FROM profile as pro, register as reg WHERE pro.userID='$userID' and reg.userID = '$userID'");
        $tbl  = mysqli_query($conn, $query);
        $row = $tbl->fetch_array();
        $fullname = $row['fullname'];
        $image = $row['profileimage'];
        $iccolor = $row['iccolor'];
        $gender = $row['gender'];
        $birthdate = $row['birthdate'];
        $birthplace = $row['birthplace'];
        $nationality = $row['nationality'];
        $religion = $row['religion'];
        $race = $row['race'];
        $marital = $row['maritalstatus'];
        $phonenumber = $row['phonenumber'];

    }

    if(isset($_POST['save'])) {
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $birthplace = $_POST['birthplace'];
        $nationality = $_POST['nationality'];
        $race = $_POST['race'];
        $religion = $_POST['religion'];
        $iccolor = $_POST['color'];
        $marital = $_POST['marital'];
        $phonenumber = $_POST['phonenumber'];
        $images = $_FILES['image'];

        $fileName = basename($images["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $images['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

        }
        $check = "SELECT * FROM profile Where userID='$userID'";
        $confirmation = mysqli_query($conn, $check);
        if(mysqli_num_rows($confirmation) == 0) {
        $sql = "INSERT INTO profile (profileimage, gender, birthdate, birthplace, nationality, race, religion, iccolor, maritalstatus, phonenumber, userID) VALUES ('$imgContent', '$gender', '$birthdate', '$birthplace', '$nationality', '$race', '$religion', '$iccolor', '$marital', '$phonenumber', $userID)";
        if ($conn->query($sql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Profile update successfully!',
                showConfirmButton: false,
            });setTimeout(function() {
				window.location.href = 'profile.php';
			}, 2000); // Redirect after 2 seconds (adjust as needed)
        </script>";
            exit();
		} else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Profile update failed!',
                showConfirmButton: false,
                timer:2000,
        </script>";
		}
        } else {
            if(empty($imgContent)) {
                $sql = "Update profile SET gender='$gender', birthdate='$birthdate', birthplace='$birthplace', nationality='$nationality', race='$race', religion='$religion', iccolor='$iccolor', maritalstatus='$marital', phonenumber='$phonenumber' where userID='$userID'";
                if ($conn->query($sql)) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Profile update successfully!',
                        showConfirmButton: false,
                    });setTimeout(function() {
                        window.location.href = 'profile.php';
                    }, 2000); // Redirect after 2 seconds (adjust as needed)
                </script>";
                    exit();
                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Profile update failed!',
                        showConfirmButton: false,
                        timer:2000,
                </script>";
                }
            } else {
                $sql = "Update profile SET profileimage='$imgContent', gender='$gender', birthdate='$birthdate', birthplace='$birthplace', nationality='$nationality', race='$race', religion='$religion', iccolor='$iccolor', maritalstatus='$marital', phonenumber='$phonenumber' where userID='$userID'";
                if ($conn->query($sql)) {
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Profile update successfully!',
                        showConfirmButton: false,
                    });setTimeout(function() {
                        window.location.href = 'profile.php';
                    }, 2000); // Redirect after 2 seconds (adjust as needed)
                </script>";
                    exit();
                } else {
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Profile update failed!',
                        showConfirmButton: false,
                        timer:2000,
                </script>";
                }
            }
     
    }
    }


 ?>