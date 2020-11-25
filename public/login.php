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
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-info">
        <a href="#" class="navbar-brand">Medical Appointment Scheduler</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse5">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse5">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">Login</a>
                <a href="#" class="nav-item nav-link">Register</a>
                <a href="#" class="nav-item nav-link">About</a>
            </div>
            <form class="form-inline ml-auto">
                <input type="text" class="form-control mr-sm-2" placeholder="Search">
                <button type="submit" class="btn btn-outline-light">Search</button>
            </form>
        </div>
    </nav>
    <div class="login-form">
        <form id="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <h2 class="text-center">Welcome!</h2>
            <p>Please sign in to continue. If you have not already registered, <a href="register.php">click here</a>.</p>
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