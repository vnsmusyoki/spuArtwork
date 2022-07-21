<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $building_charges = $building_name = $location = $transaction_code=''; ?>
<?php
include '../db-conection.php';
$id = $_GET['building'];
$bookingplans = "SELECT * FROM `building` WHERE `buidling_id` = '$id'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['buidling_id'];
        $building_name = $fetch['building_name'];
        $description = $fetch['buidling_description'];
        $building_charges = $fetch['building_rent'];
        $images = $fetch['building_images'];
        $location = $fetch['building_location'];
        $agentid = $fetch['building_agent_id'];
        $usernames = "SELECT * FROM `agent` WHERE `agent_id` = '$agentid'";
        $queryusernames = mysqli_query($conn, $usernames);
        $usernamesrows = mysqli_num_rows($queryusernames);
        if ($usernamesrows >= 1) {
            while ($fetchusernames = mysqli_fetch_assoc($queryusernames)) {
                $agentname = $fetchusernames['agent_full_names'];
                $agentphone = $fetchusernames['agent_phone_number'];
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

                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Book Building rentals</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Building Registration</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Building Name" name="building_name"
                                value="<?php echo $building_name; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Rent Charges</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" min="100" placeholder="8000"
                                name="building_charges" value="<?php echo $building_charges; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Building Location</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="location" id="" cols="3" rows="3" class="form-control"
                                readonly><?php echo $location; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Building Decription</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="description" id="" cols="1" rows="1" class="form-control"
                                readonly><?php echo $description; ?></textarea>
                        </div>
                    </div>
                    <hr>

                    <?php

                    if (isset($_POST["registerartist"])) {

                        require 'functions/add-transactions-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>SUbmit Payment Details</h3>
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
                    <input type="hidden" name="building" value="<?php echo $_GET['building'];?>">
                    <div class=" form-group row">
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
                            <button type="submit" name="registerartist" class="btn btn-success">Add To Transactions
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