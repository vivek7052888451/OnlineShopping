<?php
include('connection.php');
if (isset($_POST['add_subcat'])) {
    $category_name = $_POST['category_name'];

    $sub_category_name = $_POST['sub_category_name'];
    $sub_status = 1;

    $sub_cat_icon = $_FILES['sub_cat_icon']['name'];

    $temp_sub_cat = $_FILES['sub_cat_icon']['tmp_name'];

    $sub_size = $_FILES['sub_cat_icon']['size'];

    $sub_type = $_FILES['sub_cat_icon']['type'];

    $sub_date = date("y/m/d");

    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");

    $loc = "../../uploads/icons/";

    $select_sub = "select * from sub_category where sub_categary='$sub_category_name'";
    $sub_query = mysqli_query($con, $select_sub);
    if (mysqli_num_rows($sub_query) > 0) {
        echo "<script>alert('Sub-Category allready insert ');</script>";
    } else {
        $sub_cat_insert = "INSERT INTO `sub_category`(  `categary_name`, `sub_categary`, `sub_icon`, `sub_status`, `sub_date`, `time`) VALUES ('$category_name','$sub_category_name','$sub_cat_icon','$sub_status','$sub_date','$time')";
        if (mysqli_query($con, $sub_cat_insert)) {
            // echo "<script>alert('Sub-Category insert successfull');</script>";
            move_uploaded_file($temp_sub_cat, $loc . $sub_cat_icon);
            header("location:../manage_subcategory.php");
        } else {
            echo "<script>alert('Sub-Category insert Failed');</script>";
        }
    }
}
