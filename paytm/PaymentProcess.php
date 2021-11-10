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

$checkSum = "";
$paramList = array();

$custid = $_SESSION["userid"];
$ORDER_ID = $_SESSION['orderid'];
$sql1 = "select * from register where id='$custid'";
$res1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($res1, MYSQLI_BOTH);

$query = "select * from orders where order_id='$ORDER_ID'";
$fire = mysqli_query($con, $query);
$fetch = mysqli_fetch_array($fire, MYSQLI_BOTH);


$Mobile_Number = $row1["mobile"];
$Email_ID = $row1["email"];
$CUST_ID = $custid;
$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID = "WEB";
$TXN_AMOUNT = $fetch["total_price"];




// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = "http://localhost/OnlineShoping/paytm/PaymentResponse.php";

$paramList["MSISDN"] = $Mobile_Number; //Mobile number of customer
$paramList["EMAIL"] = $Email_ID; //Email ID of customer

/*
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //
*/

$date = date("d-m-Y");
$time = date("h:i:sa");

$sql2 = "INSERT INTO `payments`(`order_id`, `userid`, `amount`, `txn_status`, `date`, `time`) VALUES ('$ORDER_ID', '$CUST_ID', '$TXN_AMOUNT', 'Pending', '$date', '$time')";
mysqli_query($con, $sql2);

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);

?>
<html>

<head>
	<title>Payment Process</title>
</head>

<body>
	<center>
		<h1>Please do not refresh this page...</h1>
	</center>

	<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="form1">
		<table>
			<tbody>
				<?php
				foreach ($paramList as $name => $value) {
					echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
				}
				?>
				<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.form1.submit();
		</script>
	</form>

</body>

</html>
<?php

?>