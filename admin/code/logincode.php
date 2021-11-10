<?php
include('connection.php');
$user = $_POST['user'];
$password = $_POST['password'];
$select = "SELECT * FROM `admin`";
$query = mysqli_query($con, $select);
$result = mysqlI_fetch_array($query, MYSQLI_BOTH);
if ($result['username'] == $user) {
    if ($result['password'] == $password) {
        header("location:../dashboard.php");
    } else {
        echo "Password not match";
    }
} else {
    echo "Username not match";
}
