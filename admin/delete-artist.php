<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['artist'];
$checkproduct = "DELETE  FROM `artist` WHERE `artist_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-artists.php');</script>";
}