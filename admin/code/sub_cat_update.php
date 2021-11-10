<?php
include('connection.php');
$up_subloc = "../../uploads/icons/";
$up_sub_id = $_POST['id'];
$up_subcat_name = $_POST['up_subcat_name'];


$sel_up_subcat = "SELECT * FROM `sub_category` WHERE id='$up_sub_id'";
$up_subquery = mysqli_query($con, $sel_up_subcat);
$up_result = mysqli_fetch_array($up_subquery, MYSQLI_BOTH);

if (empty($_FILES['up_subcat_icon']['name'])) {
    $up_subcat_icon = $up_result['sub_icon'];
} else {
    $up_subcat_icon = $_FILES['up_subcat_icon']['name'];
    $up_subcat_tem_icon = $_FILES['up_subcat_icon']['tmp_name'];
    $sub_loc_up = "../../uploads/icons/" . $up_result['icon'];
    unlink($sub_loc_up);
    move_uploaded_file($up_subcat_tem_icon, $up_subloc . $up_subcat_icon);
}

// echo $loc_up;
$update_subcategory = "UPDATE `sub_category` SET sub_categary='$up_subcat_name',sub_icon='$up_subcat_icon' WHERE id='$up_sub_id'";
if (mysqli_query($con, $update_subcategory)) {

    echo "<script>alert('Update Sub-Category');</script>";
    header("location:../manage_subcategory.php");
} else {
    echo "<script>alert('Update Failed Sub-Category');</script>";
}
