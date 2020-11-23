<?php 
session_start();
require_once(__DIR__ . '/services/AuthenticationService.php');

AuthenticationService::authenticate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Appointments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Landing/Home Page</h1>
    <button id="sign-out" type="button" class="btn btn-primary">Signout</button>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $('#sign-out').click(function(e) {
            e.preventDefault();
            window.location.href = 'logout.php';
        });
    </script>
</body>
</html>