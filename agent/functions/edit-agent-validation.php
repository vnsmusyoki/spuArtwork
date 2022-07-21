<?php
include '../db-conection.php';

$fullnames = mysqli_real_escape_string($conn, $_POST['full_names']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']); 
$username = mysqli_real_escape_string($conn, $_POST['username']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
if (
    empty($fullnames) ||
    empty($email) ||
    empty($gender) || 
    empty($username) ||
    empty($description) ||
    empty($phone_number)
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
} else {
    $agentid = $_GET['agent'];
    $sql = "UPDATE `agent` SET  `agent_full_names`='$fullnames',`agent_email`='$email', `agent_phone_number`='$phone_number', `agent_gender`='$gender', `agent_home_address`='$description' WHERE `agent_id`='$agentid'";
    $result = mysqli_query($conn, $sql);
    $lastid = mysqli_insert_id($conn);
    $password = md5($password);
    $addstaff = "UPDATE `login` SET `login_username`='$username' WHERE `login_agent_id`='$agentid'";
    $querystaff = mysqli_query($conn, $addstaff);
    $lastmemberid = mysqli_insert_id($conn);
    if ($querystaff) {
        $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-agents.php');
                                    </script>";
    } else {
        $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
    }
}