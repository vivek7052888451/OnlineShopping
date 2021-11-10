<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('headerlink.php');
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php
        include('navbar.php');
        ?>
        <?php
        include('sidebar.php');
        ?>
        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">


                    <div class="row bg-light">
                        <?php
                        $sel_subcat_data = "SELECT * FROM `orders`";
                        $sel_subquery = mysqli_query($con, $sel_subcat_data);
                        ?>
                        <div class='table-responsive'>
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>USER ID</th>
                                        <th>ORDER ID</th>
                                        <th>NAME</th>
                                        <th>APARTMENT</th>
                                        <th>CITY</th>
                                        <th>STREET</th>
                                        <th>EMAIL</th>
                                        <th>POST CODE</th>
                                        <th>MOBILE </th>
                                        <th>DELIVIRY</th>
                                        <th>DATE</th>
                                        <th>TIME</th>

                                        <th>ORDER STATUS</th>

                                    </tr>
                                </thead>
                                <?php
                                while ($result_order = mysqli_fetch_array($sel_subquery, MYSQLI_BOTH)) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $result_order['id']; ?></td>

                                            <td><?php echo $result_order['user_id']; ?></td>
                                            <td><?php echo $result_order['order_id']; ?><a href="order_print.php?id=<?= $result_order['order_id']; ?>" class="btn btn-info">Print</a></td>


                                            <td><?php echo $result_order['name']; ?></td>
                                            <td><?php echo $result_order['apartment']; ?></td>
                                            <td><?php echo $result_order['city']; ?></td>

                                            <td><?php echo $result_order['street']; ?></td>
                                            <td><?php echo $result_order['email']; ?></td>
                                            <td><?php echo $result_order['post_code']; ?></td>

                                            <td><?php echo $result_order['mobile']; ?></td>
                                            <td><?php echo $result_order['dilivery']; ?></td>
                                            <td><?php echo $result_order['date']; ?></td>
                                            <td><?php echo $result_order['time']; ?></td>
                                            <td><?php echo $result_order['order_status']; ?></td>
                                        </tr>
                                    <?php
                                }
                                    ?>
                                    </tbody>
                            </table>
                            </table>
                        </div>
                    </div>

            </section>

        </div>
        <?php
        include('footer.php');

        ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php
    include('footerlink.php');
    ?>
</body>

</html>