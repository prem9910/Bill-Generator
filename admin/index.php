<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 


$email = $_SESSION['username'];

// Retrieve user details from the database using the username
include('../config.php');

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $emp_id = $row['emp_id']; // Assuming you have an 'id' column in your users table
    $username = $row['username'];
    // Fetch other user details as needed
} else {
    // User not found, handle accordingly
    header("Location: ../index.php");
    exit;
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a target="_blank" href="../print-details.php?email=<?= $row['email'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>






  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>