<?php
include('connection.php');
$up_slider_loc = "../../uploads/slider/";
$up_slider_id = $_POST['id'];
$up_headding = $_POST['up_headding'];
$up_headding2 = $_POST['up_headding2'];
$up_button = $_POST['up_button'];



$sel_slider = "SELECT * FROM `slider` WHERE id='$up_slider_id'";
$up_slider_query = mysqli_query($con, $sel_slider);
$up_slider_result = mysqli_fetch_array($up_slider_query, MYSQLI_BOTH);

if (empty($_FILES['up_slider_icon']['name'])) {
    $up_slider_icon = $up_slider_result['slider'];
} else {
    $up_slider_loca = "../../uploads/slider/" . $up_slider_result['slider'];
    $up_slider_icon = $_FILES['up_slider_icon']['name'];
    $up_slider_tem = $_FILES['up_slider_icon']['tmp_name'];
    unlink($up_slider_loca);
    move_uploaded_file($up_slider_tem, $up_slider_loc . $up_slider_icon);
}

// echo $loc_up;
$update_slider = "UPDATE `slider` SET `headding`='$up_headding',`headding2`='$up_headding2',`btn`='$up_button',`slider`='$up_slider_icon' WHERE id='$up_slider_id'";
if (mysqli_query($con, $update_slider)) {

    echo "<script>alert('Slider Update');</script>";
    header("location:../slider.php");
} else {
    echo "<script>alert('Update Failed Slider');</script>";
}
