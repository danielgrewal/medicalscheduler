<?php 
session_start();
date_default_timezone_set('America/Toronto');

require_once(__DIR__ . '/services/AuthenticationService.php');
require_once(__DIR__ . '/services/AppointmentService.php');
require_once(__DIR__ . '/entities/Appointment.php');

$user = AuthenticationService::authenticate();
$appointmentService = new AppointmentService();

if ($_POST)
{
    $doctorId = $_POST['doctor'];
    $timeslotId = $_POST['timeslot'];
    $date = $_POST['date'];
    $appointmentService->createAppoinment($user->UserId, $doctorId, $date, $timeslotId);
    
    # Post->Redirect->Get pattern to avoid form re-submission
    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
    exit();
}

$userAppointments = $appointmentService->getAppointmentsByUser($user->UserId);
$doctor = new Doctor();

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
    <div class="container pb-5">
        <h1 class="mt-2 mb-4">Physician Schedules</h1>
        
        <!-- Appointments Card -->
        <div class="card">
            <h5 class="card-header">Book Your Appointment</h5>
            <div class="card-body">
                <div class="row">
                    <?php 

                    
                    $dates = $appointmentService->getDaysInWeekByDate(date('Y-m-d'));
                    foreach ($dates as $date)
                    {
                        $timeslots = $appointmentService->getAllTimeslots();
                        $day = new DateTime($date);
                        echo '<div class="col mb-2">';
                            echo '<span class="d-flex justify-content-center">' . $day->format('l') . '</span>';
                            echo '<div>';
                            foreach ($timeslots as $timeslot)
                            {
                                if ($appointmentService->isTimeslotAvailable($date, $timeslot))
                                {
                                    //echo '<a href="booking.php?date='.$date.'&timeslot='.$timeslot->TimeslotId.'&doctor='.$doctor->DoctorId.'" class="btn btn-outline-dark btn-block">'. $timeslot->Display .'</a>';
                                    echo '<a href="booking.php?date='.$date.'&timeslot='.$timeslot->TimeslotId.'&doctor='.$doctor->DoctorId.'" class="btn btn-outline-dark btn-block">'. $timeslot->Display .'</a>';
                                    
                                }
                                else if ($appointmentService->isUserAppointment($userAppointments, $date, $timeslot->TimeslotId))
                                {
                                    //echo '<a href="booking.php?date='.$date.'&timeslot='.$timeslot->TimeslotId.'&doctor='.$doctor->DoctorId.'" class="btn btn-secondary btn-block">Booked</a>';
                                    echo '<a href="booking.php?date='.$date.'&timeslot='.$timeslot->TimeslotId.'" class="btn btn-secondary btn-block">Booked</a>';
                                }
                                else
                                {
                                    echo '<button type="button" class="btn btn-outline-dark btn-block disabled" disabled>Unavailable</button>';
                                }
                            }
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="w-100 d-md-none"></div>';
                    } 
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="footer_text">Copyright © SOFE2800 Final Project Group 3 - Fall 2020 @ Ontario Tech University</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }

        // function loadSchedule(data)
        // {
        //     $('.result').html(data);
        // }
        
        // function getScheduleByDoctor($doctor)
        // {
        //     $.ajax({
        //         type: "GET",
        //         url: 'test.php',
        //         success: function (data) {
        //             loadSchedule(data);
        //         }
        //     });
        // }

        // $(function () {
        //     getScheduleByDoctor();
        // });
        
    </script>
</body>
</html>