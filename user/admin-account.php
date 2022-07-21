<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
} else {
    include '../db-conection.php';
    $email = $_SESSION['user'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email' ";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];
            $memberid = $fetch['login_user_id'];
            global $memberid;
            $checkclient = "SELECT *  FROM `user` WHERE `user_id`= '$memberid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchclient = mysqli_fetch_assoc($queryemail)) {
                    $globalmembername = $fetchclient['user_full_names'];
                }
            }
            global $globalmembername;
            global $memberid;
            global $globalloggedinid;
        }
    }
}