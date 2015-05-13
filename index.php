<?php	
	//check whether logged or not 
		$log_status = isset($_COOKIE['loggedin']);
		if($log_status)	{
			$userid = $_GET['uid'];
		}else{
			$userid = null;
		}
		
		//connect to database
		$username = "root";
		$password = "Ling109114";
		$hostname = "localhost";
		mysql_connect($hostname, $username, $password) or die("Could not connect to database");
		mysql_select_db("hotel_booking") or die("could not find db!");
		$output = 'NO RESULT YET!!';
		
		//collect
		if(isset($_POST['searchName'])) {
			if($_POST['searchName'] === ''){
				$output = ' ';
			}else{
				$searchq = $_POST['searchName'];
				$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

				$query = mysql_query("SELECT * FROM hotel WHERE hotelName LIKE '%$searchq%'") or die("Could not search!");

				$count  = mysql_num_rows($query);
				if($count == 0) {
					$output = 'There was no search results!';
				}else{
					$output = '';
					while($row = mysql_fetch_array($query)){
						$hname = $row['hotelName'];
						$hid = $row['hotelID'];
						$hcity = $row['city'];

						$output .='<tr>'
									.'<td>' .$hname .'</td>'
									.'<td>' .$hcity .'</td>'
									.'<td>' 
										.'<form action="hotel_index.php" method="POST" style="display:inline">'	
											.'<input type="hidden" name="userid" value='.$userid.'>'
											.'<input type="hidden" name="hotelid" value='.$hid.'>'
											.'<input type="submit" value="MORE>>" style="font-size:15px; background-color:rgb(165,222,228); border:0px;"/>'
										.'</form>'
									.'</td>'
								  .'</tr>';
					}
				}
			}
		}
		if(isset($_POST['searchLocation'])) {
			if($_POST['searchLocation'] === ''){
				$output = ' ';
			}else{
				$searchq = $_POST['searchLocation'];
				$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

				$query = mysql_query("SELECT * FROM hotel WHERE city LIKE '%$searchq%'") or die("Could not search!");

				$count  = mysql_num_rows($query);
				$count  = mysql_num_rows($query);
				if($count == 0) {
					$output = 'There was no search results!';
				}else{
					$output = '';
					while($row = mysql_fetch_array($query)){
						$hname = $row['hotelName'];
						$hid = $row['hotelID'];
						$hcity = $row['city'];

						$output .='<tr>'
									.'<td>' .$hname .'</td>'
									.'<td>' .$hcity .'</td>'
									.'<td>' 
										.'<form action="hotel_index.php" method="POST" style="display:inline">'	
											.'<input type="hidden" name="userid" value='.$userid.'>'
											.'<input type="hidden" name="hotelid" value='.$hid.'>'
											.'<input type="submit" value="MORE>>" style="font-size:15px; background-color:rgb(165,222,228); border:0px;"/>'
										.'</form>'
									.'</td>'
								  .'</tr>';
					}
				}
			}
		}
?>
<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
	
</head>
	<body onload="checkLogin(<?php echo $log_status?>)">

	<div class="container-fluid">
		<div class="navbar navbar-default navbar-fixed-top" style="background-color:rgba(0,0,0,0.2);"role="navigation">
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
		
		<div class="search">
			<div class="search-by-name">
				<div class="search-title-name">
					<h2>Search By Name</h2>
				</div>
				<form action="index.php" method="POST" id="search-form-name" class="navbar-form navbar-left" role="search">
					<input type="submit" value=">>" style="background-color:rgba(255,255,255,0.7); border:0px; height:50px;"/>
					<div class="form-group">
						<input type="text" class="form-control" name="searchName" placeholder="Search for members by NAME" style="width:300px;height:50px;border-radius:0;"/>
					</div>
				</form>
			</div>
			<div class="search-by-location">
				<div class="search-title-location">
					<h2>Search By Location</h2>
				</div>
				<form action="index.php" method="POST" id="search-form-location" class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" name="searchLocation" placeholder="Search for members by LOCATION" style="width:300px;height:50px;border-radius:0;"/>
					</div>
					<input type="submit" value="<<" style="background-color:rgba(255,255,255,0.7); border:0px; height:50px;"/>
				</form>
			</div>
		</div>
		<div class="search-result">
			<table class="table" style="font-size:20px;">
						<tr> 
							<td style="width:300px; font-size:30px;">Hotel Name</td>
							<td style="width:300px; font-size:30px;">City</td>
							<td></td>
						</tr>
			<?php print("$output");
			?>
			</table>
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