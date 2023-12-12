<?php $pageTitle = "Edit Detail"; include "header.php"; ?>
<?php require_once "process/edit-detail-process.php"  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Details</title>
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

.cancel {
  margin-left: 6px;
  background-color: teal;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  text-decoration: none;
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

.cancel:hover {
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

<h2>Lodge Complaint Form</h2>
<p>You can make changes to your current complaint form.</p>

<div class="container">
  <form action="edit-detail.php" method="POST" enctype="multipart/form-data">
  <div class="row">
      <div class="col-25">
        <label for="fname">Ticket ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="ticketID" placeholder="ticketID.." value="<?php echo $ticket; ?>" readonly>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Title of the complaint</label>
      </div>
      <div class="col-75">
        <input type="text" id="" name="title" placeholder="title.." value="<?php echo $title; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ministry">Ministries</label>
      </div>
      <div class="col-75">
        <select id="ministry" name="ministry">
            <option value=""></option>
            <option value="Jabatan Perdana Menteri" <?php if ($ministry == 'Jabatan Perdana Menteri'):?> selected <?php endif; ?>>Jabatan Perdana Menteri</option>
            <option value="Kementerian Kewangan dan Ekonomi" <?php if ($ministry == 'Kementerian Kewangan dan Ekonomi'):?> selected <?php endif; ?>>Kementerian Kewangan dan Ekonomi</option>
            <option value="Kementerian Pertahanan" <?php if ($ministry == 'Kementerian Pertahanan'):?> selected <?php endif; ?>>Kementerian Pertahanan</option>
            <option value="Kementerian Hal Ehwal Luar Negeri" <?php if ($ministry == 'Kementerian Hal Ehwal Luar Negeri'):?> selected <?php endif; ?>>Kementerian Hal Ehwal Luar Negeri</option>
            <option value="Kementerian Hal Ehwal Dalam Negeri" <?php if ($ministry == 'Kementerian Hal Ehwal Dalam Negeri'):?> selected <?php endif; ?>>Kementerian Hal Ehwal Dalam Negeri</option>
            <option value="Kementerian Pendidikan" <?php if ($ministry == 'Kementerian Pendidikan'):?> selected <?php endif; ?>>Kementerian Pendidikan</option>
            <option value="Kementerian Sumber-Sumber Utama dan Pelancongan" <?php if ($ministry == 'Kementerian Sumber-Sumber Utama dan Pelancongan'):?> selected <?php endif; ?>>Kementerian Sumber-Sumber Utama dan Pelancongan</option>
            <option value="Kementerian Pembangunan" <?php if ($ministry == 'Kementerian Pembangunan'):?> selected <?php endif; ?>>Kementerian Pembangunan</option>
            <option value="Kementerian Belia dan Sukan" <?php if ($ministry == 'Kementerian Belia dan Sukan'):?> selected <?php endif; ?>>Kementerian Belia dan Sukan</option>
            <option value="Kementerian Kesihatan" <?php if ($ministry == 'Kementerian Kesihatan'):?> selected <?php endif; ?>>Kementerian Kesihatan</option>
            <option value="Kementerian Hal Ehwal Ugama" <?php if ($ministry == 'Kementerian Hal Ehwal Ugama'):?> selected <?php endif; ?>>Kementerian Hal Ehwal Ugama</option>
            <option value="Kementerian Pengangkutan dan Infokomunikasi" <?php if ($ministry == 'Kementerian Pengangkutan dan Infokomunikasi'):?> selected <?php endif; ?>>Kementerian Pengangkutan dan Infokomunikasi</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Describe your complaint.." style="height:200px"><?php echo $description; ?></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <textarea id="address" name="address" placeholder="State your address.." style="height:200px"><?php echo $address; ?></textarea>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="image">Upload your image</label>
        </div>
        <div class="col-75">
            <input type="file" id="myFile" name="image" value="<?php echo $filename; ?>" placeholder="Upload your file">
        </div>
        <div class="col-75">
            <img class="profile_img" src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($image); ?>" alt="picture">
        </div>
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
      <a href="dashboard.php" name="cancel" class="cancel">Cancel</a>
      <input type="submit" name="save" value="Save">
    </div>
  </form>
</div>

</body>
</html>