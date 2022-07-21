<?php
include '../db-conection.php';
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$passlength = strlen($password);
if (empty($cpassword) || empty($password)) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if ($passlength < 6) {
    $message = "
                                    <script>
                                        toastr.error('Password should have atleast 6 characters');
                                    </script>
                                ";
} else if ($password !== $cpassword) {
    $message = "
                                    <script>
                                        toastr.error('Password failed to match');
                                    </script>
                                ";
} else {
    $newpass = md5($password);
    $update = "UPDATE `login` SET `login_password` = '$newpass' WHERE `login_id` = '$globalloggedinid'";
    $queryupdate = mysqli_query($conn, $update);
    if ($queryupdate) {
        $message = "
                                        <script>
                                            toastr.success('Password has been updated successfully');
                                        </script>
                                    ";
    }
}