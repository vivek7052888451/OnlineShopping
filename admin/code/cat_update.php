<?php
include('connection.php');
$up_loc = "../../uploads/icons/";
$up_id = $_POST['id'];
$up_cat_name = $_POST['up_cat_name'];


$sel_up_cat = "SELECT * FROM `categary` WHERE id='$up_id'";
$up_query = mysqli_query($con, $sel_up_cat);
$up_result = mysqli_fetch_array($up_query, MYSQLI_BOTH);


if (empty($_FILES['up_cat_icon']['name'])) {
    $up_cat_icon = $up_result['icon'];
} else {
    $loc_up = "../../uploads/icons/" . $up_result['icon'];
    $up_cat_icon = $_FILES['up_cat_icon']['name'];
    $up_cat_tem_icon = $_FILES['up_cat_icon']['tmp_name'];
    unlink($loc_up);
    move_uploaded_file($up_cat_tem_icon, $up_loc . $up_cat_icon);
}

// echo $loc_up;
$update_category = "UPDATE `categary` SET category_name='$up_cat_name',icon='$up_cat_icon' WHERE id='$up_id'";
if (mysqli_query($con, $update_category)) {

    echo "<script>alert('Update Category');</script>";
    header("location:../manage_category.php");
} else {
    echo "<script>alert('Update Failed Category');</script>";
}
