<?php
include('connection.php');
$up_brand_loc = "../../uploads/icons/";
$up_brand_id = $_POST['id'];
$up_brandname = $_POST['up_brandname'];



$sel_brand = "SELECT * FROM `brand` WHERE id='$up_brand_id'";
$up_brand_query = mysqli_query($con, $sel_brand);
$up_brand_result = mysqli_fetch_array($up_brand_query, MYSQLI_BOTH);

if (empty($_FILES['up_brand_icon']['name'])) {
    $up_brand_icon = $up_brand_result['brand_icon'];
} else {
    $up_brand_loca = "../../uploads/icons/" . $up_brand_result['brand_icon'];
    $up_brand_icon = $_FILES['up_brand_icon']['name'];
    $up_brand_tem_icon = $_FILES['up_brand_icon']['tmp_name'];
    move_uploaded_file($up_brand_tem_icon, $up_brand_loc . $up_brand_icon);
    unlink($up_brand_loca);
}

// echo $loc_up;
$update_brand = "UPDATE `brand` SET brand_name='$up_brandname',brand_icon='$up_brand_icon' WHERE id='$up_brand_id'";
if (mysqli_query($con, $update_brand)) {


    echo "<script>alert('Brand Update');</script>";
    header("location:../manage_brand.php");
} else {
    echo "<script>alert('Update Failed Brand');</script>";
}
