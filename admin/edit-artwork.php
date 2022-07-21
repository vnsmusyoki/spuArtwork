<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $artwork_charges = $artwork_registration = $category_type = ''; ?>
<?php
include '../db-conection.php';
$artworkid = $_GET['artwork'];
$bookingplans = "SELECT * FROM `artwork` WHERE `artwork_id`='$artworkid'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['artwork_id'];
        $artwork_registration = $fetch['artwork_reg'];
        $type = $fetch['artwork_type'];
        $artwork_charges = $fetch['artwork_charges'];
        $description = $fetch['artwork_desc'];
        $artcat = $fetch['artwork_cat_id'];
        $artistid = $fetch['artwork_artist_id'];
        $usernames = "SELECT * FROM `category` WHERE `category_id` = '$artcat'";
        $queryusernames = mysqli_query($conn, $usernames);
        $usernamesrows = mysqli_num_rows($queryusernames);
        if ($usernamesrows >= 1) {
            while ($fetchusernames = mysqli_fetch_assoc($queryusernames)) {
                $category = $fetchusernames['category_name'];
            }
        }
        $checkartist = "SELECT * FROM `artist` WHERE `artist_id` = '$artistid'";
        $queryartists = mysqli_query($conn, $checkartist);
        $artistsrows = mysqli_num_rows($queryartists);
        if ($artistsrows >= 1) {
            while ($fetchartists = mysqli_fetch_assoc($queryartists)) {
                $artistsname = $fetchartists['artist_name'];
                $artistlocation = $fetchartists['artist_location'];
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

                        require 'functions/edit-artwork-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Add Artwork </h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Registration</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Artwork Name"
                                name="artwork_registration" value="<?php echo $artwork_registration; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Charges</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" min="100" placeholder="Artwork charges"
                                name="artwork_charges" value="<?php echo $artwork_charges; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Category Registration</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="category_type" id="" class="form-control">
                                <option value="">click to select</option>
                                <option value="Category Type 1">Category Type 1</option>
                                <option value="Category Type 2">Category Type 2</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Category</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="artwork_category" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `category`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['category_id'];
                                        $name = $fetch['category_name'];
                                        echo "<option value='$aid'>$name</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Artist</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="artwork_artist" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `artist`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $id = $fetch['artist_id'];
                                        $names = $fetch['artist_name'];
                                        echo "<option value='$id'>$names</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Decription</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="description" id="" cols="3" rows="3"
                                class="form-control"><?php echo $description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-success">Register Art
                                Category</button>
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