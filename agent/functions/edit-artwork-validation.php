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
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $catreg)) {
    $message = "
<script>
toastr.error('Artiwprk registration format is incorrect');
</script>
";
} else {
    $artworkid = $_GET['artwork'];
    $addstaff = "UPDATE `artwork` SET `artwork_type`='$cattype', `artwork_reg`='$catreg', `artwork_charges`='$catprices', `artwork_desc`='$description', `artwork_cat_id`='$category', `artwork_artist_id`='$artist' WHERE `artwork_id`='$artworkid'";
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