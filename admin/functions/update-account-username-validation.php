<?php
include '../db-conection.php';
$username = mysqli_real_escape_string($conn, $_POST['username']);
$usernamelength = strlen($username);
if (empty($username)) {
    $message = "
        <script>
            toastr.error('Please Provide your new username');
        </script>
    ";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $username)) {
    $message = "
        <script>
            toastr.error('Incorrect email address. Provide a valid one.');
        </script>
    ";
} else if ($usernamelength < 8) {
    $message = "
    <script>
        toastr.error('Username should have atleast 8 characters');
    </script>
";
} else {
    $checkemail = "SELECT *  FROM `login` WHERE `login_username` = '$username'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        $message = "
    <script>
        toastr.error('username already exists. Please confirm your email  again .');
    </script>";
    } else {
        $update = "UPDATE `login` SET `login_username` = '$username' WHERE `login_id` = '$globalloggedinid'";
        $queryupdate = mysqli_query($conn, $update);
        if ($queryupdate) {
            $message = "
        <script>
            toastr.success('Username has been updated successfully');
        </script>
    ";
            echo "<script>
    window.location.replace('logout.php');
    </script>";
        }
    }
}