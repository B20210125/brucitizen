<?php $pageTitle = "Dashboard"; include "header-admin.php"; ?>
<?php require_once "process/admin-dashboard-process.php"  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body id="main">
<div class="container-one">
        <ul>
            <li id="one">
                <div class="top"><i class="fa fa-users"></i>Users</div> 
                <div class="bottom"><?php echo $rowcount; ?> members</div> 
            </li>
            <li id="two"> 
                <div class="top">Open-Ticket</div> 
                <div class="bottom"><?php echo $rowcount01; ?> tickets</div> 
            </li>
            <li id="three"> 
                <div class="top">Close-Ticket</div> 
                <div class="bottom"><?php echo $rowcount02; ?> tickets</div> 
            </li>
            <li id="four"> 
                <div class="top">Active Users</div> 
                <div class="bottom"><?php echo $rowcount03; ?> members</div> 
            </li>
            
        </ul>
    </div>
    <div class="container-two">
    <table>
        <caption>User's Data</caption>
        <thead>
            <tr>
            <th scope="col">UserID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Last Activity</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_array($tbl04)):?>
            <tr>
            <td data-label="userID"><?php echo $row['userID']; ?></td>
            <td data-label="Name"><?php echo $row['fullname']; ?></td>
            <td data-label="Email"><?php echo $row['email']; ?></td>
            <td data-label="Last Activity"><?php echo $row['last_activity']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>

    <div class="container-three">
    <table>
        <caption >Ticket Complaints</caption>
        <thead>
            <tr>
            <th scope="col">Ticket ID</th>
            <th scope="col">Title</th>
            <th scope="col">Report by</th>
            <th scope="col">Ticket Status</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($rows = mysqli_fetch_array($tbl05)):?>
            <tr>
            <td data-label="ticketID"><?php echo $rows['ticketID']; ?></td>
            <td data-label="title"><?php echo $rows['title']; ?></td>
            <td data-label="reportby"><?php echo $rows['fullname']; ?></td>
            <td data-label="status"><?php echo $rows['status']; ?></td>
            <td data-label="status"><?php echo $rows['deletebyuser']; ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>

    <br>
    <br>

    <?php include "footer.php";?>
</body>
</html>