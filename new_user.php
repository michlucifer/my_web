<?php
	include 'config_db.php';
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = $_POST['user']; 
	$pass = $_POST['pass'];
	$add = $_POST['add'];
	$aff = $_POST['aff'];
	
	mysql_query("INSERT INTO guest (guestName, guestPassword, guestAddress, guestAffilication) VALUES ('$user', '$pass', '$add', '$aff')");
	echo("User created successfully");
	}
	mysql_close();
?>

<html>
	<body>
		<h1>Signup!</h1>
			<form action="new_user.php" method="POST">
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