<?php
session_start();
include('../admin/code/connection.php');
if ($_SESSION["user"]) {
    $product_id = $_REQUEST['id'];
    $user_id = $_SESSION['user'];

    //echo $product_id;
    $sel_cart_product = "select * from product where id='$product_id'";
    $cart_query = mysqli_query($con, $sel_cart_product);
    $cart_data = mysqli_fetch_array($cart_query, MYSQLI_BOTH);



    // $product_mrp = $cart_data['product_mrp'];

    $product_offer = $cart_data['product_offer'];
    $qty = 1;
    $subotoal = (int)$qty * (int)$product_offer;

    $status = 1;
    $order_id = 0;
    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");

    $date = date("y/m/d");

    $sele_cart_data = "SELECT * FROM `cart_table` WHERE user_id='$user_id' and product_id='$product_id'";
    $sele_cart_query = mysqli_query($con, $sele_cart_data);
    if (mysqli_num_rows($sele_cart_query) > 0) {
        echo "<script>alert('data allready insert');</script>";
        header("location:../cart.php");
    } else {
        $insert_cart = "INSERT INTO `cart_table`( `user_id`, `product_id`, `quantity`, `offer_price`, `subtotal`, `status`, `order_id`, `date`, `time`)
        VALUES ('$user_id','$product_id','$qty','$product_offer','$subotoal','$status','$order_id','$date','$time')";
        if (mysqli_query($con, $insert_cart)) {
            //echo "<script>alert('Cart insert');</script>";
            header("location:../cart.php");
        } else {
            echo "<script>alert('Cart not insert');</script>";
        }
    }
} else {
    header("location:../loginpage.php");
}
