<?php
ob_start();
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');



if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fare_amount = $_POST['fare_amount'];
    $distance_kilometers = $_POST['distance_kilometers'];
    $travel_duration = $_POST['travel_duration'];
    $departure_date = $_POST['departure_date'];
    $origin_location = $_POST['origin_location'];
    $arrival_date = $_POST['arrival_date'];
    $destination_location = $_POST['destination_location'];
    $mode_of_transportation = $_POST['mode_of_transportation'];
    $accommodation_class = $_POST['accommodation_class'];

    $sql = "UPDATE travel_information SET fare_amount='$fare_amount', distance_kilometers='$distance_kilometers', travel_duration='$travel_duration', departure_date='$departure_date', origin_location='$origin_location', arrival_date='$arrival_date', destination_location='$destination_location', mode_of_transportation='$mode_of_transportation', accommodation_class='$accommodation_class' WHERE id='$id'";
    $con->query($sql);
    echo "<script>alert('Data updated successfully');</script>";
    echo "<script>window.location.href='travel_details.php';</script>";
}


// Check if the ID is set in the query parameters

if (isset($_POST['edit_btn'])) {
    // Get the ID of the record to be editd
    $id = $_POST['edit_id'];
    // Fetch the data from the database based on the ID
   
    $sql = "SELECT * FROM travel_information WHERE id = '$id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();


    ob_end_flush();
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="col-md-12 mt-2">
                <h4 class="text-blue h5 mb-20">Update Travel Details</h4>
            </div>
        </div>


    </div>

    <div class="modal-body col-md center-block">
        <form action="#" method="post">
            <div class="main-form mt-3 border-bottom">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="col-md-5">
                        <div class="form-group mb-2">
                            <label for="departure_date">Departure Date</label>
                            <input type="date" id="departure_date" name="departure_date" class="form-control" value="<?php echo $row['departure_date']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group mb-2">
                            <label for="origin_location">Origin Location</label>
                            <input type="text" id="origin_location" name="origin_location" class="form-control" value="<?php echo $row['origin_location']; ?>" required placeholder="Enter Origin Location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group mb-2">
                            <label for="arrival_date">Arrival Date</label>
                            <input type="date" id="arrival_date" name="arrival_date" class="form-control" value="<?php echo $row['arrival_date']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group mb-2">
                            <label for="destination_location">Destination Location</label>
                            <input type="text" id="destination_location" name="destination_location" class="form-control" value="<?php echo $row['destination_location']; ?>" required placeholder="Enter Destination Location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="fare_amount">Fare Amount</label>
                            <input type="text" id="fare_amount" name="fare_amount" class="form-control" value="<?php echo $row['fare_amount']; ?>" required placeholder="Enter Fare Amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="distance_kilometers">Distance in Kilometers</label>
                            <input type="text" id="distance_kilometers" name="distance_kilometers" class="form-control" value="<?php echo $row['distance_kilometers']; ?>" required placeholder="Enter Distance in Kilometers">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="travel_duration">Travel Duration</label>
                            <input type="text" id="travel_duration" name="travel_duration" class="form-control" value="<?php echo $row['travel_duration']; ?>" required placeholder="Enter Travel Duration">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="mode_of_transportation">Mode of Transportation</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_air" value="Air" <?php if ($row['mode_of_transportation'] == 'Air') echo 'checked'; ?> required>
                                <label class="form-check-label" for="by_air">
                                    Air
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_rail" value="Rail" <?php if ($row['mode_of_transportation'] == 'Rail') echo 'checked'; ?> required>
                                <label class="form-check-label" for="by_rail">
                                    Rail
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mode_of_transportation" id="by_road" value="Road" <?php if ($row['mode_of_transportation'] == 'Road') echo 'checked'; ?> required>
                                <label class="form-check-label" for="by_road">
                                    Road
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" id="accommodation_class_options" style="display: none;">
                        <div class="form-group mb-2">
                            <label for="accommodation_class">Accommodation Class</label>
                            <select class="form-select" id="accommodation_class" name="accommodation_class" required>
                                <!-- Options will be dynamically added based on the selected mode of transportation -->
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </div>
        </form>
    </div>

</div>


<?php
}
?>


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
            enableTime:true,
            dateformat: "d-m-Y H:i",
            altInput:true,
            altFormat:"F j, Y (h:S K)"
        }
        // Otherwise, selectors are also supported
        flatpickr("input[type=date]", config);
    </script>

