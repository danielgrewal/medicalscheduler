<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div id="navigation">
		<script>
		$(function() {
			$("#navigation").load("assets/navbar.html");
		});
		</script>
	</div>
    </nav>
	<div class="login-form">
		<form id="login-form" action="validate.php" method="POST">
			<h2 class="text-center">Registration Form</h2>
			<p>You must register before booking an appointment. If you have already registered, <a href="login.php">click here</a> to login.</p>
			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" name="firstname" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" name="lastname" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
			    <input type="password" class="form-control" name="password" required>
			</div>
			<div class="form-group">
				<label for="passwordconfirm">Confirm Password</label>
			    <input type="password" class="form-control" name="passwordconfirm" required>
			</div>    	
			<input type="submit" class="btn btn-primary btn-block" value="Register">
	    </form>
	</div>
</body>
</html>