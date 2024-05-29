<?php
include('../security.php');

if (isset($_POST['delete_btn'])) {
    // Get the ID of the record to be deleted
    $id = $_POST['delete_id'];

    // Delete the record from the database
    $query = "DELETE FROM travel_information WHERE id = $id";
    mysqli_query($con, $query);

    // Redirect to the travel details page or show a success message
    header("Location: travel_details.php");
    exit();
}





?>