<?php
	$username = "root";
	$password = "Ling109114";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	$selected = mysql_select_db("hotel_booking", $dbhandle);
	
	if(isset($_POST['userid']) && isset($_POST['pass'])){
	$userid = $_POST['userid'];
	$user = $_POST['user']; 
	$pass = $_POST['pass'];
	$add = $_POST['add'];
	$aff = $_POST['aff'];
	
	mysql_query("INSERT INTO guest (guestID, guestName, guestPassword, guestAddress, guestAffilication) VALUES ('$userid', '$user', '$pass', '$add', '$aff')");
	echo("User created successfully");
	}
	mysql_close();
?>

<html>
	<body>
		<h1>Signup!</h1>
			<form action="new_user.php" method="POST">
				<p>UserID:</p><input type="text" name="userid">
				<p>Username:</p><input type="text" name="user" />
				<p>Password:</p><input type="password" name="pass" />
				<p>Address:</p><input type="text" name="add" />
				<p>Affilication:</p><input type="text" name="aff" />
				<br />
				<input type="submit" value="Signup!" />
			</form>
		<a href="index.php">Return to Login</a>
	</body>
</html>