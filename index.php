<?php
        include 'config_db.php';	
	//check whether logged or not 
		$log_status = isset($_COOKIE['loggedin']);
		if($log_status)	{
			$userid = $_GET['uid'];
			include 'config_db.php';
			$query = mysql_query("SELECT  * FROM guest WHERE guestID='$userid'");
			
			while($row= mysql_fetch_array($query)){
				$userName = $row['guestName'];
			}
		}else{
			$userid = null;
			$userName = '';
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
							<a href="login_userdata.php?uid=<?php echo $userid; ?>" style="color:white;"><?php echo $userName; ?></a>
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
				<form method="POST" id="search-form-name" name="search-form-name" class="navbar-form navbar-left" role="search">
					<input value=">>" onclick="searchByName(this.form.searchName.value,this.form.userid.value)" style="background-color:rgba(255,255,255,0.7); border:0px; height:50px;" type="button" class="btn btn-default"/>
					<div class="form-group">
						<input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
						<input type="text" class="form-control" name="searchName" placeholder="Search for members by NAME" style="width:300px;height:50px;border-radius:0;"/>
					</div>
				</form>
			</div>
			<div class="search-by-location">
				<div class="search-title-location">
					<h2>Search By Location</h2>
				</div>
				<form method="POST" id="search-form-location" name="search-form-location"class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="hidden" name="userid" value="<?php echo $userid; ?>"/>
						<input type="text" class="form-control" name="searchLocation" placeholder="Search for members by LOCATION" style="width:300px;height:50px;border-radius:0;"/>
					</div>
					<input value="<<" onclick="searchByLocation(this.form.searchLocation.value,this.form.userid.value)" style="background-color:rgba(255,255,255,0.7); border:0px; height:50px;" type="button" class="btn btn-default"/>
				</form>
			</div>
		</div>
		<div class="search-result" id="show-result">
					<b>NO RESULT YET!</b>
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
		  function searchByName(hotelname,userid){

		  	if (hotelname == "") {
		  		document.getElementById("show-result").innerHTML = "";
		  		return;
		  	} else { 
		  		if (window.XMLHttpRequest) {
            		// code for IE7+, Firefox, Chrome, Opera, Safari
           			xmlhttp = new XMLHttpRequest();
        		} else {
           			// code for IE6, IE5
           			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        		}
        		xmlhttp.onreadystatechange = function() {
        			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        				document.getElementById("show-result").innerHTML = xmlhttp.responseText;
        			}
        		}
       		xmlhttp.open("GET","index_search_name.php?searchq="+hotelname+"&uid="+userid,true);
        	xmlhttp.send();
        	}
		 }
    </script>
    <script type="text/javascript">
		  function searchByLocation(hotelname,userid){

		  	if (hotelname == "") {
		  		document.getElementById("show-result").innerHTML = "";
		  		return;
		  	} else { 
		  		if (window.XMLHttpRequest) {
            		// code for IE7+, Firefox, Chrome, Opera, Safari
           			xmlhttp = new XMLHttpRequest();
        		} else {
           			// code for IE6, IE5
           			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        		}
        		xmlhttp.onreadystatechange = function() {
        			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        				document.getElementById("show-result").innerHTML = xmlhttp.responseText;
        			}
        		}
       		xmlhttp.open("GET","index_search_location.php?searchq="+hotelname+"&uid="+userid,true);
        	xmlhttp.send();
        	}
		 }
    </script>
	</body>
</html>