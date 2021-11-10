<!doctype html>
<html class="no-js" lang="zxx">

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
        $productid = $_REQUEST['id'];
        //echo $productid;
        $sel_pro_cat = "SELECT * FROM `product` WHERE id='$productid'";
        $sel_pro_cat_query = mysqli_query($con, $sel_pro_cat);
        $pro_result = mysqli_fetch_array($sel_pro_cat_query, MYSQLI_BOTH);
        ?>
        <!-- End Header Area -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->

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

                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">ean shirt</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="uploads/products/<?= $pro_result['product_photo']; ?>" alt="full-image">
                                        </div>
                                    </div>


                                </div>
                                <!-- End Product Big Images -->

                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?= $pro_result['produnt_shortname']; ?></h2>
                                <ul class="pro__prize">
                                    <li class="old__prize"><?= $pro_result['product_mrp']; ?> Rs.</li>

                                    <li><?= $pro_result['product_offer']; ?> Rs.</li>
                                </ul>
                                <p class="pro__info">Discription</p>
                                <p class="pro__info"><?= $pro_result['product_discription']; ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
                                    <div class="sin__desc">
                                        <p><span>quantity:</span><select name="qty" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                            </select></p>
                                    </div>
                                    <br />
                                    <div class="fr__list__btn ">
                                        <a class="fr__btn" href="code/cart_code.php?id=<?= $pro_result['id']; ?>">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht__pro__details__content">
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner">
                                <p> <?= $pro_result['product_discription']; ?></p>

                            </div>
                        </div>
                        <!-- End Single Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Description -->
    <!-- Start Product Area -->
    <section class="htc__product__area--2 pb--100 product-details-res">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">New Arrivals</h2>
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
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="product-details.php?id=<?= $product_data['id']; ?>">
                                        <img src="uploads/products/<?= $product_data['product_photo']; ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="code/wishlist_code.php?id=<?= $product_data['id']; ?>"><i class="icon-heart icons"></i></a></li>
                                        <li><a href="product-details.php?id=<?= $product_data['id']; ?>"><i class="icon-handbag icons"></i></a></li>


                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="product-details.php?id=<?= $product_data['id']; ?>"><?= $product_data['produnt_shortname']; ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize"><?= $product_data['product_mrp']; ?> Rs.</li>
                                        <li><?= $product_data['product_offer']; ?> Rs.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- End Single Product -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
    <!-- End Banner Area -->
    <!-- Start Footer Area -->
    <?php
    include('footer.php');
    ?>
    <!-- End Footer Style -->
    </div>
    <?php
    include('headerlink.php');
    ?>

</body>

</html>