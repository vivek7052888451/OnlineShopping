<?php
session_start();
include('../admin/code/connection.php');

$id = $_SESSION["user"];

$user_name = $_POST['user_name'];
$user_mobile = $_POST['user_mobile'];


//echo $id;
$sel_up = "SELECT * FROM `register` WHERE id='$id'";
if (mysqli_query($con, $sel_up)) {
    $user_update = "UPDATE `register` SET `name`='$user_name',`mobile`='$user_mobile'";
    if (mysqli_query($con, $user_update)) {
        echo "<script>alert('User data update');</script>";
        header("location:../user_profile.php");
    } else {
        echo "<script>alert('User data update failed');</script>";
    }
}
