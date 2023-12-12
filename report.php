<?php $pageTitle = "Dashboard"; include "header-admin.php"; ?>
<?php require_once "process/report-process.php"  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/report.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Report</title>
</head>
<body>
<form method="POST">
	<br>
    <div class="group">
    	<button name="user">User's Info</button>
    	<button name="open">Open Ticket</button>
        <button name="close">Close Ticket</button>
    </div>
</form>
    <?php if(isset($_POST['user']) == true): ?><br>
    <h2 class="title">User Details</h2>
    <!-- <div class="title">
    	<button name="user">Sort by Fullname DESC</button>
    	<button name="open">Open Ticket</button>
        <button name="close">Close Ticket</button>
    </div> -->
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th>User ID</th>
								<th>Fullname</th>
                                <th>IC Number</th>
								<th>Email</th>
								<th>Last Activity</th>
							</tr>
						</thead>
						<?php while($row = mysqli_fetch_array($result)): ?>
						<tbody>
							<tr>
								<td><?php echo $row['userID']; ?></td>
								<td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['icnumber']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['last_activity']; ?></td>
							</tr>
						</tbody>
						<?php endwhile; ?>
					</table>
					<br><br>
					<center><button class="button"><a href="pdf/userinfo-pdf.php" target="_blank">Generate PDF</a></button></center>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

<?php 
	$currentDate = date('Y-m-d');
	$query = "SELECT * FROM register WHERE type='user' and last_activity LIKE '$currentDate%'";
    $tbl  = mysqli_query($conn, $query);
	$rowcount = mysqli_num_rows($tbl);

	$query_sec = "SELECT * FROM register WHERE type='user' and last_activity NOT LIKE '$currentDate%' ";
    $tbl_sec  = mysqli_query($conn, $query_sec);
	$rowcount_sec = mysqli_num_rows($tbl_sec);

?>

        var data = google.visualization.arrayToDataTable([
          ['User account status', 'Number of Users'],
          ['Active user',     <?php echo $rowcount; ?>],
          ['Unactive user',      <?php echo $rowcount_sec; ?>],
        ]);

        var options = {
          title: 'Registered users detail'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart" style="width: 900px; height: 500px;"></div>

	
<?php endif; ?>


<?php if(isset($_POST['open']) == true): ?><br>
	<h2 class="title">Open Ticket</h2>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th>Ticket ID</th>
								<th>Title</th>
								<th>Status</th>
								<th>Created by</th>
								<th>Date Created</th>
							</tr>
						</thead>
						<?php while($row = mysqli_fetch_array($result01)): ?>
						<tbody>
							<tr>
								<td><?php echo $row['ticketID']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['fullname']."(".$row['userID'].")"; ?></td>
								<td><?php echo $row['date_created']; ?></td>
							</tr>
						</tbody>
						<?php endwhile; ?>
					</table>
					<br><br>
					<center><button class="button"><a href="pdf/open-pdf.php" target="_blank">Generate PDF</a></button></center>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

<?php 
	$query = "SELECT * FROM usercomplaint where status='open'";
    $tbl  = mysqli_query($conn, $query);
	$rowcount = mysqli_num_rows($tbl);

	$query_sec = "SELECT * FROM usercomplaint where status='close'";
    $tbl_sec  = mysqli_query($conn, $query_sec);
	$rowcount_sec = mysqli_num_rows($tbl_sec);

?>

        var data = google.visualization.arrayToDataTable([
          ['Ticket complaints status', 'Number of tickets'],
          ['Open tickets',     <?php echo $rowcount; ?>],
          ['Close tickets',      <?php echo $rowcount_sec; ?>],
        ]);

        var options = {
          title: 'Ticket complaints status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart2" style="width: 900px; height: 500px;"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

<?php 
	$query = "SELECT * FROM usercomplaint where ministry='Jabatan Perdana Menteri'";
    $tbl  = mysqli_query($conn, $query);
	$rowcount = mysqli_num_rows($tbl);

	$query2 = "SELECT * FROM usercomplaint where ministry='Kementerian Kewangan dan Ekonomi'";
    $tbl2 = mysqli_query($conn, $query2);
	$rowcount2 = mysqli_num_rows($tbl2);

	$query3 = "SELECT * FROM usercomplaint where ministry='Kementerian Pertahanan'";
    $tbl3 = mysqli_query($conn, $query3);
	$rowcount3 = mysqli_num_rows($tbl3);

	$query4 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Luar Negeri'";
    $tbl4 = mysqli_query($conn, $query4);
	$rowcount4 = mysqli_num_rows($tbl4);

	$query5 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Dalam Negeri'";
    $tbl5 = mysqli_query($conn, $query5);
	$rowcount5 = mysqli_num_rows($tbl5);

	$query6 = "SELECT * FROM usercomplaint where ministry='Kementerian Pendidikan'";
    $tbl6 = mysqli_query($conn, $query6);
	$rowcount6 = mysqli_num_rows($tbl6);
	
	$query7 = "SELECT * FROM usercomplaint where ministry='Kementerian Sumber-Sumber Utama dan Pelancongan'";
    $tbl7 = mysqli_query($conn, $query7);
	$rowcount7 = mysqli_num_rows($tbl7);

	$query8 = "SELECT * FROM usercomplaint where ministry='Kementerian Pembangunan'";
    $tbl8 = mysqli_query($conn, $query8);
	$rowcount8 = mysqli_num_rows($tbl8);

	$query9 = "SELECT * FROM usercomplaint where ministry='Kementerian Kesihatan'";
    $tbl9 = mysqli_query($conn, $query9);
	$rowcount9 = mysqli_num_rows($tbl9);

	$query10 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Ugama'";
    $tbl10 = mysqli_query($conn, $query10);
	$rowcount10 = mysqli_num_rows($tbl10);

	$query11 = "SELECT * FROM usercomplaint where ministry='Kementerian Pengangkutan dan Infokomunikasi'";
    $tbl11 = mysqli_query($conn, $query11);
	$rowcount11 = mysqli_num_rows($tbl11);


?>

        var data = google.visualization.arrayToDataTable([
          ['List of minitry', 'Number of tickets'],
          ['Jabatan Perdana Menteri',     <?php echo $rowcount; ?>],
          ['Kementerian Kewangan dan Ekonomi',      <?php echo $rowcount2; ?>],
		  ['Kementerian Pertahanan',      <?php echo $rowcount3; ?>],
		  ['Kementerian Hal Ehwal Luar Negeri',      <?php echo $rowcount4; ?>],
		  ['Kementerian Hal Ehwal Dalam Negeri',      <?php echo $rowcount5; ?>],
		  ['Kementerian Pendidikan',      <?php echo $rowcount6; ?>],
		  ['Kementerian Sumber-Sumber Utama dan Pelancongan',      <?php echo $rowcount7; ?>],
		  ['Kementerian Pembangunan',      <?php echo $rowcount8; ?>],
		  ['Kementerian Kesihatan',      <?php echo $rowcount9; ?>],
		  ['Kementerian Hal Ehwal Ugama',      <?php echo $rowcount10; ?>],
		  ['Kementerian Pengangkutan dan Infokomunikasi',      <?php echo $rowcount11; ?>],
        ]);

        var options = {
          title: 'Complaint tickets for each departments'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart3" style="width: 900px; height: 500px;"></div>

<?php endif; ?>


<?php if(isset($_POST['close']) == true): ?><br>
	<h2 class="title">Close Ticket</h2>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th>Ticket ID</th>
								<th>Title</th>
								<th>Status</th>
								<th>Created by</th>
								<th>Date Created</th>
							</tr>
						</thead>
						<?php while($row = mysqli_fetch_array($result02)): ?>
						<tbody>
							<tr>
								<td><?php echo $row['ticketID']; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['fullname']."(".$row['userID'].")"; ?></td>
								<td><?php echo $row['date_created']; ?></td>
							</tr>
						</tbody>
						<?php endwhile; ?>
					</table>
					<br><br>
					<center><button class="button"><a href="pdf/close-pdf.php" target="_blank">Generate PDF</a></button></center>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

<?php 
	$query = "SELECT * FROM usercomplaint where status='open'";
    $tbl  = mysqli_query($conn, $query);
	$rowcount = mysqli_num_rows($tbl);

	$query_sec = "SELECT * FROM usercomplaint where status='close'";
    $tbl_sec  = mysqli_query($conn, $query_sec);
	$rowcount_sec = mysqli_num_rows($tbl_sec);

?>

        var data = google.visualization.arrayToDataTable([
          ['Ticket complaints status', 'Number of tickets'],
          ['Open tickets',     <?php echo $rowcount; ?>],
          ['Close tickets',      <?php echo $rowcount_sec; ?>],
        ]);

        var options = {
          title: 'Ticket complaints status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart2" style="width: 900px; height: 500px;"></div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

<?php 
	$query = "SELECT * FROM usercomplaint where ministry='Jabatan Perdana Menteri'";
    $tbl  = mysqli_query($conn, $query);
	$rowcount = mysqli_num_rows($tbl);

	$query2 = "SELECT * FROM usercomplaint where ministry='Kementerian Kewangan dan Ekonomi'";
    $tbl2 = mysqli_query($conn, $query2);
	$rowcount2 = mysqli_num_rows($tbl2);

	$query3 = "SELECT * FROM usercomplaint where ministry='Kementerian Pertahanan'";
    $tbl3 = mysqli_query($conn, $query3);
	$rowcount3 = mysqli_num_rows($tbl3);

	$query4 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Luar Negeri'";
    $tbl4 = mysqli_query($conn, $query4);
	$rowcount4 = mysqli_num_rows($tbl4);

	$query5 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Dalam Negeri'";
    $tbl5 = mysqli_query($conn, $query5);
	$rowcount5 = mysqli_num_rows($tbl5);

	$query6 = "SELECT * FROM usercomplaint where ministry='Kementerian Pendidikan'";
    $tbl6 = mysqli_query($conn, $query6);
	$rowcount6 = mysqli_num_rows($tbl6);
	
	$query7 = "SELECT * FROM usercomplaint where ministry='Kementerian Sumber-Sumber Utama dan Pelancongan'";
    $tbl7 = mysqli_query($conn, $query7);
	$rowcount7 = mysqli_num_rows($tbl7);

	$query8 = "SELECT * FROM usercomplaint where ministry='Kementerian Pembangunan'";
    $tbl8 = mysqli_query($conn, $query8);
	$rowcount8 = mysqli_num_rows($tbl8);

	$query9 = "SELECT * FROM usercomplaint where ministry='Kementerian Kesihatan'";
    $tbl9 = mysqli_query($conn, $query9);
	$rowcount9 = mysqli_num_rows($tbl9);

	$query10 = "SELECT * FROM usercomplaint where ministry='Kementerian Hal Ehwal Ugama'";
    $tbl10 = mysqli_query($conn, $query10);
	$rowcount10 = mysqli_num_rows($tbl10);

	$query11 = "SELECT * FROM usercomplaint where ministry='Kementerian Pengangkutan dan Infokomunikasi'";
    $tbl11 = mysqli_query($conn, $query11);
	$rowcount11 = mysqli_num_rows($tbl11);


?>

        var data = google.visualization.arrayToDataTable([
          ['List of minitry', 'Number of tickets'],
          ['Jabatan Perdana Menteri',     <?php echo $rowcount; ?>],
          ['Kementerian Kewangan dan Ekonomi',      <?php echo $rowcount2; ?>],
		  ['Kementerian Pertahanan',      <?php echo $rowcount3; ?>],
		  ['Kementerian Hal Ehwal Luar Negeri',      <?php echo $rowcount4; ?>],
		  ['Kementerian Hal Ehwal Dalam Negeri',      <?php echo $rowcount5; ?>],
		  ['Kementerian Pendidikan',      <?php echo $rowcount6; ?>],
		  ['Kementerian Sumber-Sumber Utama dan Pelancongan',      <?php echo $rowcount7; ?>],
		  ['Kementerian Pembangunan',      <?php echo $rowcount8; ?>],
		  ['Kementerian Kesihatan',      <?php echo $rowcount9; ?>],
		  ['Kementerian Hal Ehwal Ugama',      <?php echo $rowcount10; ?>],
		  ['Kementerian Pengangkutan dan Infokomunikasi',      <?php echo $rowcount11; ?>],
        ]);

        var options = {
          title: 'Complaint tickets for each departments'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>

<div id="piechart3" style="width: 900px; height: 500px;"></div>

<?php endif; ?>



</body>
</html>