<?php
	include 'config_db.php';

	$hotelID = $_GET['hotelID'];
	$roomNo = $_GET['roomNo'];
	$guestID = $_GET['guestID'];
	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	echo $hotelID;
	echo $roomNo;
	echo $guestID;
	echo $startDate;
	if(!mysql_query("INSERT INTO booking (hotelID, roomNo, guestID, startDate, endDate) VALUES ('$hotelID', '$roomNo', '$guestID', '$startDate', '$endDate')"))
	{
		echo ("Insert Failed!");
		echo("Error description: " . mysqli_error($con));
	}
	else{
		echo ("Insert Successfully!");
	}
?>
<html>
	<body>
		<form name="form1" action="hotel_index.php?uid=<?php echo $guestID; ?>&hid=<?php echo $hotelID?>" method="POST">
		</form>

		<script type="text/javascript">
			setTimeout("document.form1.submit()",5000) 
		</script>
	</body>
</html>