<?php
include 'config_db.php';

  				$imgpath = "image/room_sample.jpg";
				$userid = $_GET['uid'];

				$query = mysql_query("SELECT  * FROM guest WHERE guestID='$userid'");
			
				while($row= mysql_fetch_array($query)){
				$userName = $row['guestName'];
				}

				echo $userid;

				$query = mysql_query("SELECT * FROM booking WHERE guestID='$userid'") or die("Could not search!");
				$count  = mysql_num_rows($query);


				
				if($count == 0) {
				$output = 'No Booking';
				}else{
				$output='<div class="room-info">
              				<ul>';
				while($row = mysql_fetch_array($query)){
					$hid = $row['hotelID'];
					$rno = $row['roomNo'];
					$startD = $row['startDate'];
					$endD = $row['endDate'];
					
					$output .='<li>
                      <img src="'.$imgpath. '" width="200">'
                    .'<p>HotelID: '.$hid.'</p>'
                    .'<p>RoomNo: ' .$rno. '</p>'
                    .'<p>startDate: ' .$startD. '</p>'
                    .'<p>endDate: ' .$endD. '</p>'

							.'<form action="delete_booking.php" method="POST">'
								.'<input type="hidden" name="gid" value='.$userid.'>'
								.'<input type="hidden" name="hid" value='.$hid.'>'
								.'<input type="hidden" name="rno" value='.$rno.'>'
								.'<input type="hidden" name="startD" value='.$startD.'>'
								.'<input type="submit" value="DELETE"/>'
								
					.'</form></li>';
				}
				}
	$output .='</ul> </div>';
			
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
	<body>
		<div class="fluid-container">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<div class="navbar-collapse.collapse">
							<ul class="nav navbar-nav">
								<li><a href="index.php?uid=<?php echo $userid; ?>">HOME</a></li>
								<li><a href="login_userdata.php?uid=<?php echo $userid; ?>" style="color:black;"><?php echo $userName; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-booking-info">
				<h1 style="margin-top:100px;">Your Booking Records!</h1>
				<div class="room-info">
				<?php
					print("$output");
				?>
				</div>
			</div>
		</div>
		
	</body>
</html>