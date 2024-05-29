<?php
// session_start();
include('config.php');

if($con)
{
    // echo "Database Connected";
}
else
{
    header("Location: ./config.php");
}
?>