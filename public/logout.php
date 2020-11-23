<?php
session_start();
session_destroy();
header( "Location: login.php", false, 303 );
exit();
?>