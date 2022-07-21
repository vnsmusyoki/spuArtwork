<?php include 'top-bar.php'; ?>
<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-1" checked="">
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-2">
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                        value="icon-style-3">
                    <label class="custom-control-label" for="sidebaricon-3"><i
                            class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-1" checked="">
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-2">
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                            aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-3">
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-4" checked="">
                    <label class="custom-control-label" for="sidebariconlist-4"><i
                            class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-5">
                    <label class="custom-control-label" for="sidebariconlist-5"><i
                            class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                        value="icon-list-style-6">
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
            </div>
        </div>
    </div>
</div>
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.php">
            <h4>User Dashboard</h4>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <?php include 'sidebar-menu.php'; ?>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="vendors/images/banner-img.png" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back User - <div class="weight-600 font-30 text-blue"><?php echo $globalmembername; ?>!
                        </div>
                    </h4>
                    <p class="font-18 max-width-600">You are in control of every building linked to you in the
                        system,
                        Create,
                        Edit
                        and Generate Reports</p>
                </div>
            </div>
        </div>


        <div class="card-box mb-30">
            <h2 class="h4 pd-20">Booked Rooms</h2>
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">User</th>
                        <th>Phone Number</th>
                        <th>Building</th>
                        <th>Location</th>
                        <th>Amount Paid</th>
                        <th>Date Paid</th>
                        <th>Transacode Code</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `payment` WHERE  `payment_user_id` = '$memberid'";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['payment_id'];
                                        $date = $fetch['payment_date'];
                                        $buildid = $fetch['payment_building_id'];
                                        $userid = $fetch['payment_user_id']; 
                                        $amount = $fetch['payment_amount'];
                                        $transacode = $fetch['payment_code'];
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
                                        

                                        echo "
                                <tr>
                                    <td class='table-plus'>$username
                                       </td>
                                    <td>$userphone</td> 
                                    <td>$buildingname </td> 
                                    <td>$location</td> 
                                    <td>Kshs. $amount</td>
                                    <td>$date</td> 
                                    <td style='text-transform:uppercase;'>$transacode</td> 
                                   
                                </tr>";
                                    }
                                }
                                ?>

                </tbody>
            </table>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Designed and Created By <a href="#">
                Moreen</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>

</html>