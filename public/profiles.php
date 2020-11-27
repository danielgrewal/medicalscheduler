<?php
session_start();

require_once(__DIR__ . '/services/AuthenticationService.php');

if ($_POST)
{
    $authService = new AuthenticationService();
    $user = $authService->getUser($_POST['email'], $_POST['password']);
    if ($user)
    {
      echo '<script type="text/javascript">';
      echo 'alert("")';
      echo '</script>';
    }
    else
    {
        $errors = $authService->getErrors();
    }

    # Post->Redirect->Get pattern to avoid form re-submission
    // header( "Location: { $_SERVER['REQUEST_URI'] }", true, 303 );
    // exit();
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<div class="topnav" id="myTopnav">
  		<a href="index.php">Home</a>
  		<a href="login.php">Sign in</a>
  		<a href="register.php">Register</a>
  		<a href="profiles.php" class="active">Our Doctors</a>
  		<a href="schedule.php">View Appointments</a>
  		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
    	<i class="fa fa-bars"></i></a>
	</div>

  	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1><strong>Providing quality <u>care</u> is our main <u>concern</u>.</strong></h1>
			<p>We have only the best doctors and medical professionals at our clinics.</p>
		</div>
	</div>

	<section id="services" class="container">
		<div class="row text-center">
		<div class="col-md-4 mb-4">
		<div class="card h-100">
			<img class="card-img-top" src="assets/profile1.jpg" alt="DOCTOR PHOTO">
		<div class="card-body">
			<h4 class="card-title">Dr. Sarah Johnson</h4>
			<p class="card-text">5+ years specializing in Diagnostic Medicine. Dr. Johnson has an outstanding record for accurately diagnosing patients with any disease or illness.</p>
		</div>
		<div class="card-footer py-4">
			<a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
		</div>
		</div>
		</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile2.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Dr. Maria Lopez</h4>
            <p class="card-text">15+ years specializing in Family Medicine. Dr. Lopez is one of our most experienced and trusted Doctors. Dr. Lopez provides care for patients of all ages.</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
        </div>
       	</div>
      	</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile3.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Dr. John Dorian</h4>
            <p class="card-text">5+ years specializing in Family Medicine. Dr. Dorian is one of our latest additions to the team. Dr. Dorian provides care for patients of all ages.</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
        </div>
        </div>
      	</div>
   		</div>
	</section>
	<section id="services" class="container">
		<div class="row text-center">
		<div class="col-md-4 mb-4">
		<div class="card h-100">
			<img class="card-img-top" src="assets/profile4.jpg" alt="DOCTOR PHOTO">
		<div class="card-body">
			<h4 class="card-title">Dr. Vanessa Hamilton</h4>
			<p class="card-text">10+ years specializing in Psychiatric Medicine. Dr. Hamilton is our Director of Mental Health services, and provides care for patients of all ages.</p>
		</div>
		<div class="card-footer py-4">
			<a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
		</div>
		</div>
		</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile5.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Dr. Niles Crane</h4>
            <p class="card-text">15+ years specializing in Diagnostic Medicine. Dr. Crane is our Director of Diagnostic Medicine services, and provides care primarily for adults.</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
        </div>
       	</div>
      	</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile6.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Dr. Frasier Smith</h4>
            <p class="card-text">5+ years specializing in Psychiatric Medicine. Dr. Smith is our newest team member. Dr. Smith provides care primarily for children and young adults.</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book Appointment &raquo;</a>
        </div>
        </div>
      	</div>
   		</div>
	</section>

	<div class="footer">
    	<p class="footer_text">Copyright © SOFE2800 Final Project Group 3 - Fall 2020 @ Ontario Tech University</p>
    </div>
</body>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</html>