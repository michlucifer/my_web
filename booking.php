<?php
	include 'config_db.php';

	$hotelID = $_POST['hotelID'];
	$roomNo = $_POST['roomNo'];
	$guestID = $_POST['guestID'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	if(mysql_query("INSERT INTO booking (hotelID, roomNo, guestID, startDate, endDate) VALUES ('$hotelID', '$roomNo', '$guestID', '$startDate', '$endDate')"))
	{
		echo ("Insert Successfully!");
	}
	else{
		echo ("Insert Failed!");
	}
?>
<html>
	<body>
		<form name="form1" action="hotel_index.php?uid=<?php echo $guestID; ?>&hid=<?php echo $hotelID?>" method="POST">
		</form>

		<script type="text/javascript">
			setTimeout("document.form1.submit()",1000) 
		</script>
	</body>
</html>