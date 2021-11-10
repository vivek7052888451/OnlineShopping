<?php
include('connection.php');
if (isset($_POST['add_product'])) {
    $product_short_name = $_POST['product_short_name'];

    $product_title = $_POST['product_title'];

    $product_cat_name = $_POST['product_cat_name'];

    $product_sub_cat_name = $_POST['product_sub_cat_name'];

    $product_brand = $_POST['product_brand'];

    $mrp = $_POST['mrp'];

    $tax = $_POST['tax'];

    $discount = $_POST['discount'];

    $price = (int)$_POST['offer_price'];

    $offer_price = round($price, 2);

    $discription = $_POST['discription'];

    $product_photo = $_FILES['product_icon']['name'];
    $product_tem = $_FILES['product_icon']['tmp_name'];

    $product_photo2 = $_FILES['product_icon2']['name'];
    $product_tem2 = $_FILES['product_icon2']['tmp_name'];

    $product_photo3 = $_FILES['product_icon3']['name'];
    $product_tem3 = $_FILES['product_icon3']['tmp_name'];

    $product_photo4 = $_FILES['product_icon4']['name'];
    $product_tem4 = $_FILES['product_icon4']['tmp_name'];

    $product_status = 1;

    $product_date = date("y/m/d");

    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");

    // die();
    $product_loc = "../../uploads/products/";

    $product_insert = "INSERT INTO `product`(`produnt_shortname`, `product_title`, `product_photo`, `product_photo2`, `product_photo3`, `product_photo4`, `product_category`, `produnt_sub_category`, `produnt_brand`, `product_mrp`, `product_tax`, `product_discount`, `product_offer`, `product_discription`, `product_date`, `status`, `time`)
     VALUES ('$product_short_name','$product_title','$product_photo','$product_photo2','$product_photo3','$product_photo4','$product_cat_name','$product_sub_cat_name','$product_brand','$mrp','$tax','$discount','$offer_price','$discription','$product_date','$product_status','$time')";
    if (mysqli_query($con, $product_insert)) {
        echo "<script>alert('Product insert successfull');</script>";
        move_uploaded_file($product_tem, $product_loc . $product_photo);
        move_uploaded_file($product_tem2, $product_loc . $product_photo2);
        move_uploaded_file($product_tem3, $product_loc . $product_photo3);
        move_uploaded_file($product_tem4, $product_loc . $product_photo4);

        header("location:../manage_product.php");
    } else {
        echo "<script>alert('Product insert Failed');</script>";
    }
}
