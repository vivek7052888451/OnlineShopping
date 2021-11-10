<?php
include('../admin/code/connection.php');

function sendSms($mobile, $msg)
{
    //Your authentication key
    $authKey = "348045AEbJN89p8MdM5fc0c3d7P1";
    //Multiple mobiles numbers separated by comma
    $mobileNumber = '91' . $mobile;
    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "SAURAB";
    $unicode = 1;
    //Your message to send, Add URL encoding here.
    $message = urlencode($msg);
    //Define route
    $route = 4;
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route,
        'unicode' => $unicode
    );
    //API URL
    $url = "http://sms.digicoders.in/api/sendhttp.php";
    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true

    ));
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //get response
    $output = curl_exec($ch);
    //Print error if any
    if (curl_errno($ch)) {
        //return 'error:' . curl_error($ch);
        return false;
    }
    curl_close($ch);
    return true;
}


$mob = $_POST['mob'];
//echo $mob;
$select = "SELECT * FROM `register` WHERE mobile='$mob'";
// $fetch = mysqli_fetch_array(mysqli_query($con, $select), MYSQLI_ASSOC);

if (mysqli_num_rows(mysqli_query($con, $select)) == 1) {
    echo "<script>alert('Mobile Number Match');</script>";
    $otp = rand(1000, 9999);
    $msg = "OTP Verification: " . $otp;
    $up = "update  register set otp='$otp' where mobile = '$mob'";
    mysqli_query($con, $up);
    echo "<script>alert('Send OTP');</script>";
    sendSms($mob, $msg);
    header("location:../OTP_page.php");
    // var_dump(mysqli_fetch_array(mysqli_query($con, $select), MYSQLI_ASSOC));
} else {
    echo "<script>alert(' no match');</script>";
    header("location:../forget_password.php");
}
