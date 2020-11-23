<?php
session_start();

require_once(__DIR__ . '/services/AuthenticationService.php');

if ($_POST)
{
    $authService = new AuthenticationService();
    $user = $authService->getUser($_POST['email'], $_POST['password']);
    if ($user)
    {
        $authService->populateSession($user);
        header( "Location: index.php", false, 303);
        exit();
    }
    else
    {
        $errors = $authService->getErrors();
    }

    # Post->Redirect->Get pattern to avoid form re-submission
    // header( "Location: { $_SERVER['REQUEST_URI'] }", true, 303 );
    // exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <form id="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div>
            <label for="email">Email Address:</label>
            <input id="email" type="text" name="email" autocomplete="off">
            <?php echo isset($errors['email']) ? $errors['email'] : null ?>
            
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
            <?php echo isset($errors['password']) ? $errors['password'] : null ?>
        </div>
        <input type="submit" value="Sign in">
        <?php echo isset($errors['form']) ? $errors['form'] : null ?>
    </form>
</body>
</html>

<style type="text/css">
    label {
        display: block;
    }
</style>