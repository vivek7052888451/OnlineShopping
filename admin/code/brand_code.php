<?php
include('connection.php');
if (isset($_POST['add_brand'])) {
    $brand_name = $_POST['brand_name'];

    $brand_icon = $_FILES['brand_icon']['name'];

    $brand_tem = $_FILES['brand_icon']['tmp_name'];

    $brand_size = $_FILES['brand_icon']['size'];

    $brand_type = $_FILES['brand_icon']['type'];

    $brand_status = 1;

    $brand_date = date("y/m/d");

    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");

    $location = "../../uploads/icons/";

    $select_brand = "select * from brand where brand_name='$brand_name'";
    $brand_query = mysqli_query($con, $select_brand);
    if (mysqli_num_rows($brand_query) > 0) {
        echo "<script>alert('Brand allready insert');</script>";
    } else {
        $brand_insert = "INSERT INTO `brand`(`brand_name`, `brand_icon`, `status`, `date`, `time`) VALUES ('$brand_name','$brand_icon','$brand_status','$brand_date','$time')";
        if (mysqli_query($con, $brand_insert)) {
            // echo "<script>alert('Brand insert successfull');</script>";
            move_uploaded_file($brand_tem, $location . $brand_icon);
            header("location:../manage_brand.php");
        } else {
            echo "<script>alert('Brand insert Failed');</script>";
        }
    }
}
