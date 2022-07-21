<?php
include '../db-conection.php';

$dates = mysqli_real_escape_string($conn, $_POST['visit_date']);
$visitor = mysqli_real_escape_string($conn, $_POST['visitor_name']);
$building = mysqli_real_escape_string($conn, $_POST['building_name']);

if (
    empty($dates) || empty($visitor) || empty($building)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else {

    $checkemail = "SELECT * FROM `book_visits` WHERE `visit_date` = '$dates' AND    `visit_building_id` = '$building' AND `visit_user_id` = '$visitor'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        $message = "
    <script>
    toastr.error('Your booking is already recorded.');
    </script>";
    } else {
        $sql = "INSERT INTO `book_visits`(`visit_date`, `visit_building_id`, `visit_user_id`) VALUES ('$dates','$building','$visitor')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
            echo "<script>
                                    window.location.replace('manage-visits.php');
                                    </script>";
        } else {
            $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
        }
    }
}