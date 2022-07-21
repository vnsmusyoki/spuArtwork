<?php
session_start();
$username = $message = '';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Account DashboardAccess</title>

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
    <link rel="stylesheet" type="text/css" href="admin/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/toastr-btn.css">
    <script src="admin/assets/js/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/js/toastr.min.js"></script>
    <script src="admin/assets/js/toastr-options.js"></script>


</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="index.php">
                    <h4>Real Estate Management</h4>
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="admin/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To My Account</h2>
                        </div>
                        <form class="pt-3" method="POST" action="">
                            <?php

                            if (isset($_POST["loginaccount"])) {

                                require 'login-validate.php';
                            }
                            ?>
                            <?php echo $message; ?>
                            <div class="select-role">

                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">

                                        <button type="submit" name="loginaccount"
                                            class="btn btn-primary btn-lg btn-block">Sign In</button>
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Register
                                            To Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="admin/vendors/scripts/core.js"></script>
    <script src="admin/vendors/scripts/script.min.js"></script>
    <script src="admin/vendors/scripts/process.js"></script>
    <script src="admin/vendors/scripts/layout-settings.js"></script>
</body>

</html>