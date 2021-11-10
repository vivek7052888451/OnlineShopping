<?php
include('connection.php');
$sub_cat_delid = $_REQUEST['id'];
//echo $sub_cat_delid;
$select_del_sub = "SELECT * FROM `sub_category` WHERE id='$sub_cat_delid'";
$del_sub_query = mysqli_query($con, $select_del_sub);
$result_sub_delete = mysqli_fetch_array($del_sub_query, MYSQLI_BOTH);
$del_sub_loc = "../../uploads/icons/" . $result_sub_delete['sub_icon'];



//echo $cat_del_id;
$del_sub_category = "DELETE FROM `sub_category` WHERE id='$sub_cat_delid'";

if (mysqli_query($con, $del_sub_category)) {
    echo "<script>alert('Sub-Category Delete');</script>";
    unlink($del_sub_loc);
    header("location:../manage_subcategory.php");
} else {
    echo "<script>alert('sub-Category not Delete');</script>";
}
