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
			<h4 class="card-title">Doctor NAME</h4>
			<p class="card-text">Doctor INFORMATION</p>
		</div>
		<div class="card-footer py-4">
			<a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
		</div>
		</div>
		</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile2.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Doctor NAME</h4>
            <p class="card-text">Doctor INFORMATION</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
        </div>
       	</div>
      	</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile3.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Doctor NAME</h4>
            <p class="card-text">Doctor INFORMATION</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
        </div>
        </div>
      	</div>
   		</div>
	</section>

	<section id="services" class="container">
		<div class="row text-center">
		<div class="col-md-4 mb-4">
		<div class="card h-100">
			<img class="card-img-top" src="assets/profile1.jpg" alt="DOCTOR PHOTO">
		<div class="card-body">
			<h4 class="card-title">Doctor NAME</h4>
			<p class="card-text">Doctor INFORMATION</p>
		</div>
		<div class="card-footer py-4">
			<a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
		</div>
		</div>
		</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile2.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Doctor NAME</h4>
            <p class="card-text">Doctor INFORMATION</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
        </div>
       	</div>
      	</div>
      	<div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="assets/profile3.jpg" alt="DOCTOR PHOTO">
        <div class="card-body">
            <h4 class="card-title">Doctor NAME</h4>
            <p class="card-text">Doctor INFORMATION</p>
        </div>
        <div class="card-footer py-4">
            <a href="schedule.php" class="btn btn-primary btn-block">Book now &raquo;</a>
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