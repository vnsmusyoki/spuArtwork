<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $amount_paid = $transaction_code = $category_type = ''; ?>
<?php
include '../db-conection.php';
$id = $_GET['payment'];
$bookingplans = "SELECT * FROM `payment` WHERE  payment_id = '$id'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['payment_id'];
        $date = $fetch['payment_date'];
        $buildid = $fetch['payment_building_id'];
        $userid = $fetch['payment_user_id'];
        $amount_paid = $fetch['payment_amount'];
        $transaction_code = $fetch['payment_code'];
        $paymentmethod = $fetch['payment_mode'];
        $usernames = "SELECT * FROM `user` WHERE `user_id` = '$userid'";
        $queryusernames = mysqli_query($conn, $usernames);
        $usernamesrows = mysqli_num_rows($queryusernames);
        if ($usernamesrows >= 1) {
            while ($fetchusernames = mysqli_fetch_assoc($queryusernames)) {
                $username = $fetchusernames['user_full_names'];
                $userphone = $fetchusernames['user_phone_number'];
                $useridnumber = $fetchusernames['user_id_number'];
            }
        }
        $buuildingcheck = "SELECT * FROM `building` WHERE `buidling_id` = '$buildid'";
        $querybuildingscheck = mysqli_query($conn, $buuildingcheck);
        $buildingscheckrows = mysqli_num_rows($querybuildingscheck);
        if ($buildingscheckrows >= 1) {
            while ($fetchbuilding = mysqli_fetch_assoc($querybuildingscheck)) {
                $buildingname = $fetchbuilding['building_name'];
                $location = $fetchbuilding['building_location'];
                $rent = $fetchbuilding['building_rent'];
            }
        }
    }
}
?>
<div class="left-side-bar">

    <div class="menu-block customscroll">
        <?php include 'sidebar-menu.php'; ?>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-12">

                <form style="background-color:white; padding:20px;" method="POST" action=""
                    enctype="multipart/form-data">
                    <?php

                    if (isset($_POST["registerartist"])) {

                        require 'functions/edit-transactions-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Edit Transaction Record </h3>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Payment Amount</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" min="100" placeholder="Amount Paid"
                                name="amount_paid" value="<?php echo $amount_paid; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Payment Code</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="POLKSHDKDKSNKDN"
                                name="transaction_code" value="<?php echo $transaction_code; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Building Selected</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="building_selected" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `building`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['buidling_id'];
                                        $name = $fetch['building_name'];
                                        echo "<option value='$aid'>$name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">User </label>
                        <div class="col-sm-12 col-md-10">
                            <select name="user_name" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `user`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['user_id'];
                                        $name = $fetch['user_full_names'];
                                        echo "<option value='$aid'>$name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Payment Mode</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="payment_mode" id="" class="form-control">
                                <option value="">click to select</option>
                                <option value="M-Pesa">M-Pesa</option>
                            </select>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-danger">Edit To Transactions
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class=" footer-wrap pd-20 mb-20 card-box">
            Designed and Created By <a href="#">
                Moreen</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>

</html>