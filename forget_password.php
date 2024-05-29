<?php
session_start();
include('security.php');

if (isset($_POST['reset_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if passwords match
    if ($password === $cpassword) {
        // Update password in the database
         // Hash the password
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        // SQL query to update password
        $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";

        if ($con->query($sql) === TRUE) {
            echo '<script>alert("Password updated successfully!"); window.location.href = "index.php";</script>';
            
            
        } else {
            echo "Error updating password: " . $con->error;
        }

        $con->close();
    } else {
        echo '<script>alert("Password and Confirm Password do not match!")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        <form method="POST" action="" class="login-form">
            <h1>Forget Password</h1>
            <p>Please New Password for your account</p>
            <div class="input-group">
                <input type="text" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Enter New Password" required>
            </div>
            <div class="input-group">
                <input type="password"  name="cpassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" name="reset_btn" class="btn btn-primary"> Reset </button>
            <!-- <input type="submit" value="Login"> -->
            <div class="bottom-text">
                <p>Don't have an account? <a href="./register.php">Sign Up</a></p>
                <p><a href="index.php">Login</a></p>
            </div>
        </form>
    </div>



</body>

</html>