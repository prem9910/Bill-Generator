<?php
ob_start();
// Start the session
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');

$email = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $restaurant = mysqli_real_escape_string($con, $_POST['restaurant']);
    $period_from = mysqli_real_escape_string($con, $_POST['period_from']);
    $period_to = mysqli_real_escape_string($con, $_POST['period_to']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    // $email = $_SESSION['username'];

    // Attempt to insert data into the database
    $sql = "INSERT INTO Food (restaurant, period_from, period_to, amount, email) 
            VALUES ('$restaurant', '$period_from', '$period_to', '$amount', '$email')";

    if (mysqli_query($con, $sql)) {
        // Redirect to the user dashboard or show a success message
        header("Location: food_details.php");
        // echo "<script type='text/javascript'>alert('Added Successfully');</script>";
        exit();
    } else {
        // Display an error message if the insertion fails
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}
ob_end_flush();
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="col-md-12 mt-2">
                <h4 class="text-blue h5 mb-20">Add Food Details</h4>
            </div>
        </div>


    </div>

    <div class="modal-body col-md center-block">

        <div class="modal-body">
            <form action="#" method="post">
                <div class="main-form mt-2 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="restaurant">Restaurant Name</label>
                                <input type="text" id="restaurant" name="restaurant" class="form-control" placeholder="Enter Restaurant Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="period_from">Period From</label>
                                <input type="date" id="period_from" name="period_from" class="form-control" placeholder="Select Period From" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="period_to">Period To</label>
                                <input type="date" id="period_to" name="period_to" class="form-control" placeholder="Select Period To" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="amount">Amount Spent</label>
                                <input type="text" id="amount" name="amount" class="form-control" placeholder="Enter Amount Spent" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-3">Save changes</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    const modeOfTransportationRadios = document.querySelectorAll('input[name="mode_of_transportation"]');
    const accommodationClassOptions = document.getElementById('accommodation_class_options');
    const accommodationClassSelect = document.getElementById('accommodation_class');

    modeOfTransportationRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                accommodationClassOptions.style.display = 'block';
                if (this.value === 'Air') {
                    populateAccommodationClassOptions(['Economy Class', 'Business Class', 'First Class']);
                } else if (this.value === 'Rail') {
                    populateAccommodationClassOptions(['Sleeper Class', 'AC 3 Tier', 'AC 2 Tier']);
                } else if (this.value === 'Road') {
                    populateAccommodationClassOptions(['Standard', 'Deluxe', 'Luxury']);
                }
            }
        });
    });

    function populateAccommodationClassOptions(options) {
        accommodationClassSelect.innerHTML = ''; // Clear previous options
        options.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.textContent = option;
            optionElement.value = option;
            accommodationClassSelect.appendChild(optionElement);
        });
    }
</script>
<!-- Flatpicker -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        enableTime: true,
        dateformat: "d-m-Y H:i",
        altInput: true,
        altFormat: "F j, Y (h:S K)"
    }
    // Otherwise, selectors are also supported
    flatpickr("input[type=date]", config);
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>