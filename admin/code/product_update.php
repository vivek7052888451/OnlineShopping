<?php
include('connection.php');
$up_product_loc = "../../uploads/products/";
$up_product_id = $_POST['id'];
$up_product_name = $_POST['up_product_name'];
$up_title_name = $_POST['up_title_name'];
$up_mrp = $_POST['up_mrp'];

$up_tax = $_POST['up_tax'];

$up_discount = $_POST['up_discount'];

$price = $_POST['up_offer'];

$up_offer = round($price, 2);


$up_discription = $_POST['up_discription'];




$sel_product = "SELECT * FROM `product` WHERE id='$up_product_id'";
$up_product_query = mysqli_query($con, $sel_product);
$up_product_result = mysqli_fetch_array($up_product_query, MYSQLI_BOTH);

if (empty($_FILES['up_product']['name'] or $_FILES['up_product2']['name'] or $_FILES['up_product3']['name'] or $_FILES['up_product4']['name'])) {
    $up_product = $up_product_result['product_photo'];
    $up_product2 = $up_product_result['product_photo2'];
    $up_product3 = $up_product_result['product_photo3'];
    $up_product4 = $up_product_result['product_photo4'];
} else {
    $up_product = $_FILES['up_product']['name'];
    $up_product_tmp = $_FILES['up_product']['tmp_name'];

    $up_product2 = $_FILES['up_product2']['name'];
    $up_product_tmp2 = $_FILES['up_product2']['tmp_name'];

    $up_product3 = $_FILES['up_product3']['name'];
    $up_product_tmp3 = $_FILES['up_product3']['tmp_name'];

    $up_product4 = $_FILES['up_product4']['name'];
    $up_product_tmp4 = $_FILES['up_product4']['tmp_name'];

    $loc_product_up = "../../uploads/products/" . $up_product_result['product_photo'];
    $loc_product_up2 = "../../uploads/products/" . $up_product_result['product_photo2'];
    $loc_product_up3 = "../../uploads/products/" . $up_product_result['product_photo3'];
    $loc_product_up4 = "../../uploads/products/" . $up_product_result['product_photo4'];

    unlink($loc_product_up);
    move_uploaded_file($up_product_tmp, $up_product_loc . $up_product);

    unlink($loc_product_up2);
    move_uploaded_file($up_product_tmp2, $up_product_loc . $up_product2);

    unlink($loc_product_up3);
    move_uploaded_file($up_product_tmp3, $up_product_loc . $up_product3);

    unlink($loc_product_up4);
    move_uploaded_file($up_product_tmp4, $up_product_loc . $up_product4);
}

// echo $loc_up;
$update_product = "UPDATE `product` SET produnt_shortname='$up_product_name',product_title='$up_title_name',product_photo='$up_product',product_photo2='$up_product2',product_photo3='$up_product3',product_photo4='$up_product4',product_mrp='$up_mrp',product_tax='$up_tax',product_discount='$up_discount',product_offer='$up_offer',product_discription='$up_discription' WHERE id='$up_product_id'";
if (mysqli_query($con, $update_product)) {

    echo "<script>alert('Update product');</script>";
    header("location:../manage_product.php");
} else {
    echo "<script>alert('Update Failed product');</script>";
}
