<?php $pageTitle = "History"; include "header.php"; ?>
<?php require_once "process/history-process.php"  ?>
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

<h2>Ticket History</h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Ticket ID</th>
      <th>Title</th>
      <th>Status</th>
      <th>Date Created</th>
      <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($tbl)):?>
  <tr>
    <td><?php echo $row['ticketID']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['date_created']; ?></td>
    <td>
      <button class="btn"><a href="view-detail.php?ticketID=<?php echo $row['ticketID'] ?>">View</a></button>
      <button class="btn btn-red"><a href="process/history-delete-process.php?delete=<?php echo $row['ticketID'] ?>">Delete</a></button>
    </td>
  </tr>
  <?php endwhile; ?>
    
  </table>
</div>

<br> <br>
<br>
<br>

<?php include "footer.php";?>

</body>
</html>
