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
                        <!-- Button to Open the Modal -->
                        <div class="col-sm-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Add New Brand
                                </button>
                            </div>
                        </div>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-light">
                                        <h4 class="modal-title">Add Brand</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="post" action="code/brand_code.php" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <input type="text" class="form-control" required id="brand_name" name="brand_name" placeholder="Enter Brand Name">
                                                </div>

                                                <div class="form-group">
                                                    <label>Brand Icon</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" required class="custom-file-input" id="brand_icon" name="brand_icon">
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
                                                <button type="submit" class="btn btn-primary" name="add_brand">Submit</button>
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
                        $sel_brand_data = "SELECT * FROM `brand`";
                        $sel_brand_query = mysqli_query($con, $sel_brand_data);
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>BRAND NAME</th>
                                    <th>ICON</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>TIME</th>

                                    <th>DELETE</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <?php
                            while ($result_brand = mysqli_fetch_array($sel_brand_query, MYSQLI_BOTH)) {
                            ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $result_brand['id']; ?></td>
                                        <td><?php echo $result_brand['brand_name']; ?></td>
                                        <td><img src="../uploads/icons/<?php echo $result_brand['brand_icon']; ?>" height="100px" width="100px" ;></td>
                                        <td><?php echo $result_brand['status']; ?></td>
                                        <td><?php echo $result_brand['date']; ?></td>
                                        <td><?php echo $result_brand['time']; ?></td>

                                        <td><a href="code/brand_delete.php?id=<?php echo $result_brand['id']; ?>" class="btn btn-danger">DELETE</a></td>
                                        <td><a href="code/brand_edit.php?id=<?php echo $result_brand['id']; ?>" class="btn btn-info">EDIT</a></td>

                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
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