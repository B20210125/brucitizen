<?php $pageTitle = "userInfo"; include "header-admin.php"; ?>
<?php require_once "process/user-info-process.php"  ?>
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

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body id="main">

<div class="info-header">
<h2>User Information Details</h2>
<h4>Citizens information details will appear in this section.</h4>
</div>
<br>
<br>


<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>User ID</th>
      <th>Fullname</th>
      <th>Email</th>
      <th>Lact Activity</th>
      <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($tbl)):?>
  <tr>
    <td><?php echo $row['userID']; ?></td>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['last_activity']; ?></td>
    <td>
      <button class="btn"><a href="view-user-info.php?userID=<?php echo $row['userID'] ?>">View</a></button>
      <button class="btn btn-red"><a href="process/delete-user-info.php?delete=<?php echo $row['userID'] ?>">Delete</a></button>
    </td>
  </tr>
  <?php endwhile; ?>
    
  </table>
</div>

</body>
</html>
