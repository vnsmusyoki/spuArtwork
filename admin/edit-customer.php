<?php include 'top-bar.php'; ?>
<?php echo $message  = $full_names = $residence = $password = $username = $email= $phone_number=''; ?>
<?php
include '../db-conection.php';
$id = $_GET['customer'];
$bookingplans = "SELECT * FROM `customer` WHERE `customer_id` = '$id'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['customer_id'];
        $full_names = $fetch['customer_name'];
        $email = $fetch['customer_email'];
        $phone_number = $fetch['customer_phone_number'];
        $residence = $fetch['customer_location'];

        $usernames = "SELECT * FROM `login` WHERE `login_artist_id` = '$aid'";
        $queryusernames = mysqli_query($conn, $usernames);
        $usernamesrows = mysqli_num_rows($queryusernames);
        if ($usernamesrows >= 1) {
            while ($fetchusernames = mysqli_fetch_assoc($queryusernames)) {
                $globalusername = $fetchusernames['login_username'];
                global $globalusername;
            }
        }

      global $globalname; global $globalemailaddress; global $globaldescription; global $globallocation; global $globalusername;
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

                                            require 'functions/edit-customer-validation.php';
                                        }
                                        ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Add New Customer</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Full Names</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Johnny Brown" name="full_names"
                                value="<?php echo $full_names; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="validemail@gmail.com" type="email" name="email"
                                value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Residence</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Write the artist location here" type="text"
                                name="residence" value="<?php echo $residence; ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="password" type="password" name="password"
                                value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="0788992200" type="number" name="phone_number"
                                value="<?php echo $phone_number; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="johndoe" type="text" name="username"
                                value="<?php echo $username; ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-danger">Update Customer
                                Details</button>
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