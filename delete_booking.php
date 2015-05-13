<?php
				$username = "root";
				$password = "Ling109114";
				$hostname = "localhost";
				mysql_connect($hostname, $username, $password) or die("Could not connect to database");
				mysql_select_db("hotel_booking");

				$gid = $_POST['gid'];
				$hid = $_POST['hid'];
				$rno = $_POST['rno'];
				$startD = $_POST['startD'];

	if(mysql_query("DELETE FROM booking WHERE (guestID='$gid' AND hotelID='$hid' AND roomNo='$rno' AND startDate='$startD')"))
		{
			echo "Successfully!";
		};

?>
<html>
	<body>
		<form name="form1" action="login_userdata.php" method="POST">
			<input type="hidden" name="userid" value="<?php echo $gid?>"/>
		</form>

		<script type="text/javascript">
			setTimeout("document.form1.submit()",1000) 
		</script>
	</body>
</html>