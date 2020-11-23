<?php 
session_start();
require_once(__DIR__ . '/services/AuthenticationService.php');
?>

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
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConfirm = $_POST['passwordconfirm'];
		$data = $_POST;
		// Check if the user left any input fields blank, all fields must have a value to proceed...
		// die() will stop script from continuing if error detected, will output message
		if(empty($data['firstname'])||empty($data['firstname'])||empty($data['password'])||empty($data['email'])||empty($data['passwordconfirm'])) {	
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

		$authService = new AuthenticationService();
		$user = $authService->registerUser($firstname, $lastname, $email, $password, $passwordConfirm);
		
		if ($user)
    	{
			$authService->populateSession($user);
        	header( "Location: index.php", false, 303);
        	exit();
		}
		else
    	{
			$errors = $authService->getErrors();
			var_dump($errors); // Replace with actual error
    	}
	?>

</body>
</html>