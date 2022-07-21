<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['payment'];
$checkproduct = "DELETE  FROM `payment` WHERE `payment_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-payments.php');</script>";
}