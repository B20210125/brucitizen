<?php 

	require 'connection.php';

    $sql = "SELECT * FROM register as reg, profile as pro where reg.type = 'user' and reg.userID = pro.userID ORDER BY reg.fullname ASC";
    $result = $conn->query($sql);

    $sql01 = "SELECT * FROM usercomplaint as user, register as reg where reg.type = 'user' and reg.userID = user.userID and user.status = 'open' ORDER BY user.title ASC";
    $result01 = $conn->query($sql01);

    $sql02 = "SELECT * FROM usercomplaint as user, register as reg where reg.type = 'user' and reg.userID = user.userID and user.status = 'close' ORDER BY user.title ASC";
    $result02 = $conn->query($sql02);
 ?>