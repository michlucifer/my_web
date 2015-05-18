<?php
	include 'config_db.php';

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
		<form name="form1" action="login_userdata.php?uid=<?php echo $gid; ?>" method="POST">
		</form>

		<script type="text/javascript">
			setTimeout("document.form1.submit()",1000) 
		</script>
	</body>
</html>