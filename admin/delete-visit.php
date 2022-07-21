<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['visit'];
$checkproduct = "DELETE  FROM `book_visits` WHERE `visit_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-visits.php');</script>";
}