<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
    include("headerlink.php");
    ?>
</head>

<body>

    <div class="wrapper">
        <!-- Start Header Style -->
        <?php
        include("header.php");
        ?>
        <?php
        $user_id = $_SESSION['user'];


        $select_wishlist = "SELECT * FROM `wishlist` where user_id='$user_id'";
        $wish_query = mysqli_query($con, $select_wishlist);


        ?>

        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('images.png') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="home.php">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">Wishlist</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Remove</span></th>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>

                                                <th class="product-add-to-cart"><span class="nobr">Add To Cart</span></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        while ($wish_fetch = mysqli_fetch_array($wish_query, MYSQLI_BOTH)) {
                                            $productid = $wish_fetch['product_id'];
                                            $sel_product = "SELECT * FROM `product` WHERE id='$productid'";
                                            $query_product = mysqli_query($con, $sel_product);
                                            $fetch_product = mysqli_fetch_array($query_product, MYSQLI_BOTH);



                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td class="product-remove"><a href="code/wishlist_delete.php?id=<?= $fetch_product['id']; ?>">×</a></td>
                                                    <td class="product-thumbnail"><a href="#"><img src="uploads/products/<?= $fetch_product['product_photo']; ?>" alt="" /></a></td>
                                                    <td class="product-name"><a href="#"></a><?= $fetch_product['produnt_shortname']; ?></td>
                                                    <td class="product-price"><span class="amount"><?= $fetch_product['product_offer']; ?> Rs.</span></td>

                                                    <td class="product-add-to-cart"><a href="code/cart_code.php?id=<?= $fetch_product['id']; ?>"> Add to Cart</a></td>
                                                </tr>

                                            <?php
                                        }
                                            ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">

                                                    </td>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">

                            <ul class="brand__list owl-carousel clearfix">
                                <?php
                                $sel_brand = "SELECT * FROM `brand`";
                                $brand_query = mysqli_query($con, $sel_brand);
                                while ($brand_fetch = mysqli_fetch_array($brand_query, MYSQLI_BOTH)) {
                                ?>
                                    <li><a href="#"><img src="uploads/icons/<?= $brand_fetch['brand_icon']; ?>"></a></li>
                                <?php
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
        <?php
        include("footer.php");
        ?>
        <!-- End Footer Style -->
    </div>
    <?php
    include("footerlink.php");
    ?>

</body>

</html>