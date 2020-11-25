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
<<<<<<< HEAD
    <link rel="stylesheet" href="assets/css/styles.css">
=======
    
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }
        body {
            background-color: lightblue;
        }
</style>
>>>>>>> 2305df395804503b50618fe9dd423a101684f19c
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