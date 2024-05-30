<?php 
ob_start();
session_start();
include('includes/header.php');
include('includes/navbar.php');
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


ob_end_flush();

// if (isset($_POST['delete_btn'])) {
//     // Get the ID of the record to be deleted
//     $id = $_POST['delete_id'];

//     // Delete the record from the database
//     $query = "DELETE FROM hoteldetails WHERE id = $id";
//     mysqli_query($con, $query);

//     // Redirect to the travel details page or show a success message
//     header("Location: hotel_details.php");
//     exit();
// }
// ob_

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Manage Travel Information
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <?php
        $query = "SELECT * FROM travel_information where email = '$email'";
        $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Departure Date</th>
              <th>Origin Location</th>
              <th>Arrival Date</th>
              <th>Destination Location</th>
              <th>Mode of Transportation</th>
              <th>Accommodation Class</th>
              <th>Fare Amount</th>
              <th>Distance (Kilometers)</th>
              <th>Travel Duration</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                <tr>
                  <td><?php echo $row['departure_date']; ?></td>
                  <td><?php echo $row['origin_location']; ?></td>
                  <td><?php echo $row['arrival_date']; ?></td>
                  <td><?php echo $row['destination_location']; ?></td>
                  <td><?php echo $row['mode_of_transportation']; ?></td>
                  <td><?php echo $row['accommodation_class']; ?></td>
                  <td><?php echo $row['fare_amount']; ?></td>
                  <td><?php echo $row['distance_kilometers']; ?></td>
                  <td><?php echo $row['travel_duration']; ?></td>
                  <td>
                    <form action="edit_travel.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                    </form>
                  </td>
                  <td>
                    <form action="#" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<tr><td colspan='13'>No Records Found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- <div class="card-body">
    <div class="table-responsive">
        <?php
        $query = "SELECT * FROM travel_information where email = '$email'" ;
        $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Departure Date</th>
                    <th>Origin Location</th>
                    <th>Arrival Date</th>
                    <th>Destination Location</th>
                    <th>Mode of Transportation</th>
                    <th>Accommodation Class</th>
                    <th>Fare Amount</th>
                    <th>Distance (Kilometers)</th>
                    <th>Travel Duration</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                        <tr>
                            <td><?php echo $row['departure_date']; ?></td>
                            <td><?php echo $row['origin_location']; ?></td>
                            <td><?php echo $row['arrival_date']; ?></td>
                            <td><?php echo $row['destination_location']; ?></td>
                            <td><?php echo $row['mode_of_transportation']; ?></td>
                            <td><?php echo $row['accommodation_class']; ?></td>
                            <td><?php echo $row['fare_amount']; ?></td>
                            <td><?php echo $row['distance_kilometers']; ?></td>
                            <td><?php echo $row['travel_duration']; ?></td>
                            <td>
                                <form action="edit_travel.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                            <form action="#" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='13'>No Records Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div> -->







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>