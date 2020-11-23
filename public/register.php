<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<h1>Registration Form</h1>
	<!-- add a link to the log in page to the <p> below -->
	<p>You must register before booking your appointment. If you have already registered, please click here to login.</p>
	<!-- this is the box where the input form goes...-->
	<div class="formbox">
		<form action="validate.php" method="POST">
			<fieldset>
				<!-- we can add radio buttons for if patient is male/female, or if a senior or a child etc.-->
				First Name: <input type="text" name="firstname" autocomplete="off"><br>
				Last Name: <input type="text" name="lastname" autocomplete="off"><br>
				<!-- use input type="email" once HTML5 check is done, ask Usman-->
			    Email: <input type="text" name="email" autocomplete="off"><br>
			    Password: <input type="password" name="password"><br>
			    Confirm Password: <input type="password" name="passwordconfirm"><br><br>
			    <input type="submit" value="Register">
			</fieldset>
	    </form>
	</div>
	

</body>
</html>