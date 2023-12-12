<?php $pageTitle = "user complaint"; include "header-admin.php"; ?>
<?php require_once "process/user-comp-process.php"  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  padding: 20px;

}

th, td {
  text-align: center;
  padding: 15px;
}

.info-header {
  background-color: teal;
  color: #fff;
  padding: 20px;
  
}

.btn {
  background-color: #FFFF00;
  border: none;
  color: white;
  text-align: center;
  display: inline-block;
  padding: 10px 15px;
  cursor: pointer;
  
}


.btn a {
  text-decoration: none;
  color: black;
  font-size: 16px;
}

.btn:hover {
  background-color: #e7e7e7;
  color: black
}

.btn-red{
  background-color: #f44336;
  color: white;
}

.btn-green{
  background-color: #4CAF50;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body id="main">


<?php 

  if (isset($_POST['search'])) {
    if ($_POST['status'] == 'open') {
      if ($_POST['filter'] == 'name'){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE CONCAT(fullname) LIKE '%".$valueToSearch."%' and reg.type='user' and comp.status = 'open' and comp.userID = reg.userID";
        $search_result = filterTable($query);
      }   
      if ($_POST['filter'] == 'ministries'){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE CONCAT(ministry) LIKE '%".$valueToSearch."%' and reg.type='user' and comp.status = 'open' and comp.userID = reg.userID";
        $search_result = filterTable($query);
      } 
    } 
    
    if ($_POST['status'] == 'close') {
      if ($_POST['filter'] == 'name'){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE CONCAT(fullname) LIKE '%".$valueToSearch."%' and reg.type='user' and comp.status = 'close' and comp.userID = reg.userID";
        $search_result = filterTable($query);
      }   
      if ($_POST['filter'] == 'ministries'){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE CONCAT(ministry) LIKE '%".$valueToSearch."%' and reg.type='user' and comp.status = 'close' and comp.userID = reg.userID";
        $search_result = filterTable($query);
      } 
    } 
    if ($_POST['status'] == 'empty') {
      $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE reg.type='user' and comp.userID = reg.userID";
      $search_result = filterTable($query);
    }
  } else {
    $query = "SELECT * FROM usercomplaint as comp, register as reg WHERE reg.type='user' and comp.userID = reg.userID";
    $search_result = filterTable($query);
  }



  function filterTable($query) {
    $connect = mysqli_connect("localhost", "root", "", "citizen_portal");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
  }

   ?>


<div class="info-header">
<h2>Citizens Complaint Details</h2>
<h4>Table below are all the compiled citizens concerns</h4>
</div>

<br>
<br>
<form action="user-complaint.php" method="POST">
  <br><br>

<center>
    <div class="search">
    <select name="status">
        <option value="empty"></option>
        <option value="open">Open</option>
        <option value="close">Close</option>
    </select>
    <select name="filter">
        <option value="name">Name</option>
        <option value="ministries">Ministries</option>
    </select>
    <input type="text" name="valueToSearch" placeholder="value to search">
    <input type="submit" name="search" value="Filter">
    </div>
</center>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Ticket ID</th>
      <th>Title</th>
      <th>Created by</th>
      <th>ministry</th>
      <th>Data Deleted?</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

      <?php while ($row = mysqli_fetch_array($search_result)):?>
  <tr>
    <td><?php echo $row['ticketID']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['ministry']; ?></td>
    <td><?php echo $row['deletebyuser']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <?php if($row['deletebyuser'] != 'delete' && $row['status'] == 'open' ):?>
    <td>
      <button class="btn btn-red"><a href="process/close-user-complaint.php?close=<?php echo $row['ticketID'] ?>">Close</a></button>
      <button class="btn btn-green"><a href="view-user-comp-reply.php?ticketID=<?php echo $row['ticketID'] ?>">Reply</a></button>
    </td>
    <?php endif; ?>
    <?php if($row['deletebyuser'] != 'delete' && $row['status'] == 'close' ):?>
    <td>
      <button class="btn btn-green"><a href="process/open-user-complaint.php?open=<?php echo $row['ticketID'] ?>">Open</a></button>
      <button class="btn"><a href="view-user-comp.php?ticketID=<?php echo $row['ticketID'] ?>">View</a></button>
    </td>
    <?php endif; ?>
    <?php if($row['deletebyuser'] == 'delete'):?>
      <td>
      <a href="process/delete-user-comp.php?ticketID=<?php echo $row['ticketID'] ?>">Delete</a>
    </td>
    <?php endif; ?>
  </tr>
  <?php endwhile; ?>

    
  </table>
</div>

<br>


  <br><br>


</form>

</body>
</html>
