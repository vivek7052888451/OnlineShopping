<?php
include('connection.php');
if (isset($_POST['add_slider'])) {

    $headding = $_POST['headding'];
    $headding2 = $_POST['headding2'];
    $button = $_POST['button'];

    $slider = $_FILES['slider']['name'];

    $tem = $_FILES['slider']['tmp_name'];

    $size = $_FILES['slider']['size'];

    $type = $_FILES['slider']['type'];

    $slider_status = 1;

    $slider_date = date("y/m/d");
    $location = "../../uploads/slider/";

    $select_slider = "SELECT * FROM `slider` WHERE slider='$slider'";
    $slider_query = mysqli_query($con, $select_slider);
    if (mysqli_num_rows($slider_query) > 0) {
        echo "<script>alert('Slider allready insert');</script>";
    } else {
        $slider_insert = "INSERT INTO `slider`(`headding`, `headding2`, `btn`, `slider`, `date`, `status`) VALUES ('$headding','$headding2','$button','$slider','$slider_date','$slider_status')";
        if (mysqli_query($con, $slider_insert)) {
            echo "<script>alert('Slider insert successfull');</script>";
            move_uploaded_file($tem, $location . $slider);
            header("location:../slider.php");
        } else {
            echo "<script>alert('Slider insert Failed');</script>";
        }
    }
}
