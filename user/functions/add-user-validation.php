<?php
include '../db-conection.php';

$fullnames = mysqli_real_escape_string($conn, $_POST['full_names']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonenumberlength = strlen($phone_number);
$idnumberlength = strlen($id_number);
if (
    empty($fullnames) ||
    empty($email) ||
    empty($gender) ||
    empty($password) ||
    empty($username) ||
    empty($description) ||
    empty($phone_number)||empty($id_number)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} elseif (!preg_match('/^[a-zA-z ]*$/', $fullnames)) {
    $message = "
<script>
toastr.error('Provided an invalid names characters');
</script>
";
} elseif (!preg_match('/^[a-zA-z0-9 ]*$/', $username)) {
    $message = "
<script>
toastr.error('Username format is incorrect');
</script>
";
}  elseif (!preg_match('/^[0-9]*$/', $id_number)) {
    $message = "
<script>
toastr.error('ID Number format is incorrect');
</script>
";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "
<script>
toastr.error('Incorrect email address. Provide a valid one.');
</script>
";
} elseif ($usernamelength < 8) {
    $message = "
    <script>
        toastr.error('Username field require at least 8 characters.');
    </script>";
}elseif ($phonenumberlength !== 10) {
    $message = "
    <script>
        toastr.error('Phone Number field require at least 8 characters.');
    </script>";
} elseif ($idnumberlength !== 8) {
    $message = "
    <script>
        toastr.error('ID Number field require at least 8 characters.');
    </script>";
} else {
    $checkemail = "SELECT * FROM `user` WHERE `user_email` = '$email'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        $message = "
    <script>
    toastr.error('Email Address already exists. Please confirm your email  again .');
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
            $sql = "INSERT INTO `user`(`user_full_names`, `user_email`, `user_phone_number`, `user_gender`, `user_home_address`, `user_id_number`) VALUES ('$fullnames', '$email', '$phone_number', '$gender', '$description', '$id_number')";
            $result = mysqli_query($conn, $sql);
            $lastid = mysqli_insert_id($conn);
            $password = md5($password);
            $addstaff = "INSERT INTO `login`(`login_username`, `login_rank`, `login_admin_id`, `login_agent_id`,`login_user_id`, `login_password`) VALUES ('$username','user',null,null,'$lastid','$password')";
            $querystaff = mysqli_query($conn, $addstaff);
            $lastmemberid = mysqli_insert_id($conn);
            if ($querystaff) {
                $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
                echo "<script>
                                    window.location.replace('manage-users.php');
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