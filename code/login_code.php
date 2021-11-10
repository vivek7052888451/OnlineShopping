<?php
session_start();
include('../admin/code/connection.php');
if (isset($_POST['login'])) {

    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $select_login = "SELECT * FROM `register` where email='$login_email' and  password='$login_password'";
    $reg_query = mysqli_query($con, $select_login);
    $fetch = mysqli_fetch_array($reg_query, MYSQLI_BOTH);
    if (mysqli_num_rows($reg_query) == 1) {
        $_SESSION["user"] = $fetch['id'];
        header("location:../home.php");
    } else {
        echo "<script>alert('email Password not match');</script>";
        header("location:../loginpage.php");
    }
}
