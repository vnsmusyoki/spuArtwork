<?php
include '../db-conection.php';

$catname = mysqli_real_escape_string($conn, $_POST['category_name']);
$catreg = mysqli_real_escape_string($conn, $_POST['category_registration']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
if (
    empty($catname) || empty($catreg) ||
    empty($description)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[a-zA-z ]*$/", $catreg)) {
    $message = "
<script>
toastr.error('Provided an invalid registration characters');
</script>
";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $catreg)) {
    $message = "
<script>
toastr.error('Category registration format is incorrect');
</script>
";
} else {

    
        $addstaff = "UPDATE  `category` SET `category_name`='$catname', `category_reg`='$catreg', `category_desc`='$description' WHERE `category_id`='$id'";
        $querystaff = mysqli_query($conn, $addstaff);
        $lastmemberid = mysqli_insert_id($conn);
        if ($querystaff) {

            $message = "
                                        <script>
                                        toastr.success('Category Registered Successfully. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-art-categories.php');
                                    </script>";
        } else {
            $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
        }
    }