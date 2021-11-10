<?php
include('connection.php');
$slider_delid = $_REQUEST['id'];
//echo $brand_delid;
//die();
$select_del_slider = "SELECT * FROM `slider` WHERE id='$slider_delid'";
$del_slider_query = mysqli_query($con, $select_del_slider);
$result_slider_delete = mysqli_fetch_array($del_slider_query, MYSQLI_BOTH);
$del_slider_loc = "../../uploads/slider/" . $result_slider_delete['slider'];



// //echo $cat_del_id;
$del_slider = "DELETE FROM `slider` WHERE id='$slider_delid'";

if (mysqli_query($con, $del_slider)) {
    echo "<script>alert('Slider Delete');</script>";
    unlink($del_slider_loc);
    header("location:../slider.php");
} else {
    echo "<script>alert('Slider not Delete');</script>";
}
