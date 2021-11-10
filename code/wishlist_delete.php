<?php
include('../admin/code/connection.php');
$wishlist_delid = $_REQUEST['id'];
// echo $wishlist_delid;
// die();

$del_wishlist = "DELETE FROM `wishlist` WHERE product_id='$wishlist_delid'";

if (mysqli_query($con, $del_wishlist)) {
    echo "<script>alert('Product Delete');</script>";
    // unlink($del_product_loc);
    // header("location:../wishlist.php");
} else {
    echo "<script>alert('Cart not Delete');</script>";
}
