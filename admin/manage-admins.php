<?php include 'admin-account.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="admin/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="admin/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="admin/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="admin/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/styles/icon-font.min.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

    <link rel="stylesheet" type="text/css" href="admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="admin/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/styles/style.css">
</head>

<body>


    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">

            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>

            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name"><?php echo $globalmembername; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="update-username.php"><i class="dw dw-user1"></i> Username</a>
                        <a class="dropdown-item" href="update-password.php"><i class="dw dw-settings2"></i> Password</a>
                        <a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.php">
                <h4>Admin Dashboard </h4>
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
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Export Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">All Registered Admin Accounts</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover multiple-select-row data-table-export nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Email Address</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `admin`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['admin_id'];
                                        $name = $fetch['admin_full_name'];
                                        $emailaddress = $fetch['admin_email'];
                                        $phone = $fetch['admin_mobile'];
                                        $gender = $fetch['admin_gender']; 

                                        $usernames = "SELECT * FROM `login` WHERE `login_admin_id` = '$aid'";
                                        $queryusernames = mysqli_query($conn, $usernames);
                                        $usernamesrows = mysqli_num_rows($queryusernames);
                                        if ($usernamesrows >= 1) {
                                            while ($fetchusernames = mysqli_fetch_assoc($queryusernames)) {
                                                $username = $fetchusernames['login_username'];
                                            }
                                        }

                                        echo "
                                <tr>
                                    <td class='table-plus'>$name</td>
                                    <td>$emailaddress</td> 
                                    <td>$gender </td> 
                                    <td>$phone</td>
                                    <td>$username</td>
                                    
                                </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->
            </div>

        </div>
    </div>

    <!-- js -->
    <script src="admin/vendors/scripts/core.js"></script>
    <script src="admin/vendors/scripts/script.min.js"></script>
    <script src="admin/vendors/scripts/process.js"></script>
    <script src="admin/vendors/scripts/layout-settings.js"></script>
    <script src="admin/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="admin/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="admin/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="admin/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="admin/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="admin/src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="admin/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="admin/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="admin/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="admin/vendors/scripts/datatable-setting.js"></script>
</body>

</html>