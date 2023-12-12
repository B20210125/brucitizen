<?php $pageTitle = "View Detail"; include "header.php"; ?>
<?php require_once "process/view-detail-process.php"  ?>
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
    border: 2px solid teal;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
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

<h2>TICKET ID: <?php echo  $_GET['ticketID']; ?></h2>

<div class="container">
  <form action="view-detail.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">Title of the complaint</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="complaint" value="<?php echo $title; ?>"  readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="fname">Description</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="description" value="<?php echo $description; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Address</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="address" value="<?php echo $address; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">Ministry</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="ministry" value="<?php echo $ministry; ?>" readonly>
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Status</label>
        
      </div>
      <div class="col-75">
        <input type="text" id="" name="status" value="<?php echo $status; ?>" readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="image">Images</label>
        </div>
        <div class="col-75">
            <img class="profile_img" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($image); ?>" alt="picture">
        </div>
    <div class="row">
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
  </form>
</div>

<div class="row">

<form action="view-detail.php" method="POST" enctype="multipart/form-data">
<div class="row">
  <div class="col-25">
  <input type='hidden' name='ticket' value='<?php echo $_GET['ticketID']; ?>'/>
  </div>
  <div class="col-75">
  <textarea id="comment" name="comment" rows="4" placeholder="Type your comment here..."></textarea>
  </div>
</div>
<br>
<div class="row">
<input type="submit" name="submit" value="Submit">
<a href="dashboard.php"><input type="button" value="Back"></a>
</div>
</form>

</div>

        </div>

<br>
<br>
<br>
<?php include "footer.php";?>

</body>
</html>
