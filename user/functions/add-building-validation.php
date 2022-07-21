<?php
include '../db-conection.php';

$catname = mysqli_real_escape_string($conn, $_POST['building_name']);
$rent = mysqli_real_escape_string($conn, $_POST['building_charges']); 
$location = mysqli_real_escape_string($conn, $_POST['location']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
if (
    empty($catname) ||
    empty($rent) || 
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
                $addstaff = "INSERT INTO `building`(`building_name`, `buidling_description`, `building_rent`, `building_images`, `building_location`, `building_agent_id`) VALUES ('$catname','$description','$rent','$filenamenew','$location','$memberid')";
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