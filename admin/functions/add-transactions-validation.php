<?php
include '../db-conection.php';

$sellingprice = mysqli_real_escape_string($conn, $_POST['selling_price']);
$askingprice = mysqli_real_escape_string($conn, $_POST['asking_price']);
$category = mysqli_real_escape_string($conn, $_POST['artwork_category']);
$customer = mysqli_real_escape_string($conn, $_POST['customer_id']);
$passwordlength = strlen($password);
$usernamelength = strlen($username);
if (
    empty($sellingprice) || empty($askingprice) || empty($customer) || empty($category)
) {
    $message = "
<script>
toastr.error('Please Provide all the details');
</script>
";
} else if (!preg_match("/^[0-9]*$/", $sellingprice)) {
    $message = "
<script>
toastr.error('Selling Price format is incorrect');
</script>
";
} else if (!preg_match("/^[0-9]*$/", $askingprice)) {
    $message = "
<script>
toastr.error('Asking Price format is incorrect');
</script>
";
} else {


    $sql = "INSERT INTO `transaction` (`transaction_sale_price`,`transaction_asking_price`, `transaction_artwork_id`, `transaction_customer_id`) VALUES ('$sellingprice', '$askingprice', '$category', '$customer')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {

        $message = "
                                        <script>
                                        toastr.success('Registration Successful. Please login to continue.');
                                        </script>";
        echo "<script>
                                    window.location.replace('manage-transactions.php');
                                    </script>";
    } else {
        $message = "
                                    <script>
                                    toastr.error('Registration Failed. Please try again.');
                                    </script>";
    }
}