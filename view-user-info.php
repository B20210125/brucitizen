<?php $pageTitle = "View Detail"; include "header-admin.php"; ?>
<?php require_once "process/view-user-process.php"  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], input[type=email], input[type=date], input[type=number], select, textarea {
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
    width: 150px;
    height: 150px;
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

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

.info-header {
  background-color: teal;
  color: #fff;
  padding: 20px;
  
}
</style>
</head>
<body id="main">

<div class="info-header">
<h2>VIEW USER DETAIL</h2>
<h4>This is where all the user's details shown.</h4></div>

<br>
<br>

<div class="container">
  <form action="view-user-info.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="UserID">User ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="UserID" value="<?php echo  $_GET['userID']; ?>" readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="fname">Full Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="fname" value="<?php echo $fullname; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75">
          <input type="email" id="" name="email" value="<?php echo $email; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="ic number">IC Number</label>
        </div>
        <div class="col-75">
          <input type="number" id="" name="ic number" value="<?php echo $icnumber; ?>" readonly>
        </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="color">IC Color</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="color" value="<?php echo $color; ?>" readonly>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="gender">Gender</label>
        </div>
        <div class="col-75">
            <input type="text" id="" name="gender" value="<?php echo $gender; ?>" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="date">Birth Date</label>
        </div>
        <div class="col-75">
          <input type="date" id="" name="date" value="<?php echo $datebirth; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="birthplace">Birth Place</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="birthplace" value="<?php echo $birthplace; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="nationality">Nationality</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="nationality" value="<?php echo $nationality; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="race">Race</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="race" value="<?php echo $race; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="religion">Religion</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="religion" value="<?php echo $religion; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="marital-status">Marital Status</label>
        </div>
        <div class="col-75">
          <input type="text" id="" name="marital-status" value="<?php echo $marital; ?>" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="image">Profile Image</label>
        </div>
        <div class="col-75">
          <img class="profile_img" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($image); ?>" alt="">
        </div>
      </div>
      <br>
    <div class="row">
      <a href="user-info.php"><input type="button" value="Back"></a>
    </div>
  </form>
</div>

</body>
</html>
