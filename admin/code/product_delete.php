<?php
include('connection.php');
$product_delid = $_REQUEST['id'];
//echo $product_delid;
//die();
$select_del_product = "SELECT * FROM `product` WHERE id='$product_delid'";
$del_product_query = mysqli_query($con, $select_del_product);
$result_product_delete = mysqli_fetch_array($del_product_query, MYSQLI_BOTH);
$del_product_loc = "../../uploads/products/" . $result_product_delete['product_photo'];



// //echo $cat_del_id;
$del_product = "DELETE FROM `product` WHERE id='$product_delid'";

if (mysqli_query($con, $del_product)) {
    echo "<script>alert('Product Delete');</script>";
    unlink($del_product_loc);
    header("location:../manage_product.php");
} else {
    echo "<script>alert('Product not Delete');</script>";
}
