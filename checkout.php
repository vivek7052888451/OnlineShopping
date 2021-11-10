<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
    include('headerlink.php');
    ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <?php
        include('header.php');
        ?>
        <?php

        if ($_SESSION["user"]) {
        } else {
            header("localhost:../loginpage.php");
        }
        ?>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->

            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images.png) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="home.php">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <form action="code/orders.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="checkout__inner">
                                <div class="accordion-list">
                                    <div class="accordion">
                                        <div class="accordion__title">
                                            Address Information
                                        </div>
                                        <?php
                                        $user_id = $_SESSION["user"];
                                        $select_userdata = "SELECT * FROM `register` where id='$user_id'";
                                        $query_user = mysqli_query($con, $select_userdata);
                                        $user_data_fetch = mysqli_fetch_array($query_user, MYSQLI_BOTH);
                                        ?>
                                        <div class="accordion__body">
                                            <div class="bilinfo">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="name" readonly value="<?= $user_data_fetch['name']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="street" placeholder="Street Address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="apartment" placeholder="Apartment/Block/House (optional)" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="text" name="city" placeholder="City/State" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="text" required name="post_code" placeholder="Post code/ zip">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="email" name="email" readonly value="<?= $user_data_fetch['email']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <input type="text" name="mobile" readonly value="<?= $user_data_fetch['mobile']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="order-details">
                                <h5 class="order-details__title">Your Order</h5>
                                <div class="order-details__item">
                                    <?php
                                    $select_cart_product = "SELECT * FROM `cart_table` where user_id='$user_id' and status='1' ";
                                    $select_cart_query = mysqli_query($con, $select_cart_product);
                                    $totalvalue = 0;
                                    $total_quantity = 0;
                                    $finaltax = 0;

                                    while ($cartdata = mysqli_fetch_array($select_cart_query, MYSQLI_BOTH)) {
                                        $product_id = $cartdata['product_id'];

                                        $total_quantity = $cartdata['quantity'] + $total_quantity;
                                        // echo $total_quantity;

                                        $totalvalue = $cartdata['subtotal'] + $totalvalue;
                                    ?>
                                        <div class="single-item">
                                            <?php
                                            $sel_product_data = "SELECT * FROM `product` WHERE id='$product_id'";
                                            $product_query = mysqli_query($con, $sel_product_data);
                                            $fetch_product_data = mysqli_fetch_array($product_query, MYSQLI_BOTH);

                                            // $product_price = $fetch_product_data['product_mrp'];
                                            // echo $product_price;
                                            // die();

                                            $product_tax = $fetch_product_data['product_tax'];

                                            $total_tax = ($product_tax * $fetch_product_data['product_mrp']) / 100;

                                            $finaltax = $finaltax + $total_tax;


                                            ?>
                                            <div class="single-item__thumb">

                                                <img src="uploads/products/<?= $fetch_product_data['product_photo']; ?>" alt="ordered item">
                                            </div>
                                            <div class="single-item__content">
                                                <a href="#"><?= $fetch_product_data['produnt_shortname']; ?> (<?= $cartdata['offer_price']; ?>x<?= $cartdata['quantity']; ?>)</a>
                                                <span class="price"><?= $cartdata['subtotal']; ?></span>
                                            </div>
                                            <div class="single-item__remove">
                                                <a href="code/cart_delete.php?ids=<?= $cartdata['id']; ?>"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="order-details__count">
                                    <div class="order-details__count__single">
                                        <h5>sub total</h5>
                                        <span class="price"></span>
                                    </div>
                                    <div class="order-details__count__single">
                                        <h5>Tax</h5>
                                        <span class="price"><?= $finaltax ?> Rs.</span>
                                        <input type="hidden" value="<?= $finaltax ?>" name="tax" />

                                    </div>
                                </div>
                                <div class="ordre-details__total">
                                    <h5>Order total</h5>
                                    <span class="price"><?= $totalvalue ?> Rs.</span>
                                    <input type="hidden" value="<?= $totalvalue ?>" name="total" />
                                </div>

                            </div>

                            <div class="custom-control custom-radio">
                                <br>
                                <input type="radio" id="customRadio1" value="Cash On Delivery" name="mode" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio1">Cash On Delivery</label>
                                <br>
                                <input type="radio" id="customRadio2" name="mode" value="Online" class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadio2">Online (UPI/Credit Card/Debit Card/NetBanking)</label>
                            </div>
                            <button class="fr__btn" type="submit" name="order">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <?php
        include('footer.php');
        ?>
        <!-- End Footer Style -->
    </div>
    <?php
    include('footerlink.php');
    ?>

</body>

</html>