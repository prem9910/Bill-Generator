<?php
// include('./security.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="login-container">
        <form method="POST" action="code.php" class="login-form">
            <h1>Create an Account</h1>
            <p>Please fill in the following details to register</p>
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Full Name" required>
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <!-- <input type="submit" class="btn btn-primary" value="Register"> -->
            <button type="submit" name="registerbtn" class="btn btn-primary">Register</button>

            <div class="bottom-text">
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </form>
    </div>




</body>

</html>