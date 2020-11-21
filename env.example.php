<?php 

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