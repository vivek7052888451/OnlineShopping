<?php
include('../admin/code/connection.php');
$new = $_POST['new'];

$Confirm = $_POST['Confirm'];
if ($new == $Confirm) {
    $update = "UPDATE `register` SET password='$new'";
    if (mysqli_query($con, $update)) {
        echo "<script>alert('password Updated');</script>";
        header("location:../loginpage.php");
    } else {
        echo "<script>alert('password Updated failed');</script>";
    }
} else {
    echo "<script>alert('password not matech');</script>";
}
