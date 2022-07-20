<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $full_names = $residence = $password = $username = $email = $profile_pic = ''; ?>
<?php
include '../db-conection.php';
$id = $_GET['artist'];
$bookingplans = "SELECT * FROM `artist` WHERE `artist_id` = '$id'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['artist_id'];
        $globalname = $fetch['artist_name'];
        $globalemailaddress = $fetch['artist_email'];
        $globaldescription = $fetch['artist_desc'];
        $globallocation = $fetch['artist_location'];

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

                        require 'functions/edit-artist-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Add Artist</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Full Names</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Johnny Brown" name="full_names"
                                value="<?php echo $globalname; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="validemail@gmail.com" type="email" name="email"
                                value="<?php echo $globalemailaddress; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Residence</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Write the artist location here" type="text"
                                name="residence" value="<?php echo $globallocation; ?>">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Avatar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="upload image" type="file" name="profile_pic"
                                value="<?php echo $profile_pic; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="johndoe" type="text" name="username"
                                value="<?php echo $globalusername; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Decription</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="description" id="" cols="3" rows="3"
                                class="form-control"><?php echo $globaldescription; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-danger">Update Artist</button>
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