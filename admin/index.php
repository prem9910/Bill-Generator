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
    <!-- <a target="_blank" href="../print-details.php?email=<?= $row['email'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
  <div class="col-md-12 mb-4" style="width:100%">
    <div class="card" style="width:100%">
      <div class="card-body">
        <h5 class="card-title mb-3">Select Date Range:</h5>
        <form class="form-inline">
          <div class="form-group mb-2 me-3" style="margin-right: 1rem;">
            <label for="from-date" class="mr-2">From</label>
            <input type="date" class="form-control" id="from-date" placeholder="From" required>
          </div>
          <div class="form-group mb-2 me-3" style="margin-right: 1rem;">
            <label for="to-date" class="mr-2">To</label>
            <input type="date" class="form-control" id="to-date" placeholder="To" required>
          </div>
          <div class="form-group mb-2 me-3" style="margin-right: 1rem;">
            <label for="purpose" class="mr-2">Purpose</label>
            <input type="text" class="form-control" id="purpose" placeholder="Purpose" required>
          </div>
          <div class="form-group mb-2 ms-3" style="margin-left: 1rem;">
            <button type="button" class="btn btn-primary" onclick="downloadPDF()">Download</button>
          </div>
        </form>
      </div>
    </div>
    <div class="mb-4"></div>
  </div>
  
    <script>
      function downloadPDF() {
        const fromDate = document.getElementById('from-date').value;
        const toDate = document.getElementById('to-date').value;
        const purpose = document.getElementById('purpose').value;
        const url = `../print-details.php?from=${fromDate}&to=${toDate}&email=<?= $row['email'] ?>&purpose=${purpose}`;
        console.log(url);
        window.open(url, '_blank');
      }
    </script>

    <!-- Flatpicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        config = {
            enableTime:false,
            dateformat: "d-m-Y",
            altInput:true,
            altFormat:"F j, Y"
        }
        // Otherwise, selectors are also supported
        flatpickr("input[type=date]", config);
    </script>






  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>