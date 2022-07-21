<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $category_registration = $category_name = ''; ?>
<?php
include '../db-conection.php';
$id = $_GET['art'];
$bookingplans = "SELECT * FROM `category` WHERE `category_id` = '$id'";
$querybookingsplans = mysqli_query($conn, $bookingplans);
$bookingsplansrows = mysqli_num_rows($querybookingsplans);
if ($bookingsplansrows >= 1) {
    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
        $aid = $fetch['category_id'];
        $globalname = $fetch['category_name']; 
        $globalcatreg = $fetch['category_reg'];
        $globalcatdesc = $fetch['category_desc'];

       

      global $globalname; global $globalcatdesc; global $globalcatreg; 
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

                        require 'functions/edit-art-category-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Add Artist Category</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Category Names</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="category Name" name="category_name"
                                value="<?php echo $globalname; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Category Registration</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="" type="text" name="category_registration"
                                value="<?php echo $globalcatreg; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Decription</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="description" id="" cols="3" rows="3"
                                class="form-control"><?php echo $globalcatdesc; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-danger">Update Art
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