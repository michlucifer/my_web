<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
</head>
	<body>
		<form action="login_process.php" method="POST" class="navbar-form navbar-left">
			<div class="form-group">
				<table class="table">
					<tr>
						<td>
							<label>
								UserID:
							</label>
						</td>
						<td>
							<input type="text" class="form-control" name="userid" placeholder="Type in your userid" style="width:300px;height:50px;border-radius:0;"/>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Password:
							</label>
						</td>
						<td>
							<input type="password" class="form-control" name="pass" placeholder="Type in your password" style="width:300px;height:50px;border-radius:0;"/>
						</td>
					</tr>
				</table>
			</div>
					<input type="submit" value="LOGIN" style="background-color:rgba(255,255,255,0.7); border:0px; height:50px;"/>
				</form>
		<a href="new_user.php">Signup Here!</a>
	</body>
</html>