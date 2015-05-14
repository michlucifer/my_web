<?php
	include 'config_db.php';

	$hotelID = $_POST['hotelID'];
	$roomNo = $_POST['roomNo'];
	$guestID = $_POST['guestID'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	mysql_query("INSERT INTO booking (hotelID, roomNo, guestID, startDate, endDate) VALUES ('$hotelID', '$roomNo', '$guestID', '$startDate', '$endDate')");
	echo ("Insert Successfully!");
?>