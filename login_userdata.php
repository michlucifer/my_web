<?php
include 'config_db.php';

				$userid = $_GET['uid'];
				echo $userid;

				$query = mysql_query("SELECT * FROM booking WHERE guestID='$userid'") or die("Could not search!");
				$count  = mysql_num_rows($query);
				
				if($count == 0) {
				$output = 'No Booking';
				}else{
				while($row = mysql_fetch_array($query)){
					$hid = $row['hotelID'];
					$rno = $row['roomNo'];
					$startD = $row['startDate'];
					$endD = $row['endDate'];
					
					$output .='<div>'.$hid.'   '.$rno.'   '.$startD.'   '.$endD
							.'<form action="delete_booking.php" method="POST">'
								.'<input type="hidden" name="gid" value='.$userid.'>'
								.'<input type="hidden" name="hid" value='.$hid.'>'
								.'<input type="hidden" name="rno" value='.$rno.'>'
								.'<input type="hidden" name="startD" value='.$startD.'>'
								.'<input type="submit" value="DELETE"/>'
								.'</form></div>';
				}
				}
				
			
?>

<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
</head>
	<body>
		<div class="fluid-container">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<div class="navbar-collapse.collapse">
							<ul class="nav navbar-nav">
								<li><a href="index.php?uid=<?php echo $userid; ?>">HOME</a></li>
								<li><a href="login_userdata.php?uid=<?php echo $userid; ?>" style="color:white;"><?php echo $userid; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-booking-info">
				<h1 style="margin-top:100px;">Your Booking Records!</h1>
				<?php
					print("$output");
				?>
				
			</div>
		</div>
		
	</body>
</html>