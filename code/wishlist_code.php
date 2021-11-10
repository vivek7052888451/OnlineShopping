<?php
session_start();
include('../admin/code/connection.php');
if ($_SESSION["user"]) {
    $user_id = $_SESSION['user'];
    $product_id = $_REQUEST['id'];

    //echo $product_id;
    $sel_wishlist_product = "select * from product where id='$product_id'";
    $wishlist_query = mysqli_query($con, $sel_wishlist_product);
    $wishlist_data = mysqli_fetch_array($wishlist_query, MYSQLI_BOTH);



    $status = 1;
    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");

    $date = date("y/m/d");

    $sele_wishlist = "SELECT * FROM `wishlist` WHERE user_id='$user_id' and product_id='$product_id'";
    $wishlist_query = mysqli_query($con, $sele_wishlist);
    if (mysqli_num_rows($wishlist_query) > 0) {
        echo "<script>alert('already insert');</script>";
        header("location:../wishlist.php");
    } else {
        $insert_wishlist = "INSERT INTO `wishlist`(`user_id`, `product_id`, `status`, `date`, `time`) VALUES ('$user_id','$product_id','$status','$date','$time')";
        if (mysqli_query($con, $insert_wishlist)) {
            echo "<script>alert(' insert');</script>";
            header("location:../wishlist.php");
        } else {
            echo "<script>alert(' not insert');</script>";
        }
    }
} else {
    header("location:../loginpage.php");
}
