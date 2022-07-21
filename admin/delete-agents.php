<?php
// require'admin-account.php';
?><?php
include '../db-conection.php';
$dietcheck = $_GET['agent'];
$checkproduct = "DELETE  FROM `artist` WHERE `agent_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
    echo "<script>window.location.replace('manage-agents.php');</script>";
}