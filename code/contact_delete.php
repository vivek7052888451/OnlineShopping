<?php
include('../admin/code/connection.php');
$contact_delid = $_REQUEST['id'];
// echo $brand_delid;
// die();
$del_contact = "DELETE FROM `contact` WHERE id='$contact_delid'";

if (mysqli_query($con, $del_contact)) {
    // echo "<script>alert('Contact Delete');</script>";

    header("location:../admin/contact_show.php");
} else {
    echo "<script>alert('Contact not Delete');</script>";
}
