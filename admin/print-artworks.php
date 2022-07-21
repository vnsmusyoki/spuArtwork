<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp Dashboard</title>

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
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search Here">
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Username</a>
                        <a class="dropdown-item" href="password.php"><i class="dw dw-settings2"></i> Password</a>
                        <a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.php">
                <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
                <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
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
                        <h4 class="text-blue h4">Generate Artwork Report</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover multiple-select-row data-table-export nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Artwork</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Pricing</th>
                                    <th>Description</th>
                                    <th>Artist</th>
                                    <th>Artist Location</th>

                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                include '../db-conection.php';
                                $bookingplans = "SELECT * FROM `artwork`";
                                $querybookingsplans = mysqli_query($conn, $bookingplans);
                                $bookingsplansrows = mysqli_num_rows($querybookingsplans);
                                if ($bookingsplansrows >= 1) {
                                    while ($fetch  = mysqli_fetch_assoc($querybookingsplans)) {
                                        $aid = $fetch['artwork_id'];
                                        $reg = $fetch['artwork_reg'];
                                        $type = $fetch['artwork_type'];
                                        $charges = $fetch['artwork_charges'];
                                        $desc = $fetch['artwork_desc'];
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

                                        echo "
                                <tr>
                                    <td class='table-plus'>$reg</td>
                                    <td>$type</td>
                                    <td>$category</td>
                                    <td>Ksh. $charges </td> 
                                    <td>$desc</td>
                                     <td>$artistsname</td>
                                     <td>$artistlocation</td>
                                    
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