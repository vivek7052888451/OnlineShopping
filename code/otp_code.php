<?php
include('../admin/code/connection.php');



$otp  = implode('', $_POST['otp']);

$sel_reg = "SELECT * FROM `register` WHERE otp='$otp'";
$query = mysqli_query($con, $sel_reg);
//$fetch_reg = mysqli_fetch_array($query, MYSQLI_BOTH);
// var_dump($fetch_reg);
if (mysqli_num_rows($query) == '1') {
    echo "<script>alert('otp match');</script>";
    header('location:../reset_password.php');
} else {
    echo "<script>alert(' not otp match');</script>";
    header("location:../OTP_page.php");
}
