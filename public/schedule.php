<?php 
session_start();
require_once(__DIR__ . '/services/AuthenticationService.php');
require_once(__DIR__ . '/services/AppointmentService.php');

$user = AuthenticationService::authenticate();

$appointmentService = new AppointmentService();
$dates = $appointmentService->getDaysInWeekByDate(date('Y-m-d'));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<<<<<<< HEAD
	<div class="topnav" id="myTopnav">
		<a href="index.php">Home</a>
		<a href="login.php">Sign in</a>
		<a href="register.php">Register</a>
		<a href="profiles.php">Our Doctors</a>
		<a href="schedule.php" class="active">View Appointments</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i></a>
	</div>
	
	<h1>HERE IS WHERE THE SCHEDULE WILL BE ETC ETC</h1>

	<div class="footer">
        <p class="footer_text">Copyright © SOFE2800 Final Project Group 3 - Fall 2020 @ Ontario Tech University</p>
    </div>

=======
    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a href="login.php">Sign in</a>
        <a href="register.php">Register</a>
        <a href="profiles.php">Our Doctors</a>
        <a href="schedule.php" class="active">View Appointments</a>
        <a href="#" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
	<h1>HERE IS WHERE THE SCHEDULE WILL BE ETC ETC</h1>

    <div class="footer">
        <p class="footer_text">Copyright © SOFE2800 Final Project Group 3 - Fall 2020 @ Ontario Tech University</p>
    </div>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
    </script>
>>>>>>> 96053af5b6e81cf71345b5412211d6f3ab193cde
</body>
</html>