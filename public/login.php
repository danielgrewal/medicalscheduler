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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="login-form">
        <form id="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h2 class="text-center">Welcome!</h2>
            <p>Please sign in to continue.</p>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" autocomplete="off" required>
                <?php echo isset($errors['email']) ? $errors['email'] : null ?> 
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
                <?php echo isset($errors['password']) ? $errors['password'] : null ?>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Sign in">
            <?php echo isset($errors['form']) ? $errors['form'] : null ?>
        </form>
    </div>
</body>
</html>