<?php $pageTitle = "Lodge Complaint"; include "header.php"; ?>
<?php require_once "process/complaint-process.php"  ?>
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

input[type=submit] {
  background-color: teal;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
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

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.header-complaint {
  background-color: teal;
  padding: 20px;
  color: white;
  font-weight: 300;

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

<div class="header-complaint">
<h2>Lodge Complaint Form</h2>
<p>Please fill in with complete details in the form.</p>
</div>
<br>
<br>

<div class="container">
  <form action="complaint.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Title of the complaint</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="title" placeholder="title.." require>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ministry">Ministries</label>
      </div>
      <div class="col-75">
        <select id="ministry" name="ministry">
            <option value=""></option>
            <option value="Jabatan Perdana Menteri">Jabatan Perdana Menteri</option>
            <option value="Kementerian Kewangan dan Ekonomi">Kementerian Kewangan dan Ekonomi</option>
            <option value="Kementerian Pertahanan">Kementerian Pertahanan</option>
            <option value="Kementerian Hal Ehwal Luar Negeri">Kementerian Hal Ehwal Luar Negeri</option>
            <option value="Kementerian Hal Ehwal Dalam Negeri">Kementerian Hal Ehwal Dalam Negeri</option>
            <option value="Kementerian Pendidikan">Kementerian Pendidikan</option>
            <option value="Kementerian Sumber-Sumber Utama dan Pelancongan">Kementerian Sumber-Sumber Utama dan Pelancongan</option>
            <option value="Kementerian Pembangunan">Kementerian Pembangunan</option>
            <option value="Kementerian Belia dan Sukan">Kementerian Belia dan Sukan</option>
            <option value="Kementerian Kesihatan">Kementerian Kesihatan</option>
            <option value="Kementerian Hal Ehwal Ugama">Kementerian Hal Ehwal Ugama</option>
            <option value="Kementerian Pengangkutan dan Infokomunikasi">Kementerian Pengangkutan dan Infokomunikasi</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Describe your complaint.." style="height:200px" require></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <textarea id="address" name="address" placeholder="State your address.." style="height:200px" require></textarea>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="image">Upload your image</label>
        </div>
        <div class="col-75">
            <input type="file" id="myFile" name="image" value="" placeholder="Upload your file">
        </div>`
            <!-- hidden session id store in user_id -->
            <?php 
                if(isset($_SESSION['id']) == true){
                $id = $_SESSION['id']; 
                echo "<br>
                <input type='hidden' name='user' value='$id'/> 
                <br>";
                }
            ?>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
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
