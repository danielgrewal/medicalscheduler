<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Appointment Scheduler</title>
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
	<header class="jumbotron">
    <div class="container-fluid text-center"> 
       <h1 class="display-3"><strong>Your Health and Well-Being Matters.</strong></h1>
       <p class="lead pb-4"><strong>We are committed to providing the best health care for you and your family.</strong></p>
    </div>
	</header>
<section id="services" class="container">
   <h2 class="display-4 text-center mt-5 mb-3"></h2>
   <div class="row text-center">
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img-top" src="assets/doctor1.png" alt="DOCTOR PHOTO">
            <div class="card-body">
               <h4 class="card-title">Quality Care</h4>
               <p class="card-text">Our doctors and health care professionals pride themselves in providing the best care. All of our staff and medical personnel are highly qualified and experienced.</p>
            </div>
            <div class="card-footer py-4">
               <a href="" class="btn btn-primary btn-block">See Doctors &raquo;</a>
            </div>
         </div>
      </div>
      
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img-top" src="assets/doctor2.png" alt="DOCTOR PHOTO">
            <div class="card-body">
               <h4 class="card-title">New Patients Welcome!</h4>
                  <p class="card-text">We are accepting patients for all of our doctors. If you have not already registered, please follow the link below. If you are an existing patient, click here to login.</p>
            </div>
            <div class="card-footer py-4">
               <a href="register.php" class="btn btn-primary btn-block">Register Now! &raquo;</a>
            </div>
         </div>
      </div>
      
      <div class="col-md-4 mb-4">
         <div class="card h-100">
            <img class="card-img-top" src="assets/doctor3.png" alt="DOCTOR PHOTO">
            <div class="card-body">
               <h4 class="card-title">Self Serve</h4>
               <p class="card-text">Do you need to reschedule or cancel an appointment? Registered patients can easily manage their appointments using our website.</p>
            </div>
            <div class="card-footer py-4">
               <a href="login.php" class="btn btn-primary btn-block">Login Here &raquo;</a>
            </div>
         </div>
      </div>
   </div>
</section>
	

</body>
</html>