<?php
include('connection.php');
$brand_delid = $_REQUEST['id'];
//echo $brand_delid;
$select_del_brand = "SELECT * FROM `brand` WHERE id='$brand_delid'";
$del_brand_query = mysqli_query($con, $select_del_brand);
$result_brand_delete = mysqli_fetch_array($del_brand_query, MYSQLI_BOTH);
$del_brand_loc = "../../uploads/icons/" . $result_brand_delete['brand_icon'];



// //echo $cat_del_id;
$del_brand = "DELETE FROM `brand` WHERE id='$brand_delid'";

if (mysqli_query($con, $del_brand)) {
    echo "<script>alert('Brand Delete');</script>";
    unlink($del_brand_loc);
    header("location:../manage_brand.php");
} else {
    echo "<script>alert('Brand not Delete');</script>";
}
