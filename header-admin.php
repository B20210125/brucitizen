<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script></head></html>

<?php session_start();
$type = $_SESSION['type'];
if(!isset($_SESSION['id']) || $type == 'user'){
  session_destroy();
    echo "<script>      
    Swal.fire({
      icon: 'warning',
      text: 'You try to access forbidden webpage.',
  }).then(function() {
    window.location.href = 'index.php';
});
  </script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <style>
      .section-inner {
          position: relative;
          padding-top: 48px;
          padding-bottom: 48px
      }

      .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }
        
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }
        
        .sidenav a:hover {
          color: #f1f1f1;
        }
        
        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
        
        #main {
          transition: margin-left .5s;
          padding: 16px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
  

    </style>
  </head>
  <body>
      <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="dashboard-admin.php">Hello, <?php echo $_SESSION['fullname']; ?></a>
              <a href="dashboard-admin.php">Dashboard</a>
              <a href="user-info.php">User Info</a>
              <a href="user-complaint.php">User Complaint</a>
              <a href="report.php">Report</a>
              <a href="?logout=<?php echo $_SESSION['id'] ?>" name="logout">Logout</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      
      <script>
          function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
          }
          
          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
          }
        </script>
    </body>
</html>

<?php 

    // logout user
    if (isset($_GET['logout'])) {
      echo "<script>
      Swal.fire({
          icon: 'success',
          text: 'You logout to your account!',
          showConfirmButton: false,
      });
      setTimeout(function() {
          window.location.href = 'index.php';
      }, 2000); 
  </script>";
  session_destroy();
  unset($_SESSION['id']);
  unset($_SESSION['fullname']);
  unset($_SESSION['icno']);
  unset($_SESSION['email']);
      exit();
    }

 ?>