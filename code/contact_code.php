<?php
include('../admin/code/connection.php');
if (isset($_POST['add_contact'])) {
    $name = $_POST['name'];
    //echo $name;
    $email = $_POST['email'];
    //echo $email;
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");
    // echo $time;
    $contact_date = date("y/m/d");
    //die();


    $select_contact = "SELECT * FROM `contact` WHERE email='$email'";
    $contact_query = mysqli_query($con, $select_contact);
    if (mysqli_num_rows($contact_query) > 0) {
        echo "<script>alert('Email allready insert');</script>";
    } else {
        $cantact_insert = "INSERT INTO `contact`(`name`, `email`, `subject`, `massege`, `date`, `time`) VALUES ('$name','$email','$subject','$message','$contact_date','$time')";
        if (mysqli_query($con, $cantact_insert)) {
            echo "<script>alert('Contact insert successfull');</script>";

            //header("location:contact_us.php");
        } else {
            echo "<script>alert('Cactact insert Failed');</script>";
        }
    }
}
