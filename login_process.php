<?php
	include 'config_db.php';
	
	$myuserName = $_POST['userName'];
	$mypassword = $_POST['pass'];
	
	$myuserName = stripslashes($myuserName);
	$mypassword = stripslashes($mypassword);
	
	$query = "SELECT * FROM guest WHERE guestName='$myuserName' and guestPassword='$mypassword'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	mysql_close();
	if($count == 1) {
		$myuserid ='';
		while($row= mysql_fetch_array($result)){
				$myuserid = $row['guestID'];
			}
		$seconds = 600 + time();
		setcookie(loggedin, date("F jS - g:i a"), $seconds);
		header("location: index.php?uid=$myuserid");
	}else{
		echo 'Incorrect Username or Password!';
	}
?>