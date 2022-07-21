<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['building'];
$checkproduct = "DELETE  FROM `building` WHERE `buidling_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-buildings.php');</script>";
}