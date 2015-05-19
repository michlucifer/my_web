<html>
<head>
	<script src="javascripts/jquery-2.1.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" media="screen" type="text/css" />
<style type="text/css">
table, td, tr {
 border:1px solid #ffffff;
 border-collapse:collapse;
}
</style>
</head>
	<body>
		<div class="container-fluid" style="background:#ffffff;">
			<div class="login-page">
			<form action="login_process.php" method="POST" class="navbar-form">
				<div class="form-group">
					<table class="login-input  table">
						<tr>
							<td>
								<label>
									UserName:
								</label>
							</td>
							<td>
								<input type="text" class="form-control" name="userName" placeholder="Type in your userName" style="width:300px;height:50px;border-radius:0;"/>
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
						<tr>
							<td><button type="submit" class="btn btn-default">LOGIN</button></td>
						</tr>
					</table>
				</div>
			</div>
			</form>
			<div class="register-notice">
				<span>Not Registerd Yet? &nbsp;&nbsp;</span><a href="new_user.php">Signup Here!</a>
			</div>
			
		</div>
	</body>
</html>