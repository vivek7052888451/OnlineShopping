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
        <?php include('header.php'); ?>
        <!-- End Header Area -->


        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('images.png') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="home.php">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <?php
                        $user_id = $_SESSION["user"];
                        //echo $user_id;


                        $select_cart_product = "SELECT * FROM `cart_table` where user_id='$user_id' and status='1' ";
                        $select_cart_query = mysqli_query($con, $select_cart_product);

                        ?>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">products</th>
                                        <th class="product-name">name of products</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($cartdata = mysqli_fetch_array($select_cart_query, MYSQLI_BOTH)) {
                                        $product_id = $cartdata['product_id'];
                                        // echo $product_id;
                                    ?>

                                        <tr>
                                            <?php
                                            $sel_product_data = "SELECT * FROM `product` WHERE id='$product_id'";
                                            $product_query = mysqli_query($con, $sel_product_data);
                                            $fetch_product_data = mysqli_fetch_array($product_query, MYSQLI_BOTH);

                                            ?>
                                            <td class="product-thumbnail"><a href="#"><img src="uploads/products/<?= $fetch_product_data['product_photo']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?= $fetch_product_data['produnt_shortname']; ?></a>

                                            </td>

                                            <td class="product-price"><span class="amount"><?= $cartdata['offer_price']; ?></span></td>
                                            <td class="product-quantity">

                                                <form method="post" action="code/qty_edit.php" name="form<?= $cartdata['id']; ?>">

                                                    <input type="hidden" name="id" value="<?= $cartdata['id'] ?>" />
                                                    <!-- <button class="btn btn-info" type="submit"><i class="fa fa-minus"></i></button> -->
                                                    <input type="number" name="qty" value="<?= $cartdata['quantity'] ?>" />
                                                    <button class="btn btn-primary" type="submit"> Update </i></button>

                                                </form>

                                            </td>
                                            <td class="product-subtotal"><?= $cartdata['subtotal']; ?></td>
                                            <td class="product-remove"><a href="code/cart_delete.php?ids=<?= $cartdata['id']; ?>"><i class="icon-trash icons"></i></a></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="home.php">Continue Shopping</a>
                                    </div>
                                    <div class="buttons-cart checkout--btn">

                                        <a href="checkout.php">checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
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