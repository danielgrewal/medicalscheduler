<?php 
session_start();

$monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
$friday = date( 'Y-m-d', strtotime( 'friday this week' ) );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>
<body>
<?php 
echo $monday;
echo $friday;

?>
</body>
</html>