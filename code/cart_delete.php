<?php
include('../admin/code/connection.php');
$cart_delid = $_REQUEST['ids'];

// echo $product_delid;
// die();
// $cart_select = "SELECT * FROM `cart_table` WHERE id='$cart_delid'";
// $del_cart_query = mysqli_query($con, $cart_select);
//$result_cart_delete = mysqli_fetch_array($del_product_query, MYSQLI_BOTH);
//$del_product_loc = "../../uploads/products/" . $result_product_delete['product_photo'];
// //echo $cat_del_id;

$del_cart = "DELETE FROM `cart_table` WHERE id='$cart_delid'";

if (mysqli_query($con, $del_cart)) {
    //echo "<script>alert('Product Delete');</script>";
    // unlink($del_product_loc);
    header("location:../cart.php");
} else {
    echo "<script>alert('Cart not Delete');</script>";
}
