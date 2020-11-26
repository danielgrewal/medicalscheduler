<?php 
session_start();
require_once(__DIR__ . '/services/AuthenticationService.php');
require_once(__DIR__ . '/services/AppointmentService.php');

$user = AuthenticationService::authenticate();

$appointmentService = new AppointmentService();
$dates = $appointmentService->getDaysInWeekByDate(date('Y-m-d'));
var_dump($dates);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Schedule</title>
</head>
<body>
<?php ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>