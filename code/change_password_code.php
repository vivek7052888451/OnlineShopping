<?php
session_start();
include('../admin/code/connection.php');

$userID = $_SESSION["user"];


$Old = $_POST['old_pass'];
// echo $Old;
// echo "<br/>";
$new_pass = $_POST['new_pass'];
// echo $new_pass;
// echo "<br/>";
$con_pass = $_POST['con_pass'];
// echo $con_pass;

$sel_change_pass = "SELECT * FROM `register` WHERE id='$userID'";
$sel_quary = mysqli_query($con, $sel_change_pass);
$fetch_user = mysqli_fetch_array($sel_quary, MYSQLI_BOTH);
if ($fetch_user['password'] == $Old) {
    if ($new_pass == $con_pass) {
        echo "<script>alert('ok');</script>";
        $update_password = "UPDATE `register` SET `password`='$new_pass'";
        if (mysqli_query($con, $update_password)) {
            echo "<script>alert('Update Password Successfull');</script>";
            header("location:../loginpage.php");
        } else {
            echo "<script>alert('Update failed');</script>";
        }
    } else {
        echo "<script>alert('new pass and con pass not match');</script>";
    }
} else {
    echo "<script>alert('Old Password Not Match');</script>";
}
