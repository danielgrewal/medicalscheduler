<?php
session_start();
date_default_timezone_set('America/Toronto');

require_once(__DIR__ . '/services/AuthenticationService.php');
require_once(__DIR__ . '/services/AppointmentService.php');

$user = AuthenticationService::authenticate();
$appointmentService = new AppointmentService();

if (!isset($_GET['date']) || !isset($_GET['timeslot'])) {
    header("Location: index.php", false, 303);
    exit();
}

// prevent XSS attack
$date = htmlspecialchars($_GET['date'], ENT_QUOTES, 'UTF-8');
$timeslotId = htmlspecialchars($_GET['timeslot'], ENT_QUOTES, 'UTF-8');
if (isset($_GET['doctor']))
    $doctorId = htmlspecialchars($_GET['doctor'], ENT_QUOTES, 'UTF-8');
else
    $doctorId = '';

$availableDoctors = $appointmentService->getAvailableDoctors($timeslotId, date('Y-m-d'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
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

    <div class="container mt-5">
        <div class="form-wrapper">

            <!-- Form -->
            <div class="card">
                <div class="card-body">
                    <h3 class="mt-1 mb-5">Confirmation of Booking</h3>
                    <form action="schedule.php" method="POST">
                        <div class="form-group row">
                            <label for="user" class="col-sm-2 col-form-label">Patient</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="<?php echo $user->FirstName . ' ' . $user->LastName; ?>" disabled>
                                <input type="hidden" name="date" value="<?php echo $date; ?>" />
                                <input type="hidden" name="timeslot" value="<?php echo $timeslotId; ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="doctor-select" class="col-sm-2 col-form-label">Physician</label>
                            <div class="col-sm-10">
                                <select name="doctor" class="custom-select" id="doctor-select" required>
                                    <option  value="" selected disabled>-- Choose Physician --</option>
                                    <?php
                                        foreach ($availableDoctors as $doctor)
                                        {
                                            echo '<option value="'.$doctor->DoctorId.'">'.$doctor->Name.'</option>';
                                        }  
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Book Visit</button>
                                <a href="schedule.php" class="btn btn-info">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="footer_text">Copyright © SOFE2800 Final Project Group 3 - Fall 2020 @ Ontario Tech University</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>