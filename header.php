<?php include('admin/code/connection.php');
session_start();
$cat_select = "SELECT * FROM `categary`";
$cat_que = mysqli_query($con, $cat_select);
$cat_array = array();
while ($row = mysqli_fetch_array($cat_que, MYSQLI_BOTH)) {
    $cat_array[] = $row;
}
?>

<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a href="home.php"><img src="assets/images/logo/4.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="home.php">Home</a></li>
                                <?php
                                foreach ($cat_array as $list) {
                                ?>
                                    <li><a href="product.php?id=<?= $list['id']; ?>"><?= $list['category_name']; ?></a></li>
                                <?php
                                }
                                ?>

                                <li><a href="contact_us.php">contact</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="contact_us.php">contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <?php
                            if (isset($_SESSION["user"])) {
                            ?>
                                <div class='col-md-3 col-lg-2 col-sm-4 col-xs-4'>
                                    <div class='header__right'>
                                        <div class='header__account'>
                                            <a href='#' data-toggle='dropdown' class='dropdown-toggle'><i class='icon-user icons'></i>
                                                <ul class='dropdown-menu'>
                                                    <li><a href='user_profile.php'>Profile</a></li>
                                                    <li><a href='wishlist.php'>Wishlist</a></li>
                                                    <li><a href='my_order.php'>My Order</a></li>
                                                    <li><a href='code/user_logout.php'>Logout</a></li>
                                                </ul>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class='header__account'>
                                    <a href='loginpage.php'>Register/Login</i></a>
                                </div>
                            <?php
                            }
                            ?>
                            <div class='htc__shopping__cart'>
                                <?php

                                if (isset($_SESSION["user"])) {
                                ?>
                                    <a href='cart.php'><i class='icon-handbag icons'></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href='loginpage.php'><i class='icon-handbag icons'></i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>