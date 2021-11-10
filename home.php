<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('headerlink.php');
    ?>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <?php include('header.php'); ?>
        <!-- End Header Area -->

        <?php
        $sel_slider = "select* from slider";
        $select_query = mysqli_query($con, $sel_slider);

        ?>
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <?php
                while ($slider_result = mysqli_fetch_array($select_query, MYSQLI_BOTH)) {
                ?>
                    <div class="single__slide animation__style01 slider__fixed--height">
                        <div class="container">
                            <div class="row align-items__center">
                                <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                    <div class="slide">
                                        <div class="slider__inner">
                                            <h2><?= $slider_result['headding']; ?></h2>
                                            <h1><?= $slider_result['headding2']; ?></h1>
                                            <div class="cr__btn">
                                                <a href="cart.php"><?= $slider_result['btn']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                    <div class="slide__thumb">
                                        <img src="uploads/slider/<?= $slider_result['slider']; ?>" alt="slider images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                            $sel_product = "SELECT * FROM `product`";
                            $query_product = mysqli_query($con, $sel_product);
                            while ($product_data = mysqli_fetch_array($query_product, MYSQLI_BOTH)) {
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product-details.php?id=<?= $product_data['id']; ?>">
                                                <img src="uploads/products/<?= $product_data['product_photo']; ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li><a href="code/wishlist_code.php?id=<?= $product_data['id']; ?>"><i class="icon-heart icons"></i></a></li>
                                                <li><a href="code/cart_code.php?id=<?= $product_data['id']; ?>"><i class="icon-handbag icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="#"><?= $product_data['product_title']; ?> </a></h4>
                                            <ul class="fr__pro__prize">
                                                <li class="old__prize"><?= $product_data['product_mrp']; ?>Rs.</li>
                                                <li><?= $product_data['product_offer']; ?>Rs.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                        <?php
                        $sel_product = "SELECT * FROM `product`";
                        $query_product = mysqli_query($con, $sel_product);
                        while ($product_data = mysqli_fetch_array($query_product, MYSQLI_BOTH)) {
                        ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?= $product_data['id']; ?>">
                                            <img src="uploads/products/<?= $product_data['product_photo']; ?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="code/wishlist_code.php?id=<?= $product_data['id']; ?>"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="code/cart_code.php?id=<?= $product_data['id']; ?>"><i class="icon-handbag icons"></i></a></li>


                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html"><?= $product_data['product_title']; ?> </a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?= $product_data['product_mrp']; ?>Rs.</li>
                                            <li><?= $product_data['product_offer']; ?>Rs.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- End Single Category -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- Start Footer Area -->

        <?php
        include('footer.php');
        ?>

        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <?php
    include('footerlink.php');
    ?>

</body>

</html>