<?php
session_start();
include('security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email']; 
    $password_login = $_POST['password']; 

    $query = "SELECT * FROM users WHERE email='$email_login' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $user = mysqli_fetch_assoc($query_run);
        if(password_verify($password_login, $user['password']))
        {
            $_SESSION['username'] = $email_login;
            header('Location: admin/index.php');
        }
        else
        {
            $_SESSION['status'] = "Email / Password is Invalid";
            header('Location: index.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: index.php');
    }
}


if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword']; // Corrected the name to match the form input

    $email_query = "SELECT * FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($con, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$hashed_password')";
            $query_run = mysqli_query($con, $query);
            
            if($query_run)
            {
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }
}


?>