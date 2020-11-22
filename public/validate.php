<!DOCTYPE html>
<html>
<head>
	<title>Validate Registration</title>
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<h1>Validation</h1>
	<!-- get registration info from register.php and validate -->
	<?php
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['username'];
		$data = $_POST;
		// Check if the user left any input fields blank, all fields must have a value to proceed...
		// die() will stop script from continuing if error detected, will output message
		if(empty($data['username'])||empty($data['password'])||empty($data['email'])||empty($data['passwordconfirm'])) {	
			die('Please fill in ALL fields, no empty fields allowed!');
		}
		// Check if password matches user confirmation for password...
		else if($data['password']!==$data['passwordconfirm']) {
   			die('Password and Confirmed Password do not match!');   
		}
		// Check if email address has proper format...
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die('Invalid Email address!');
		}
		else echo "User Input OK! - Proceed with SQL...";
		// Now, we can proceed with writing the registration info into the database...
		// PUT SQL DATABASE SCRIPT HERE...
	?>

</body>
</html>