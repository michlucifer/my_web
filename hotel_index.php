<?php
include 'config_db.php';

$hid = $_GET['hid'];	
$userid = $_GET['uid'];	
$hname = '';
$hcity = '';

$log_status = isset($_COOKIE['loggedin']);
		if($log_status)	{
			$userid = $_GET['uid'];
			$query = mysql_query("SELECT  * FROM guest WHERE guestID='$userid'");
			
			while($row= mysql_fetch_array($query)){
				$userName = $row['guestName'];
			}
		}else{
			$userid = null;
			$userName ='';
		}

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
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	
</head>
<body  onload="checkLogin(<?php echo $log_status?>)">
	<div class="container-fluid" style="background:#ffffff">
		<div class="navbar navbar-default navbar-fixed-top" style="background-color:rgba(0,0,0,0.7);"role="navigation">
			<div class="container">
				<div class="navbar-header">
					<div class="navbar-collapse.collapse">
						<ul class="nav navbar-nav nav-me-text" >
							<li class="nav-me-text"><a href="index.php?uid=<?php echo $userid; ?>" style="color:white;"> HOME </a></li>
							<li id="no_login" class="nav-me-text"><a href="login.php" style="color:white;"> LOGIN </a></li>
							<li id="to_logout" class="nav-me-text"><a href="logout.php" style="color:white;"> LOGOUT </a></li>
							<li id="yes_login" class="nav-me-text">
							<a href="login_userdata.php?uid=<?php echo $userid; ?>" style="color:white;"><?php echo $userName; ?></a>
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
			<div class="two-info">
				<div class="hotel-info-img" style="float:left; display:inline">
					<img src="image/hotel_sample.jpg" width="700">
				</div>
				<div class="map" style="float:right;display:inline;position:relative; padding-right:30px;">
					<div id="googleMap" style="width:450px;height:380px;"></div>
				</div>
			</div>
		</div>
		<div class="hotel-requirement" style="clear:both; position:relative; padding-top:50px">
			<div class="title">
				<h2>BOOKING &nbsp;&nbsp;RIGHT &nbsp;&nbsp;NOW!</h2>
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
								<input type="checkbox" name="checkboxSingle" value="1">
								Single
							</label>
						</div>
					</div>
					<div class="check-double">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="checkboxDouble" value="1">
								Double
							</label>
						</div>
					</div>
					<div class="check-queen">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="checkboxQueen" value="1">
								Queen
							</label>
						</div>
					</div>
					<div class="check-king">
						<div class="checkbox">
							<label>
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
							<td><input type="text"  class="form-control" name="stYear" 
									   style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="4"
									   /></td>
							<td><input type="text"  class="form-control" name="stMonth"
								       style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="2" 
									   /></td>
							<td><input type="text"  class="form-control" name="stDay"
								       style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="2" 
									   /></td>
						</tr>
						<tr>
							<td>EndDate</td>
							<td><input type="text"  class="form-control" name="enYear"
									   style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="4" /></td>
							<td><input type="text"  class="form-control" name="enMonth"
								       style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="2" 
									   /></td>
							<td><input type="text"  class="form-control" name="enDay"
								       style="IME-MODE: disabled;"
									   onkeyup="this.value=this.value.replace(/\D/g,'')"
									   onafterpaste="this.value=this.value.replace(/\D/g,'')" 
									   maxlength="2" /></td>
						</tr>
					</table>
				</div>
				<input type="button" value="SEARCH!" style="margin-top:30px;  font-family: "Opensans Regular";" class="btn btn-default"
				onclick="searchRoom( this.form.stYear.value,  this.form.stMonth.value,  this.form.stDay.value,  this.form.enYear.value,  this.form.enMonth.value,  this.form.enDay.value
									, this.form.checkboxSingle.checked, this.form.checkboxDouble.checked, this.form.checkboxQueen.checked, this.form.checkboxKing.checked
				                    ,this.form.hid.value, this.form.userid.value)"/>
			</form>
		</div>
		<div id="show-room-result">
			<b>Click SUBMIT to see Result!</b>
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
    <script type="text/javascript">
        
	function searchRoom(stYear, stMonth, stDay, enYear, enMonth, enDay, checkSingle, checkDouble, checkQueen, checkKing, hid, uid){

		if(uid === '')
		{
			var r = confirm("You Need To LOGIN First!\n Are You Gonna Login??");
			if (r == true) {
				window.location.href="login.php" ; 
			}
		}else{
			var validinput = true;

			if(stMonth>12 || stMonth<1 || enMonth>12 || enMonth<1){
				validinput = false;
				alert('Month should be between 1 to 12 !!!');
			}
			if(stDay>31 || stDay<1 || enDay>31 || enDay<1){
				validinput = false;
				alert('Day should be between 1 to 31 !!!');
			}

			if(validinput){
				if (window.XMLHttpRequest) {
            		// code for IE7+, Firefox, Chrome, Opera, Safari
            		xmlhttp = new XMLHttpRequest();
            	} else {
           			// code for IE6, IE5
           			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
           		}
           		xmlhttp.onreadystatechange = function() {
           			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           				document.getElementById("show-room-result").innerHTML = xmlhttp.responseText;
           			}
           		}
           		xmlhttp.open("GET","hotel_search.php?stYear="+stYear
           			+"&stMonth="+stMonth
           			+"&stDay="+stDay
           			+"&enYear="+stYear
           			+"&enMonth="+enMonth
           			+"&enDay="+enDay
           			+"&checkSingle="+checkSingle
           			+"&checkDouble="+checkDouble
           			+"&checkQueen="+checkQueen
           			+"&checkKing="+checkKing
           			+"&hid="+hid
           			+"&uid="+uid,true);
           		xmlhttp.send();
           	}
        }
    }
    </script>
    <script >
    function initialize() {
    	var mapProp = {
    		center:new google.maps.LatLng(51.508742,-0.120850),
    		zoom:5,
    		mapTypeId:google.maps.MapTypeId.ROADMAP
    	};
    	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
</body>
</html>