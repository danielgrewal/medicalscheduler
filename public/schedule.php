<?php 
session_start();
require_once(__DIR__ . '/services/AuthenticationService.php');
require_once(__DIR__ . '/services/AppointmentService.php');

$user = AuthenticationService::authenticate();

$appointmentService = new AppointmentService();
$dates = $appointmentService->getDaysInWeekByDate('2020-11-28');


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
    <!-- Top Nav -->
    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a href="login.php">Sign in</a>
        <a href="register.php">Register</a>
        <a href="profiles.php">Our Doctors</a>
        <a href="schedule.php" class="active">View Appointments</a>
        <a href="logout.php" class="float-right">Sign Out</a>
        <a href="#" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Main Container -->
    <div class="container">
        <h1 class="display-4">Appointment Booking</h1>
        
        <!-- Appointments Card -->
        <div class="card text-center mt-5">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
	

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
</body>
</html>