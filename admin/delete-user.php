<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['user'];
$checkproduct = "DELETE  FROM `user` WHERE `user_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-users.php');</script>";
}