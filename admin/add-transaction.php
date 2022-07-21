<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $artwork_charges = $artwork_registration = $category_type = ''; ?>
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

                        require 'functions/add-transactions-validation.php';
                    }
                    ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Add Transaction Record </h3>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Selling Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" min="100" placeholder="Artwork selling Price"
                                name="selling_price" value="<?php echo $selling_price; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Asking Price</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="number" min="100" placeholder="Artwork Asking Price"
                                name="asking_price" value="<?php echo $asking_price; ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Artwork Selected</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="artwork_category" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `artwork`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['artwork_id'];
                                        $name = $fetch['artwork_reg'];
                                        echo "<option value='$aid'>$name</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="customer_id" id="" class="form-control">
                                <option value="">click to select</option>
                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `customer`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $id = $fetch['customer_id'];
                                        $names = $fetch['customer_name'];
                                        echo "<option value='$id'>$names</option>";
                                    }
                                }
                                ?>
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