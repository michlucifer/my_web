
<?php
include 'config_db.php';

  echo "HI!!";
  $imgpath = "image/room_sample.jpg";
	
  $hid = $_GET['hid'];
  $userid = $_GET['uid'];

  $checkSingle = $_GET['checkSingle'];
  $checkDouble = $_GET['checkDouble'];
  $checkQueen = $_GET['checkQueen'];
  $checkKing = $_GET['checkKing'];

  $checkSingle = $checkSingle === 'true'? true: false;
  $checkDouble = $checkDouble === 'true'? true: false;
  $checkQueen = $checkQueen === 'true'? true: false;
  $checkKing = $checkKing === 'true'? true: false;

  echo  $checkSingle;
  echo  $checkDouble;
  echo  $checkQueen;
  echo  $checkKing;


  $startDate = $_GET['stYear'] . "-" . $_GET['stMonth'] . "-" . $_GET['stDay'];
  $endDate = $_GET['enYear'] . "-" . $_GET['enMonth'] . "-" . $_GET['enDay'];
  echo $startDate;
  echo $endDate;
  $output='<div class="room-info">
              <ul>';

  if($checkSingle){
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

        $output .='<li>
                      <img src="'.$imgpath. '" width="200">'
                    .'<p>Room Type: '.$roomType.'</p>'
                    .'<p>Price: ' .$price. '</p>'
                    .'<p>RoomNo: ' .$roomNo. '</p>'
                    .'<form action="booking.php" method="POST">'
                         . '<input type="hidden" name="hotelID" value=' .$hid. '>'
                         . '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
                          . '<input type="hidden" name="guestID" value=' .$userid. '>'
                         . '<input type="hidden" name="startDate" value=' .$startDate. '>'
                         . '<input type="hidden" name="endDate" value=' .$endDate. '>'
                         . '<input type="submit" value="BOOKING"/>'
            .'</form></li>';
      }
    }
  }
  if($checkDouble){
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

      
        $output .='<li>
                      <img src="'.$imgpath. '" width="200">'
                    .'<p>Room Type: '.$roomType.'</p>'
                    .'<p>Price: ' .$price. '</p>'
                    .'<p>RoomNo: ' .$roomNo. '</p>'
                    .'<form action="booking.php" method="POST">'
                         . '<input type="hidden" name="hotelID" value=' .$hid. '>'
                         . '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
                          . '<input type="hidden" name="guestID" value=' .$userid. '>'
                         . '<input type="hidden" name="startDate" value=' .$startDate. '>'
                         . '<input type="hidden" name="endDate" value=' .$endDate. '>'
                         . '<input type="submit" value="BOOKING"/>'
            .'</li>';
      }
    }
  }
  if($checkQueen){
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

      
        $output .='<li>
                      <img src="'.$imgpath. '" width="200">'
                    .'<p>Room Type: '.$roomType.'</p>'
                    .'<p>Price: ' .$price. '</p>'
                    .'<p>RoomNo: ' .$roomNo. '</p>'
                    .'<form action="booking.php" method="POST">'
                         . '<input type="hidden" name="hotelID" value=' .$hid. '>'
                         . '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
                          . '<input type="hidden" name="guestID" value=' .$userid. '>'
                         . '<input type="hidden" name="startDate" value=' .$startDate. '>'
                         . '<input type="hidden" name="endDate" value=' .$endDate. '>'
                         . '<input type="submit" value="BOOKING"/>'
            .'</li>';
      }
    }
  }
  if($checkKing){
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

      
        $output .='<li>
                      <img src="'.$imgpath. '" width="200">'
                    .'<p>Room Type: '.$roomType.'</p>'
                    .'<p>Price: ' .$price. '</p>'
                    .'<p>RoomNo: ' .$roomNo. '</p>'
                    .'<form action="booking.php" method="POST">'
                         . '<input type="hidden" name="hotelID" value=' .$hid. '>'
                         . '<input type="hidden" name="roomNo" value=' .$roomNo. '>' 
                          . '<input type="hidden" name="guestID" value=' .$userid. '>'
                         . '<input type="hidden" name="startDate" value=' .$startDate. '>'
                         . '<input type="hidden" name="endDate" value=' .$endDate. '>'
                         . '<input type="submit" value="BOOKING"/>'
            .'</li>';
      }
    }
  }
  $output .='</ul> </div>';
echo $output;
?>
<html>
<head>
  <script src="javascripts/jquery-2.1.0.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />

  <style type="text/css">
  .room-info{
    position: relative;
    overflow: hidden;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    display: inline;
    height:400px;
    width:1000px;
  }
  .room-info ul li {
    float:left;
    margin:100px;
    list-style:none;
    display:block; 
    white-space: nowrap;
  }
  </style>
</head>
</html>