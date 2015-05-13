<?php
$hid = $_GET['hid'];	
$userid = $_GET['uid'];	
$hname = '';
$hcity = '';

$log_status = isset($_COOKIE['loggedin']);
		if($log_status)	{
			$userid = $_GET['uid'];
		}else{
			$userid = null;
		}
	$username = "root";
	$password = "Ling109114";
	$hostname = "localhost";
	mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	mysql_select_db("hotel_booking") or die("could not find db!");

	$query = mysql_query("SELECT * FROM hotel WHERE hotelID='$hid'") or die("Could not search!");
	$count  = mysql_num_rows($query);

	if($count === 0) {
		$hname = 'There was no search results!';
	}else{
		while($row = mysql_fetch_array($query))
		{$hname .= $row['hotelName'];
		$hcity .= $row['city'];}

	}

?>
<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
	
</head>
<body  onload="checkLogin(<?php echo $log_status?>)">
	<div class="container-fluid" style="background:#ffffff">
		<div class="navbar navbar-default navbar-fixed-top" style="background-color:rgba(0,0,0,0.7);"role="navigation">
			<div class="container">
				<div class="navbar-header">
					<div class="navbar-collapse.collapse">
						<ul class="nav navbar-nav nav-me-text" >
							<li id="no_login" class="nav-me-text"><a href="login.php" style="color:white;"> LOGIN </a></li>
							<li id="to_logout" class="nav-me-text"><a href="logout.php" style="color:white;"> LOGOUT </a></li>
							<li id="yes_login" class="nav-me-text">
							<a href="login_userdata.php?uid=<?php echo $userid; ?>" style="color:white;"><?php echo $userid; ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="hotel-info">
			<h2><?php echo $hname; ?></h2>
			<div>
				<span>City:<?php echo $hcity; ?></span>
				<span>Address: This Address</span>
				<span>Phone: 226-888-8888</span>
			</div>
			<div class="hotel-info-img">
				<img src="image/hotel_sample.jpg" width="700">
			</div>
		</div>
		<div class="hotel-requirement">
			<div class="title">
				<h2>OPTIONS</h2>
			</div>
			<form action="hotel_search.php" method="POST">
				<input type="hidden" name="hid" value="<?php echo $hid?>"/>
				<input type="hidden" name="userid" value="<?php echo $userid?>"/>
				<div class="check-room-type">
					<div class="subtitle">
						<h4>Choose A Room Type</h4>
					</div>
					<div class="check-single">
						<div class="checkbox">
							<label>
								<input type="hidden" name="checkboxSingle" value="0" />
								<input type="checkbox" name="checkboxSingle" value="1">
								Single
							</label>
						</div>
					</div>
					<div class="check-double">
						<div class="checkbox">
							<label>
								<input type="hidden" name="checkboxDouble" value="0" />
								<input type="checkbox" name="checkboxDouble" value="1">
								Double
							</label>
						</div>
					</div>
					<div class="check-queen">
						<div class="checkbox">
							<label>
								<input type="hidden" name="checkboxQueen" value="0" />
								<input type="checkbox" name="checkboxQueen" value="1">
								Queen
							</label>
						</div>
					</div>
					<div class="check-king">
						<div class="checkbox">
							<label>
								<input type="hidden" name="checkboxKing" value="0" />
								<input type="checkbox" name="checkboxKing" value="1">
								King
							</label>
						</div>
					</div>
				</div>
				<div class="date-range">
					<div class="subtitle">
						<h4>Input Date Range</h4>
					</div>
					<table class="table" frame="void">
						<tr>
							<td>#</td>
							<td>Year</td>
							<td>Month</td>
							<td>Day</td>
						</tr>
						<tr>
							<td>StartDate</td>
							<td><input type="text"  class="form-control" name="stYear"/></td>
							<td><input type="text"  class="form-control" name="stMonth"/></td>
							<td><input type="text"  class="form-control" name="stDay"/></td>
						</tr>
						<tr>
							<td>EndDate</td>
							<td><input type="text"  class="form-control" name="enYear"/></td>
							<td><input type="text"  class="form-control" name="enMonth"/></td>
							<td><input type="text"  class="form-control" name="enDay"/></td>
						</tr>
					</table>
				</div>
				<input type="submit" name="SEARCH!" style="margin-top:30px;  font-family: "Opensans Regular";"/>
			</form>
		</div>
	</div>
	<script type="text/javascript">
          function checkLogin(iflog){
			  $("#to_logout").hide();
			  $("#yes_login").hide();
			if(iflog){
				$("#no_login").hide();
				$("#to_logout").show();
				$("#yes_login").show();
				}
		  }
    </script>
</body>
</html>