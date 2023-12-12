<?php $pageTitle = "Dashboard"; include "header.php"; ?>
<?php require_once "process/dashboard-process.php"  ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Home Page </title>
<style>

    body {
        box-sizing: border-box;
        margin: 0;
        font-family:  sans-serif;
        font-size: 15px;
        line-height: 1.5
    }

    section {
    display: block
    }

    .row-padding:after,
    .row-padding:before {
    content: "";
    display: table;
    clear: both
   }
   .row-padding{
    padding: 0 8px
   }

   .text-center {
    text-align: center !important
}

.padding-64 {
    padding-top: 64px !important;
    padding-bottom: 64px !important
}

.col {
    float: left;
    width: 100%
}


.margin-bottm {
    margin-bottom: 16px !important
}

@media (min-width:601px) {

    .col {
        width: 33.33333%
    }

}

.ul {
    list-style-type: none;
    padding: 0;
    margin: 0
}

.ul li {
    padding: 8px 16px;
    border-bottom: 1px solid #ddd
}

.ul li:last-child {
    border-bottom: none
}

.border-home {
    border: 1px solid #ccc !important
}

.shadow:hover {
    box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.2), 0 4px 20px 0 rgba(0, 0, 0, 0.19)
}

.font-xl {
    font-size: 24px !important
}

.padding16 {
    padding-top: 16px !important;
    padding-bottom: 16px !important
}

.padding24 {
    padding-top: 24px !important;
    padding-bottom: 24px !important
}

.button-home {
    border:none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    white-space: normal
}

.button-home:hover {
    color: #000 !important;
    background-color: #ccc !important
}

.teal {
    color: #fff !important;
    background-color: #009688 !important
}

.padding-large {
    padding: 12px 24px !important
}

.ticket-section{
 background-color: black;
 color: white;
 padding: 20px;
 font-family: sans-serif;
}

.ticket-section p{
 font-size: 20px;
 font-weight: 300;
}

.home-header {
    background-color: teal;
    padding: 30px;
    margin: 0;
    text-align: center;
    color: white;
    font-size: 30px;
}

.home-header p{
    font-size: 20px
}
.home-header a{
    text-decoration: none;
    color: black;
    font-weight: 600;
}

.home-header a:hover{
    color: #8bf0e2;
}


</style>
<body id="main">

<div class="home-header">
<h2>Welcome to BruCitizen Portal </h2>
<p>Please do make your concern at <a href="complaint.php">Lodge Complaint</a></p>
</div>



<!-- Slide Show -->
<section>
  <img class="mySlides" src="img/image1.png"
  style="width:100%">
  <img class="mySlides" src="img/image2.png"
  style="width:100%">
  <img class="mySlides" src="img/image3.png"
  style="width:100%">
</section>

<!-- Ticket  -->
<div class="row-padding text-center padding-64">
    <div class="ticket-section">
    <h2>YOUR TICKETS</h2>
    <p>Your tickets will be appear at this section</p>
    <p>Your current open ticket: <b><?php echo $rowcount; ?></p></b>
    </div><br>

<form action="dashboard.php" method="POST">
    <?php while ($row = mysqli_fetch_array($tbl)): 
        if($row['status'] == 'open'): ?>
    <div class="col margin-bottm">
      <ul class="ul border-home shadow">
        <li >
          <p class="font-xl">TICKET ID: <?php echo $row['ticketID']; ?></p>
        </li>
        <li class="padding16"><b>Title:</b> <?php echo $row['title']; ?></li>
        <li class="padding16"><b>Status</b> <?php echo $row['status']; ?></li>
        <li class="padding24">
          <a class="button-home teal padding-large" href="view-detail.php?ticketID=<?php echo $row['ticketID'] ?>"><i class="fa fa-eye"></i> VIEW</a>
          <a class="button-home teal padding-large" href="edit-detail.php?edit-ticketID=<?php echo $row['ticketID'] ?>"><i class="fa fa-pencil-square"></i> EDIT</a>
        </li>
      </ul>
    </div>
    <?php endif; ?>
    <?php if($row['status'] == 'close'): ?>
    <div class="col margin-bottm">
      <ul class="ul border-home shadow">
        <li >
          <p class="font-xl">TICKET ID: <?php echo $row['ticketID']; ?></p>
        </li>
        <li class="padding16"><b>Title:</b> <?php echo $row['title']; ?></li>
        <li class="padding16"><b>Status</b> <?php echo $row['status']; ?></li>
        <li class="padding24">
          <a class="button-home teal padding-large" href="view-detail.php?ticketID=<?php echo $row['ticketID'] ?>"><i class="fa fa-eye"></i> VIEW</a>
        </li>
      </ul>
    </div>
    <?php endif; ?>
    <?php endwhile; ?>

    </div>

</form>
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

<?php include "footer.php"; ?>

</body>
</html>
