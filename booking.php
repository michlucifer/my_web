<?php
	$username = "root";
	$password = "Ling109114";
	$hostname = "localhost";
	mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	mysql_select_db("hotel_booking") or die("could not find db!");

	$hotelID = $_POST['hotelID'];
	$roomNo = $_POST['roomNo'];
	$guestID = $_POST['guestID'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	mysql_query("INSERT INTO booking (hotelID, roomNo, guestID, startDate, endDate) VALUES ('$hotelID', '$roomNo', '$guestID', '$startDate', '$endDate')");
	echo ("Insert Successfully!");
?>