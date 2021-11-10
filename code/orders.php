<?php
session_start();
include('../admin/code/connection.php');
if (isset($_POST['order'])) {
    if ($_SESSION["user"]) {
        $userid = $_SESSION["user"];


        $name = $_POST['name'];

        $email = $_POST['email'];

        $mobile = $_POST['mobile'];

        $deleviry = $_POST['mode'];

        $post_code = $_POST['post_code'];

        $apartment = $_POST['apartment'];

        $street = $_POST['street'];

        $city = $_POST['city'];

        $order_id = "OID" . date("dmYhis") . rand(100, 999);

        date_default_timezone_set("Asia/Calcutta");
        $order_time = date("H:i:s");

        $order_date = date("y/m/d");
        $order_status = 'pending';

        $tax = $_POST['tax'];
        $total = $_POST['total'];


        $order_insert = "INSERT INTO `orders`( `user_id`, `order_id`, `name`, `apartment`, `city`, `street`, `email`, `post_code`, `mobile`, `dilivery`, `date`, `time`, `order_status`, `totat_tax`, `total_price`, `onlinepayment_status`) 
        VALUES ('$userid','$order_id','$name','$apartment','$city','$street','$email','$post_code','$mobile','$deleviry','$order_date','$order_time','$order_status','$tax','$total', 'Pending')";
        if (mysqli_query($con, $order_insert)) {


            //echo "<script>alert('Order insert successfull');</script>";

            $sql1 = "update cart_table set order_id='$order_id',status='0' where user_id='$userid' and status='1' ";
            mysqli_query($con, $sql1);


            if ($deleviry == "Cash On Delivery") {
                //Offline Payment
                header("location:../home.php");
            } else {
                //Online Payment
                $_SESSION['userid'] = $userid;
                $_SESSION['orderid'] = $order_id;
                header("location: ../paytm/PaymentProcess.php");
            }
        } else {
            echo "<script>alert('insert Failed');</script>";
        }
    } else {
        header("location:../loginpage.php");
    }
}
