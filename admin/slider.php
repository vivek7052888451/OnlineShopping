<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('headerlink.php');
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php
        include('navbar.php');
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include('sidebar.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mySlider">
                                    Add New Slider
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="mySlider">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-light">
                                        <h4 class="modal-title">Add Slider</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="post" action="code/slider_code.php" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Headding</label>
                                                    <input type="text" class="form-control" name="headding" placeholder="Enter heading">
                                                </div>
                                                <div class="form-group">
                                                    <label>Headding2</label>
                                                    <input type="text" class="form-control" name="headding2" placeholder="Enter heading2">
                                                </div>
                                                <div class="form-group">
                                                    <label>Button</label>
                                                    <input type="text" class="form-control" name="button" placeholder="Enter button">
                                                </div>

                                                <div class="form-group">
                                                    <label>Slider</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" required class="custom-file-input" id="slider" name="slider">
                                                            <label class="custom-file-label">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="add_slider">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row bg-light">
                        <?php
                        $sel_slider_data = "SELECT * FROM `slider`";
                        $sel_slider_query = mysqli_query($con, $sel_slider_data);
                        ?>
                        <div class='table-responsive'>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SLIDER</th>
                                        <th>HEADDING</th>
                                        <th>HEADDING2</th>
                                        <th>BUTTON</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>DELETE</th>
                                        <th>EDIT</th>

                                    </tr>
                                </thead>
                                <?php
                                while ($slider_result = mysqli_fetch_array($sel_slider_query, MYSQLI_BOTH)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $slider_result['id']; ?></td>
                                            <td><img src="../uploads/slider/<?php echo $slider_result['slider']; ?>" height="100px" width="100px" ;></td>

                                            <td><?php echo $slider_result['headding']; ?></td>
                                            <td><?php echo $slider_result['headding2']; ?></td>
                                            <td><?php echo $slider_result['btn']; ?></td>
                                            <td><?php echo $slider_result['date']; ?></td>
                                            <td><?php echo $slider_result['status']; ?></td>
                                            <td><a href="code/slider_delete.php?id=<?= $slider_result['id']; ?>" class="btn btn-danger">Delete</td>
                                            <td><a href="code/edit_slider.php?id=<?= $slider_result['id']; ?>" class="btn btn-success">Edit</td>


                                        </tr>
                                    <?php
                                }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include('footer.php');

        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php
    include('footerlink.php');
    ?>
</body>

</html>