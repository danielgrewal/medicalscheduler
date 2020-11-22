<?php 
# Rename file to env.php and replace the settings array values with the relevant environment info
$settings = [
    'DB_HOST'     => 'localhostorserver',
    'DB_USERNAME' => 'mysupersecretusername',
    'DB_PASSWORD' => 'mysupersecretpassword',
    'DB_NAME'     => 'mydatabasename'

];

foreach ($settings as $key => $value) {
    $setting = $key . '=' . $value;
    putenv($setting);
    $_ENV[$key] = $value;
}

?>