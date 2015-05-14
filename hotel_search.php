<style>
.css {color:red;}
</style>
<?php
include 'config_db.php';

	$king = $_POST['checkboxKing'];
	echo $king;

	$hid = $_POST['hid'];
	$userid = $_POST['userid'];
	$startDate = $_POST['stYear'] . "-" . $_POST['stMonth'] . "-" . $_POST['stDay'];
	$endDate = $_POST['enYear'] . "-" . $_POST['enMonth'] . "-" . $_POST['enDay'];
	echo $startDate;
	echo $endDate;

	$output = ' ';

	if($_POST['checkboxSingle']){
		$query = mysql_query("SELECT *
			FROM room NATURAL JOIN hotel
			WHERE (room.rmType='Single') AND (hotel.hotelID='$hid')
			AND CONCAT(hotelID,roomNo) NOT IN(
				SELECT CONCAT(hotelID,roomNo)
				FROM room NATURAL JOIN booking
				WHERE (endDate>='$startDate'AND endDate<='$endDate') OR 
				(startDate>='startDate'AND startDate<='endDate')OR
				(startDate<='startDate'AND endDate>='startDate')OR
				(startDate<='endDate'AND endDate>='endDate'))");
		$count  = mysql_num_rows($query);
		if($count == 0){
			$output .= 'NO SINGLE!';
		}else{
			while($row = mysql_fetch_array($query)){
				$roomNo = $row['roomNo'];
				$price = $row['price'];
				$roomType = $row['rmtype'];

				$output .='<div>' .$roomNo. ' ' .$price. ' '.$roomType. '<form action="booking.php" method="POST">'
						. '<input type="hidden" name="hotelID" value=' .$hid. '>'
						. '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
						. '<input type="hidden" name="guestID" value=' .$userid. '>'
						. '<input type="hidden" name="startDate" value=' .$startDate. '>'
						. '<input type="hidden" name="endDate" value=' .$endDate. '>'
						. '<input type="submit" value="BOOKING"/>'
						.'</div>';
			}
		}
	}
	if($_POST['checkboxDouble']){
		$query = mysql_query("SELECT *
			FROM room NATURAL JOIN hotel
			WHERE (room.rmType='Double') AND (hotel.hotelID='$hid')
			AND CONCAT(hotelID,roomNo) NOT IN(
				SELECT CONCAT(hotelID,roomNo)
				FROM room NATURAL JOIN booking
				WHERE (endDate>='$startDate'AND endDate<='$endDate') OR 
				(startDate>='startDate'AND startDate<='endDate')OR
				(startDate<='startDate'AND endDate>='startDate')OR
				(startDate<='endDate'AND endDate>='endDate'))");
		$count  = mysql_num_rows($query);
		if($count == 0){
			$output .= 'NO DOUBLE!';
		}else{
			while($row = mysql_fetch_array($query)){
				$roomNo = $row['roomNo'];
				$price = $row['price'];
				$roomType = $row['rmtype'];

				$output .='<div class="css">' .$roomNo. ' ' .$price. ' '.$roomType. '<form action="booking.php" method="POST">'
						. '<input type="hidden" name="hotelID" value=' .$hid. '>'
						. '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
						. '<input type="hidden" name="guestID" value=' .$userid. '>'
						. '<input type="hidden" name="startDate" value=' .$startDate. '>'
						. '<input type="hidden" name="endDate" value=' .$endDate. '>'
						. '<input type="submit" value="BOOKING"/>'
						.'</div>';
			}
		}
	}
	if($_POST['checkboxQueen']){
		$query = mysql_query("SELECT *
			FROM room NATURAL JOIN hotel
			WHERE (room.rmType='Queen') AND (hotel.hotelID='$hid')
			AND CONCAT(hotelID,roomNo) NOT IN(
				SELECT CONCAT(hotelID,roomNo)
				FROM room NATURAL JOIN booking
				WHERE (endDate>='$startDate'AND endDate<='$endDate') OR 
				(startDate>='startDate'AND startDate<='endDate')OR
				(startDate<='startDate'AND endDate>='startDate')OR
				(startDate<='endDate'AND endDate>='endDate'))");
		$count  = mysql_num_rows($query);
		if($count == 0){
			$output .= 'NO QUEEN!';
		}else{
			while($row = mysql_fetch_array($query)){
				$roomNo = $row['roomNo'];
				$price = $row['price'];
				$roomType = $row['rmtype'];

				$output .='<div>' .$roomNo. ' ' .$price. ' '.$roomType. '<form action="booking.php" method="POST">'
						. '<input type="hidden" name="hotelID" value=' .$hid. '>'
						. '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
						. '<input type="hidden" name="guestID" value=' .$userid. '>'
						. '<input type="hidden" name="startDate" value=' .$startDate. '>'
						. '<input type="hidden" name="endDate" value=' .$endDate. '>'
						. '<input type="submit" value="BOOKING"/>'
						.'</div>';
			}
		}
	}
	if($_POST['checkboxKing']){
		$query = mysql_query("SELECT *
			FROM room NATURAL JOIN hotel
			WHERE (room.rmType='King') AND (hotel.hotelID='$hid')
			AND CONCAT(hotelID,roomNo) NOT IN(
				SELECT CONCAT(hotelID,roomNo)
				FROM room NATURAL JOIN booking
				WHERE (endDate>='$startDate'AND endDate<='$endDate') OR 
				(startDate>='startDate'AND startDate<='endDate')OR
				(startDate<='startDate'AND endDate>='startDate')OR
				(startDate<='endDate'AND endDate>='endDate'))");
		$count  = mysql_num_rows($query);
		if($count == 0){
			$output .= 'NO KING!';
		}else{
			while($row = mysql_fetch_array($query)){
				$roomNo = $row['roomNo'];
				$price = $row['price'];
				$roomType = $row['rmtype'];

				$output .='<div>' .$roomNo. ' ' .$price. ' '.$roomType. '<form action="booking.php" method="POST">'
						. '<input type="hidden" name="hotelID" value=' .$hid. '>'
						. '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
						. '<input type="hidden" name="guestID" value=' .$userid. '>'
						. '<input type="hidden" name="startDate" value=' .$startDate. '>'
						. '<input type="hidden" name="endDate" value=' .$endDate. '>'
						. '<input type="submit" value="BOOKING"/>'
						.'</div>';
			}
		}
	}

print("$output");
?>