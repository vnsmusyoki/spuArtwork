<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['artwork'];
$checkproduct = "DELETE  FROM `artwork` WHERE `artwork_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-artworks.php');</script>";
}