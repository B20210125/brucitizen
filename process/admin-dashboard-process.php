<?php 

	require 'connection.php';

    $userID = $_SESSION['id']; 
    $fullname = $_SESSION['fullname'];
    $icnumber = $_SESSION['icnumber'];
    $email = $_SESSION['email'];
 
    $query = "SELECT * FROM register WHERE type = 'user'";
    $tbl  = mysqli_query($conn, $query);
    $rowcount = mysqli_num_rows( $tbl );

    $query01 = "SELECT * FROM complaint as com WHERE com.status = 'open';";
    $tbl01  = mysqli_query($conn, $query01);
    $rowcount01 = mysqli_num_rows( $tbl01 );

    $query02 = "SELECT * FROM complaint as com WHERE com.status = 'close';";
    $tbl02  = mysqli_query($conn, $query02);
    $rowcount02 = mysqli_num_rows( $tbl02 );

    $currentDate = date('Y-m-d');
    $query03 = "SELECT * FROM register WHERE type = 'user' and last_activity LIKE '$currentDate%'";
    $tbl03  = mysqli_query($conn, $query03);
    $rowcount03 = mysqli_num_rows( $tbl03 );

    $query04 = "SELECT * FROM register WHERE type = 'user'";
    $tbl04  = mysqli_query($conn, $query04);

    $query41 = "SELECT count(*) as total, comp.userID, reg.type FROM complaint as comp, register as reg WHERE reg.type = 'user' and reg.userID = comp.userID GROUP BY reg.userID";
    $tbl41  = mysqli_query($conn, $query41);
    // $data=mysqli_fetch_array($tbl41);
    // $rows = mysqli_fetch_array($tbl41);
    // $rowcount41= mysqli_num_rows( $tbl41);

    // $result=mysqli_query($conn,"SELECT count(*) as total FROM complaint as comp, register as reg WHERE reg.type = 'user' and reg.userID = comp.userID");
    // $data=mysqli_fetch_assoc($result);

    $query05 = "SELECT * FROM usercomplaint as user, register as reg where user.userID = reg.userID";
    $tbl05  = mysqli_query($conn, $query05);
    
?>