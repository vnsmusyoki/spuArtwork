<?php
include '../db-conection.php';

$catreg = mysqli_real_escape_string($conn, $_POST['artwork_registration']);
$catprices = mysqli_real_escape_string($conn, $_POST['artwork_charges']);
$cattype = mysqli_real_escape_string($conn, $_POST['category_type']);
$category = mysqli_real_escape_string($conn, $_POST['artwork_category']);
$artist = mysqli_real_escape_string($conn, $_POST['artwork_artist']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
if (
    empty($catreg) || empty($catprices) || empty($category) || empty($artist) || empty($description) ||
    empty($cattype)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
}  else if (!preg_match("/^[a-zA-z0-9 ]*$/", $catreg)) {
    $message = "
<script>
toastr.error('Artiwprk registration format is incorrect');
</script>
";
} else {

    $checkreg = "SELECT * FROM `artwork` WHERE `artwork_reg` = '$catreg'";
    $queryreg = mysqli_query($conn, $checkreg);
    $checkregrows = mysqli_num_rows($queryreg);
    if ($checkregrows >= 1) {
        $message = "
    <script>
    toastr.error('Artwork Registration number has been registered already .');
    </script>";
    } else {
        $addstaff = "INSERT INTO `artwork`(`artwork_type`, `artwork_reg`, `artwork_charges`, `artwork_desc`, `artwork_cat_id`, `artwork_artist_id`) VALUES ('$cattype','$catreg','$catprices', '$description','$category','$artist')";
        $querystaff = mysqli_query($conn, $addstaff);
        $lastmemberid = mysqli_insert_id($conn);
        if ($querystaff) {

            $message = "
                                        <script>
                                        toastr.success('Category Registered Successfully. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-artworks.php');
                                    </script>";
        } else {
            $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
        }
    }
}