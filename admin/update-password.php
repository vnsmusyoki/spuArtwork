<?php include 'top-bar.php'; ?>
<?php echo $message = $description = $visit_date = $visitor_name =''; ?>
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

                                            require 'functions/update-account-password-validation.php';
                                        }
                                        ?>
                    <?php echo $message; ?>
                    <div class="mt-4 mb-4">
                        <h3>Update Password</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" placeholder="" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" placeholder="" name="confirm_password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" name="registerartist" class="btn btn-warning">Update Password
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