<?php
include('connection.php');
if (isset($_POST['add_cat'])) {
    $cat_name = $_POST['cat_name'];
    // echo $cat_name;
    // echo "<br/>";

    $status = 1;
    // echo $status;
    // echo "<br/>";

    $a = $_FILES['cat_icon']['name'];
    // echo $a;
    // echo "<br/>";

    $aa = $_FILES['cat_icon']['tmp_name'];
    // echo $aa;
    // echo "<br/>";
    $aaa = $_FILES['cat_icon']['size'];
    // echo $aaa;
    // echo "<br/>";
    $aaaa = $_FILES['cat_icon']['type'];
    // echo $aaaa;
    // echo "<br/>";
    $date = date("y/m/d");

    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");
    // echo $date;
    // echo "<br/>";
    $location = "../../uploads/icons/";
    $select = "select * from categary where category_name='$cat_name'";
    $query = mysqli_query($con, $select);
    if (mysqli_num_rows($query) > 0) {
        echo "<script>alert('Category allready insert');</script>";
    } else {
        $cat_insert = "INSERT INTO `categary`(`category_name`, `icon`, `status`, `date`, `time`) VALUES ('$cat_name','$a','$status','$date','$time')";
        if (mysqli_query($con, $cat_insert)) {
            echo "<script>alert('Category insert successfull');</script>";
            move_uploaded_file($aa, $location . $a);
            header("location:../manage_category.php");
        } else {
            echo "<script>alert('Category insert Failed');</script>";
        }
    }
}
