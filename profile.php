<?php $pageTitle = "Profile"; include "header.php"; ?>
<?php require_once "process/profile-process.php"  ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Roboto", sans-serif;
  margin: 0;
  box-sizing: border-box;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%
}

*,
*:before,
*:after {
    box-sizing: inherit
}

.profile-content{
  margin-left:auto;
  margin-right:auto;
  max-width:980px
}

.text{
    text-align: center;
    font-size: 60px
  }

.margin-top{
  margin-top:16px!important
}

.row-padding:after,.row-padding:before,
.profile-container:after, .profile-container:before{
   content: "";
    display: table;
    clear: both
}

.row-padding, .row-padding>.half-content-card{
  padding: 0px 8px;
}

.padding-16 {
    padding-top: 16px !important;
    padding-bottom: 16px !important
}

.margin {
 
  margin: 16px !important
}

.xxl-font-size {
    font-size: 36px !important
}

.teal-colour,
.teal-colour:hover {
    color: #009688 !important
}


.half-content-card{
    float: left;
    width: 100%
}

.colour-white,
.colour-white:hover {
    color: #000 !important;
    background-color: #fff !important
}

.card{
    box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19)
}

.profile_img{
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin: 10px auto;
    border: 5px solid teal;
}

.profile-container {
    padding: 0.01em 16px
}

.profile-margin-right {
    margin-right: 16px !important
}

.maring-bottom-profile {
    margin-bottom: 16px !important
}

.size-large {
    font-size: 18px !important
}

.border{
   
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: solid;
        background-color: #fff;
        outline:none;
}

.border:focus{
   outline:none;
}

.save-button{
    border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: white;
    background-color: teal;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    width: 100%;
    white-space: normal;
    font-family: "Roboto", sans-serif;
    transition-duration: 0.4s;
    font-weight: bold;
}

.save-button:hover {
    color: #000 !important;
    background-color: #ccc !important;
    font-weight: bold;
}

@media (min-width:601px){
  .half-content-card{
    width: 49.99999%
  }

}

@media (min-width: 993px) {
  .profile-content {
    margin-left: auto;
    margin-right: auto;
    max-width: 980px
  }

  .text{
    text-align: center;
  }
}
</style>
</head>
<body id="main">
  <form method="POST" action="profile.php" enctype="multipart/form-data">    
<!-- Page Container -->
<div class="profile-content margin-top" style="max-width:1400px;">
    
  <!-- The Grid -->
  <div class="row-padding">
    <div class="padding-16 text"><img class="profile_img" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($image); ?>" alt="picture"><i class=" margin xxl-font-size teal-colour"><input type="file" name="image" value="<?php echo $filename; ?>"></i>
    </div>
    
    <!-- Left Column -->
    
    <div class="half-content-card">
      <div class="colour-white card">
        <div class="profile-container">
        <h2 class=" padding-16"><i class="fa fa-suitcase fa-fw profile-margin-right xxl-font-size teal-colour"></i>Personal Details</h2>
          <p><i class="fa fa-user-circle fa-fw profile-margin-right size-large teal-colour"></i>Name: <input  class="border" type="text" value="<?php echo $fullname; ?>" readonly></p>
          <p><i class="fa fa-id-card fa-fw profile-margin-right size-large teal-colour"></i>IC Number: <input  class="border" type="icnumber" value="<?php echo $icnumber; ?>" readonly></p>
          <p><i class="fa fa-id-card fa-fw profile-margin-right size-large teal-colour"></i>IC Color:<input  class="border" type="text" name="color" value="<?php  if($iccolor != null){echo $iccolor;} ?>" ></p>
          <p><i class="fa fa-address-book fa-fw profile-margin-right size-large teal-colour"></i>Birthplace:<input  class="border" type="text" name="birthplace" value="<?php echo $birthplace; ?>" ></p>
          <p><i class="fa fa-envelope fa-fw profile-margin-right size-large teal-colour"></i>Email:<input  class="border" type="email" name="email" value="<?php echo $email; ?>" readonly></p>
          <p><i class="fa fa-phone fa-fw profile-margin-right size-large teal-colour"></i>Phone Number:<input  class="border" type="number" name="phonenumber" value="<?php echo $phonenumber; ?>" ></p>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="half-content-card">
      <div class="profile-container card colour-white maring-bottom-profile">
        <h2 class="padding-16"><i class="fa fa-suitcase fa-fw profile-margin-right xxl-font-size teal-colour"></i>General Information</h2>
        <p><i class="fa fa-transgender fa-fw profile-margin-right size-large teal-colour"></i><label for="gender">Gender:</label>
        <select name="gender" id="gender">
          <option value="Male" <?php if ($gender == 'male'):?> selected <?php endif; ?>>Male</option>
          <option value="Female" <?php if ($gender == 'female'):?> selected <?php endif; ?>>Female</option>
        </select></p>
        <p><i class="fa fa-calendar fa-fw profile-margin-right size-large teal-colour"></i>Birth date: <input  class="border" type="date" name="birthdate" value="<?php echo $birthdate; ?>" ></p>
       
        <p><i class="fa fa-flag fa-fw profile-margin-right size-large teal-colour"></i>Nationality:<input  class="border" type="text" name="nationality" value="<?php echo $nationality; ?>"></p>
        <p><i class="fa fa-id-card fa-fw profile-margin-right size-large teal-colour"></i>Religion: <input  class="border" type="text" name="religion" value="<?php echo $religion; ?>"></p>
        <p><i class="fa fa-id-card fa-fw profile-margin-right size-large teal-colour"></i>Race: <input  class="border" type="text" name="race" value="<?php echo $race; ?>"></p>
        <p><i class="fa fa-id-card fa-fw profile-margin-right size-large teal-colour"></i><label for="status">Marital Status: </label>
          <select name="marital" id="status">
            <option value="single" <?php if ($marital == 'single'):?> selected <?php endif; ?>>Single</option>
            <option value="married" <?php if ($marital == 'married'):?> selected <?php endif; ?>>Married</option>
            <option value="Widowed" <?php if ($marital == 'widowed'):?> selected <?php endif; ?>>Widowed</option>
            <option value="Divored" <?php if ($marital == 'divorced'):?> selected <?php endif; ?>>Divored</option>
          </select></p>
      </div>
      <br>
    </div>

    <div class="half-content-card">
        <button type="submit" name="save" class="save-button" >Save</button>
    </div>
    <br>
    <div class="half-content-card">
        <a href="" name="cancel" class="save-button">Cancel</a>
    </div>

 
</div>
</form>

<br><br>

<?php include "footer.php";?>
</body>
</html>
