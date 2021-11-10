<?php
include('../admin/code/connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
date_default_timezone_set("Asia/Calcutta");
$reg_time = date("H:i:s");
$reg_date = date("y/m/d");
$reg_status = 1;

$select_reg = "SELECT * FROM `register` WHERE email='email'";
$reg_query = mysqli_query($con, $select_reg);
if (mysqli_num_rows($reg_query) > 0) {
    echo "<script>alert('Email allready insert');</script>";
} else {
    $reg_insert = "INSERT INTO `register`( `name`, `email`, `mobile`, `password`, `date`, `time`, `status`) VALUES ('$name','$email','$mobile','$password','$reg_date','$reg_time','$reg_status')";
    if (mysqli_query($con, $reg_insert)) {
        echo "Data Saved Successfully";
    } else {
        echo "Server Issue";
    }
}
