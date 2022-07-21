<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['art'];
$checkproduct = "DELETE  FROM `category` WHERE `category_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-art-categories.php');</script>";
}