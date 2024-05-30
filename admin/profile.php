<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('../security.php');


$email = $_SESSION['username'];


if (isset($_POST['new_update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $desig = $_POST['desig'];
    $pay = $_POST['pay'];
    $hq = $_POST['hq'];
    $emp_id = $_POST['emp_id'];
    

    $update_query = "UPDATE `users` SET 
                    `username`='$username', 
                    `email`='$email', 
                    `mobile`='$mobile', 
                    `address`='$address', 
                    `desig`='$desig', 
                    `pay`='$pay', 
                    `hq`='$hq' 
                    WHERE `emp_id`='$emp_id'";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Update successful
        echo '<script>alert("User details updated successfully!")</script>';
        echo '<script>window.location.href = "profile.php";</script>';
    } else {
        // Update failed
        echo '<script>alert("Failed to update user details. Please try again!")</script>';
        echo '<script>window.location.href = "profile.php";</script>';
    }
}


?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="col-md-12 mt-2">
                <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
            </div>
        </div>

        <div class="card-body">

            <div class="profile-setting">
                <form method="POST" enctype="multipart/form-data">
                    <div class="profile-edit-list row">
                        <?php
                        $query = mysqli_query($con, "SELECT `emp_id`, `username`, `email`, `mobile`, `address`, `desig`, `pay`, `hq`, `purpose`, `password` FROM `users` WHERE `email` = '$email'") or die(mysqli_error());
                        $row = mysqli_fetch_array($query);
                        ?>

                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" class="form-control form-control-lg" type="text" required="true" autocomplete="off" value="<?php echo $row['username']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input name="email" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input name="mobile" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['mobile']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Designation</label>
                                <input name="desig" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['desig']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Pay</label>
                                <input name="pay" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['pay']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Head Quarter</label>
                                <input name="hq" class="form-control form-control-lg" type="text" placeholder="" required="true" autocomplete="off" value="<?php echo $row['hq']; ?>">
                            </div>
                        </div>

                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control form-control-lg" disabled type="password" placeholder="" required="true" autocomplete="off" value="<?php echo $row['password']; ?>">
                            </div>
                        </div>
                        <div class="weight-500 col-md-6">
                            <div class="form-group">
                                <label></label>
                                <div class="modal-footer justify-content-center">
                                    <input type="text" hidden name="emp_id" value="<?php echo $row['emp_id']; ?>">
                                    <button type="submit" class="btn btn-primary" name="new_update" id="new_update" data-toggle="modal">Save & Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>