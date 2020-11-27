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
			<h1><strong>Providing <u>quality</u> care is our <u>main</u> concern.</strong></h1>
			<p>We have only the best doctors and medical professionals at our clinics.</p>
		</div>
	</div>



	<h1>PUT DOCTOR INFO HERE AND BLAH BLAH </h1>


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