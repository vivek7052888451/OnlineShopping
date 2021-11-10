<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

include('../admin/code/connection.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included

require_once("config_paytm.php");
require_once("encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);

if ($isValidChecksum == "TRUE") {

	$orderid = $_POST['ORDERID'];
	$txn_msg = $_POST['RESPMSG'];
	$txnid = $_POST['TXNID'];
	$txnid = $_POST['TXNID'];

	$resdata = serialize($_POST);

	if ($_POST['STATUS'] == "TXN_SUCCESS") {

		$sql = "update orders set order_status='confirmed', onlinepayment_status='Success' where order_id='$orderid'";
		mysqli_query($con, $sql);

		$update_payment = "update payments set payment_response='$resdata',txn_status='Success' , txn_id='$txnid', txn_message='$txn_msg' where order_id='$orderid'";
		mysqli_query($con, $update_payment);

		header("Location: ../home.php?status=order_confirmed&payment=success");
	} else {

		$sql = "update orders set order_status='cancelled', onlinepayment_status='Failed' where order_id='$orderid'";
		mysqli_query($con, $sql);

		$update_payment = "update payments set payment_response='$resdata', txn_status='Failed', txn_id='$txnid', txn_message='$txn_msg' where order_id='$orderid'";
		mysqli_query($con, $update_payment);
		header("Location: ../home.php?status=order_failed&payment=failed");
	}

	// if ($_POST["STATUS"] == "TXN_SUCCESS") {

	// 	$orderid=$_POST["ORDERID"];
	// 	$paymentid=$_POST["TXNID"];
	// 	$amount=$_POST["TXNAMOUNT"];
	// 	$status=$_POST["STATUS"];

	// 	$sql1="update payment set txnstatus='$status', txnid='$paymentid', amount='$amount' where orderid='$orderid' ";
	// 	mysqli_query($conn,$sql1);

	// 	echo "Status = ".$status;
	// 	echo "<br/>";
	// 	echo "TXN ID = ".$paymentid;
	// 	echo "<br/>";
	// 	echo "ORDER ID = ".$orderid;
	// 	echo "<br/>";
	// 	echo "Amount = ".$amount;

	// 	echo "<hr/><a href='order.php'>Click here for New Order</a>";



	// }
	// else {
	//     //tampered or failed
	//     echo "<h2>Payment Failed, Please try again. ";
	// }
} else {
	echo "Something went wrong, Please try again later, Checksum mismatched. ";
	//Process transaction as suspicious.
}
