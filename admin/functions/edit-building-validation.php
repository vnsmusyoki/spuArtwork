<?php
include '../db-conection.php';

$catname = mysqli_real_escape_string($conn, $_POST['building_name']);
$rent = mysqli_real_escape_string($conn, $_POST['building_charges']);
$agent = mysqli_real_escape_string($conn, $_POST['building_agent']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
if (
    empty($catname) ||
    empty($rent) ||
    empty($agent) ||
    empty($location) ||
    empty($description)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} elseif (!preg_match('/^[a-zA-z0-9 ]*$/', $catname)) {
    $message = "
<script>
toastr.error('Building Name  format is incorrect');
</script>
";
} else {
    $filename = $_FILES['building_image']['name'];
    $filetmpname = $_FILES['building_image']['tmp_name'];
    $filesize = $_FILES['building_image']['size'];
    $fileerror = $_FILES['building_image']['error'];
    $filetype = $_FILES['building_image']['type'];
    $fileext = explode('.', $filename);
    $fileActualExt = strtolower(end($fileext));
    $allwoed = ['img', 'IMG', 'JPEG', 'jpeg', 'PNG', 'png'];
    if (in_array($fileActualExt, $allwoed)) {
        if ($fileerror === 0) {
            if ($filesize > 10000000) {
                echo "<script>alert('upload too big');</script>";
            } else {
                $filenamenew = uniqid('', true) . '.' . $fileActualExt;
                $filedestination = 'buildings/' . $filenamenew;
                move_uploaded_file($filetmpname, $filedestination);
                $buidid = $_GET['building'];
                $addstaff = "UPDATE  `building` SET `building_name`='$catname', `buidling_description`='$description', `building_rent`='$rent', `building_images`='$filenamenew', `building_location`='$location', `building_agent_id`='$agent' WHERE  `buidling_id`='$buidid'";
                $querystaff = mysqli_query($conn, $addstaff);
                $lastmemberid = mysqli_insert_id($conn);
                if ($querystaff) {
                    $message = "
                                                <script>
                                                toastr.success('Add Building Successfully');
                                                </script>";
                    echo "<script>
                                            window.location.replace('manage-buildings.php');
                                            </script>";
                } else {
                    $message = "
                                            <script>
                                            toastr.error('Registration Failed. Please try again.');
                                            </script>";
                }
            }
        }
    } else {
        echo "<script>alert('an error occured');</script>";
    }
}