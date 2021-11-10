<?php
//session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('headerlink.php');
    ?>

</head>

<body>
    <div class="wrapper">
        <!-- Start Header Style -->
        <?php include('header.php'); ?>

        <?php

        $user_id = $_SESSION["user"];
        echo $user_id;

        $sel_user = "SELECT * FROM `register` WHERE id='$user_id'";
        $query_user = mysqli_query($con, $sel_user);
        $user_data = mysqli_fetch_array($query_user, MYSQLI_BOTH);
        // var_dump($query_user);

        // die();
        ?>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="main-body">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">

                                            <div class="row">
                                                <div class="col-3">Name</div>
                                                <div class="col-6"><?= $user_data['name']; ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">Email</div>
                                                <div class="col-7"><?= $user_data['email']; ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">Password</div>
                                                <div class="col-3"><?= $user_data['password']; ?></div>
                                            </div>

                                            <p class="text-muted font-size-sm"></p>
                                            <!-- <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button> -->
                                            <a href="changpassword.php" class='btn btn-primary'>Change Password</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user_data['name']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user_data['email']; ?>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user_data['mobile']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user_data['password']; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-info " type="button" data-toggle="modal" data-target="#exampleModal">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="code/update_profile_code.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="user_name" value="<?= $user_data['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="user_mobile" value="<?= $user_data['mobile']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>