<?php
include("connection.php");
$cat_del_id = $_REQUEST['id'];
$del_select = "SELECT * FROM `categary` WHERE id='$cat_del_id'";
$del_query = mysqli_query($con, $del_select);
$result_delete = mysqli_fetch_array($del_query, MYSQLI_BOTH);
$del_loc = "../../uploads/icons/" . $result_delete['icon'];



//echo $cat_del_id;
$del_category = "DELETE FROM `categary` WHERE id='$cat_del_id'";

if (mysqli_query($con, $del_category)) {
    echo "<script>alert('Category Delete');</script>";
    unlink($del_loc);
    header("location:../manage_category.php");
} else {
    echo "<script>alert('Category not Delete');</script>";
}
