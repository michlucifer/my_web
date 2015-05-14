<?php
 include 'config_db.php';	

				$userid= $_GET['uid'];
				$searchq = $_GET['searchq'];
				
				$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

				$query = mysql_query("SELECT * FROM hotel WHERE hotelName LIKE '%$searchq%'") or die("Could not search!");

				$count  = mysql_num_rows($query);
				if($count === 0) {
					echo "There was no search results!";
				}else{
					echo '<table class="table" style="font-size:20px;">';

				echo '<tr>';
				echo '<td style="width:300px; font-size:30px;">Hotel Name</td>';
					echo '<td style="width:300px; font-size:30px;">City</td>';
					echo '<td></td>';
				echo '</tr>';
					while($row = mysql_fetch_array($query)){
						$hname = $row['hotelName'];
						$hid = $row['hotelID'];
						$hcity = $row['city'];

						echo "<tr>";
							echo "<td>"; echo $hname; echo "</td>";
							echo "<td>"; echo $hcity; echo "</td>";
							echo "<td>"; 
								echo '<a href="hotel_index.php?hid=';
								echo $hid;
								echo '&uid=';
								echo $userid;
								echo '" style="font-size:15px; background-color:rgb(165,222,228);">MORE>></a>';
							echo "</td>";
						echo "</tr>";
					}
				echo '</table>';
				}
?>
<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
	
</head>
</html>