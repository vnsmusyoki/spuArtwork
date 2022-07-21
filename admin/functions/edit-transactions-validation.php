<?php
include '../db-conection.php';

$amount = mysqli_real_escape_string($conn, $_POST['amount_paid']);
$transactioncode = mysqli_real_escape_string($conn, $_POST['transaction_code']);
$building = mysqli_real_escape_string($conn, $_POST['building_selected']);
$customer = mysqli_real_escape_string($conn, $_POST['user_name']);
$paymentmode = mysqli_real_escape_string($conn, $_POST['payment_mode']);

$transcodelength = strlen($transactioncode);
if (
    empty($amount) || empty($transactioncode) || empty($building) || empty($customer) || empty($paymentmode)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[0-9]*$/", $amount)) {
    $message = "
<script>
toastr.error('Amount paid has incorrect format');
</script>
";
} elseif ($transcodelength !== 11) {
    $message = "
    <script>
        toastr.error('transaction code field must have 11 digits');
    </script>";
} else {


    $id = $_GET['payment'];
    $sql = "UPDATE `payment` SET `payment_amount`='$amount', `payment_mode`='$paymentmode', `payment_code`='$transactioncode',`payment_building_id`='$building', `payment_user_id`='$customer' WHERE `payment_id`='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-payments.php');
                                    </script>";
    } else {
        $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
    }
}