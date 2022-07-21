<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
} else {
    include '../db-conection.php';
    $email = $_SESSION['admin'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email' ";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];
            $memberid = $fetch['login_admin_id'];
            global $memberid;
            $checkclient = "SELECT *  FROM `admin` WHERE `admin_id`= '$memberid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchclient = mysqli_fetch_assoc($queryemail)) {
                    $globalmembername = $fetchclient['admin_full_name'];
                }
            }
            global $globalmembername;
            global $memberid;
            global $globalloggedinid;
        }
    }
}