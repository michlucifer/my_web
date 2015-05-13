<?php
$hid = $_POST['hotelid'];	
$userid = $_POST['userid'];	
	echo $hid;
	echo $userid;
?>
<html>
<body>
	<div class="container-fluid">
		<form action="hotel_search.php" method="POST">
			<input type="hidden" name="hid" value="<?php echo $hid?>"/>
			<input type="hidden" name="userid" value="<?php echo $userid?>"/>
			<div class="check-room-type">
				<div class="check-single">
					<div class="checkbox">
						<label>
							<input type="hidden" name="checkboxSingle" value="0" />
							<input type="checkbox" name="checkboxSingle" value="1">
							Single
						</label>
					</div>
				</div>
				<div class="check-double">
					<div class="checkbox">
						<label>
							<input type="hidden" name="checkboxDouble" value="0" />
							<input type="checkbox" name="checkboxDouble" value="1">
							Double
						</label>
					</div>
				</div>
				<div class="check-queen">
					<div class="checkbox">
						<label>
							<input type="hidden" name="checkboxQueen" value="0" />
							<input type="checkbox" name="checkboxQueen" value="1">
							Queen
						</label>
					</div>
				</div>
				<div class="check-king">
					<div class="checkbox">
						<label>
							<input type="hidden" name="checkboxKing" value="0" />
							<input type="checkbox" name="checkboxKing" value="1">
							King
						</label>
					</div>
				</div>
			</div>
			<table class="table">
				<tr>
					<td>#</td>
					<td>Year</td>
					<td>Month</td>
					<td>Day</td>
				</tr>
				<tr>
					<td>StartDate</td>
					<td><input type="text" name="stYear"/></td>
					<td><input type="text" name="stMonth"/></td>
					<td><input type="text" name="stDay"/></td>
				</tr>
				<tr>
					<td>EndDate</td>
					<td><input type="text" name="enYear"/></td>
					<td><input type="text" name="enMonth"/></td>
					<td><input type="text" name="enDay"/></td>
				</tr>
			</table>
			<input type="submit" name="SEARCH!"/>
		</form>
	</div>
	
</body>
</html>