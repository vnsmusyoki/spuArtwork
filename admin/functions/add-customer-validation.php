<?php
include '../db-conection.php';

$fullnames = mysqli_real_escape_string($conn, $_POST['full_names']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonelength = strlen($phone_number);
if (
    empty($fullnames) || empty($email) || empty($residence) || empty($password) || empty($username) ||
    empty($phone_number)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-z ]*$/", $fullnames)) {
    $message = "
<script>
toastr.error('Provided an invalid names characters');
</script>
";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $username)) {
    $message = "
<script>
toastr.error('Username format is incorrect');
</script>
";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "
<script>
toastr.error('Incorrect email address. Provide a valid one.');
</script>
";
} else if ($usernamelength < 8) {
    $message = "
    <script>
        toastr.error('Username field require at least 8 characters.');
    </script>";
} else if ($phonelength != 10) {
    $message = "
    <script>
        toastr.error('Phone number field require exactly 10 digits.');
    </script>";
} else {

    $checkemail = "SELECT * FROM `customer` WHERE `customer_phone_number` = '$phone_number' OR     `customer_email` = '$email'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        $message = "
    <script>
    toastr.error('Email Address/ Phone Number already exists. Please confirm your email/ Phone Number  again .');
    </script>";
    } else {

        $checkusername = "SELECT * FROM `login` WHERE `login_username` = '$username'";
        $queryusername = mysqli_query($conn, $checkusername);
        $checkusernamerows = mysqli_num_rows($queryusername);
        if ($checkusernamerows >= 1) {
            $message = "
    <script>
    toastr.error('Username already exists. Please confirm your email  again .');
    </script>";
        } else {
            $sql = "INSERT INTO `customer`(`customer_name`, `customer_location`, `customer_phone_number`, `customer_email`) VALUES ('$fullnames', '$residence', '$phone_number', '$email')";
            $result = mysqli_query($conn, $sql);
            $lastid = mysqli_insert_id($conn);
            $password = md5($password);
            $addstaff = "INSERT INTO `login`(`login_username`, `login_rank`, `login_admin_id`, `login_user_id`,`login_artist_id`, `login_password`) VALUES ('$username','customer',null,null,null, '$password')";
            $querystaff = mysqli_query($conn, $addstaff);
            $lastmemberid = mysqli_insert_id($conn);
            if ($querystaff) {

                $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
                echo "<script>
                                    window.location.replace('manage-customers.php');
                                    </script>";
            } else {
                $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
            }
        }
    }
}