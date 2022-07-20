<?php
include '../db-conection.php';

$fullnames = mysqli_real_escape_string($conn, $_POST['full_names']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$residence = mysqli_real_escape_string($conn, $_POST['residence']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
if (
    empty($fullnames) || empty($email) || empty($residence) || empty($password) || empty($username) ||
    empty($description)
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
} else {

    $checkemail = "SELECT * FROM `artist` WHERE `artist_email` = '$email'";
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
            $filename = $_FILES['profile_pic']['name'];
            $filetmpname = $_FILES['profile_pic']['tmp_name'];
            $filesize = $_FILES['profile_pic']['size'];
            $fileerror = $_FILES['profile_pic']['error'];
            $filetype = $_FILES['profile_pic']['type'];
            $fileext = explode('.', $filename);
            $fileActualExt = strtolower(end($fileext));
            $allowed = array('jpg', 'png', 'jpeg');
            if (in_array($fileActualExt, $allowed)) {
                if ($fileerror === 0) {
                    if ($filesize > 10000000) {
                        echo "<script>alert('upload too big');</script>";
                    } else {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                       echo $fileDestination = 'artists/' . $fileNameNew;
                        move_uploaded_file($filetmpname, $fileDestination);
                        
                        $sql = "INSERT INTO `artist` (`artist_name`,`artist_email`, `artist_image`, `artist_desc`, `artist_location`) VALUES ('$fullnames', '$email', '$fileNameNew', '$description', '$residence')";
                        $result = mysqli_query($conn, $sql);
                        $lastid = mysqli_insert_id($conn);
                        $password = md5($password);
                        $addstaff = "INSERT INTO `login`(`login_username`, `login_rank`, `login_admin_id`, `login_user_id`,`login_artist_id`, `login_password`) VALUES ('$username','artist',null,null,'$lastid','$password')";
                $querystaff = mysqli_query($conn, $addstaff);
                $lastmemberid = mysqli_insert_id($conn);
                if ($querystaff) {

                    $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
                    echo "<script>
                                    window.location.replace('manage-artists.php');
                                    </script>";
                } else {
                    $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
                }
                    }
                } else {
                    echo "<script>alert('upload error');</script>";
                }
            } else {
                echo "<script>alert('upload error');</script>";
            }
            
           
        }
    }
}