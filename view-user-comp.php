<?php $pageTitle = "View Detail"; include "header-admin.php"; ?>
<?php require_once "process/view-comp-process.php"  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-family: sans-serif;
  font-weight: bold;
}

input[type=button] {
  background-color: teal;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=button]:hover {
  background-color: #45a049;
}

h2 {
  font-family: sans-serif;
  
}

.container {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.profile_img{
    width: 200px;
    height: 200px;
    object-fit: cover;
    margin: 10px auto;
    border: 5px solid teal;
    
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


.info-header {
  background-color: teal;
  color: #fff;
  padding: 20px;
  
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body id="main">

<div class="info-header">
<h2>VIEW COMPLAINT DETAIL</h2>
<h4>This is where complete citizen's complaint details shown.</h4></div>

<br>
<br>
<div class="container">
  <form action="view-user-comp.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="ticketID">Ticket ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="ticketId" value="<?php echo  $_GET['ticketID']; ?>" readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="title">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="title" value="<?php echo $title; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="desc">Description</label>
        </div>
        <div class="col-75">
          <textarea name="description" id="" cols="30" rows="10" readonly><?php echo $description; ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="address">Address</label>
        </div>
        <div class="col-75">
            <textarea name="address" id="" cols="30" rows="10" readonly><?php echo $address; ?></textarea>
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="ministry">Ministry</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="ministry" value="<?php echo $ministry; ?>" readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="date">Date Created</label>
        </div>
        <div class="col-75">
            <input type="text" id="" name="date" value="<?php echo $date_created; ?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="create">Created By</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="create" value="<?php echo $fullname; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="image">Status</label>
        </div>
        <div class="col-75">
        <input type="text" id="" name="status" value="<?php echo $status; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="image">Image</label>
        </div>
        <div class="col-75">
        <img class="profile_img" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($image); ?>" alt="picture">
        </div>
      </div>
      <br>

      <?php while ($row = mysqli_fetch_array($tbl_sec)): ?>
        <?php if(!empty($row['comments'])): ?>
      <div class="row">
      <div class="col-25">
          <label for="comment">Comment by <?php echo $row['type']; ?></label>
        </div>
        <div class="col-75">
          <textarea id="comment" name="comment" rows="4" readonly><?php echo $row['comments']; ?></textarea>
        </div>
    </div>
    <?php endif; ?>
    <?php endwhile; ?>

    <div class="row">
      <a href="user-complaint.php"><input type="button" value="Back"></a>
   <!-- hidden session id store in user_id -->
   <?php 
   if(isset($_SESSION['id']) == true){
   $id = $_SESSION['id']; 
   echo "<br>
   <input type='hidden' name='user' value='$id'/> 
   <br>";
   }
?>
    </div>
  </form>
</div>

</body>
</html>
