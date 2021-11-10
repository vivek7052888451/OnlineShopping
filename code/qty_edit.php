<?php
include('../admin/code/connection.php');
$cart_id = $_POST['id'];

$qty = $_POST['qty'];

$select_cartdata = "SELECT * FROM `cart_table` WHERE id='$cart_id'";
$cart_edit_query = mysqli_query($con, $select_cartdata);
$cart_result = mysqli_fetch_array($cart_edit_query, MYSQLI_BOTH);

$rate = $cart_result['offer_price'];
$subtotal = (int)$qty * (int)$rate;



$update_data = "UPDATE `cart_table` SET `quantity`='$qty',`subtotal`='$subtotal' WHERE id='$cart_id'";
if (mysqli_query($con, $update_data)) {
    echo "<script>alert('Update successfull');</script>";
    header("location:../cart.php");
} else {
    echo "<script>alert('Update failed');</script>";
}
