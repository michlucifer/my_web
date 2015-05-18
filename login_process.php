<?php
	include 'config_db.php';
	
	$myuserid = $_POST['userid'];
	$mypassword = $_POST['pass'];
	
	$myuserid = stripslashes($myuserid);
	$mypassword = stripslashes($mypassword);
	
	$query = "SELECT * FROM guest WHERE guestID='$myuserid' and guestPassword='$mypassword'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	mysql_close();
	if($count == 1) {
		$seconds = 600 + time();
		setcookie(loggedin, date("F jS - g:i a"), $seconds);
		header("location: index.php?uid=$myuserid");
	}else{
		echo 'Incorrect Username or Password!';
	}
?>