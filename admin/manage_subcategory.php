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
                                    Add New Sub-Category
                                </button>
                            </div>
                        </div>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-light">
                                        <h4 class="modal-title">Add Sub-Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="post" action="code/sub_cat_code.php" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <?php
                                                    $select_cat = "SELECT * FROM `categary`";
                                                    $select_query = mysqli_query($con, $select_cat);
                                                    ?>
                                                    <label>Category Name</label>
                                                    <select name="category_name" required id="category_name" class="form-control">
                                                        <option value="">Select Category Name</option>
                                                        <?php
                                                        while ($fetch_cat = mysqli_fetch_array($select_query, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?= $fetch_cat['id']; ?>"><?= $fetch_cat['category_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Category Name</label>
                                                    <input type="text" required class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Enter Category Name">
                                                </div>

                                                <div class="form-group">
                                                    <label>sub-Category Icon</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" required class="custom-file-input" id="sub_cat_icon" name="sub_cat_icon">
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
                                                <button type="submit" class="btn btn-primary" name="add_subcat">Submit</button>
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
                        $sel_subcat_data = "SELECT * FROM `sub_category`";
                        $sel_subquery = mysqli_query($con, $sel_subcat_data);
                        ?>
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORY ID</th>
                                    <th>SUB-CATEGORY NAME</th>
                                    <th>ICON</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>TIME</th>

                                    <th>DELETE</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <?php
                            while ($result_subcat = mysqli_fetch_array($sel_subquery, MYSQLI_BOTH)) {
                            ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $result_subcat['id']; ?></td>
                                        <td><?php echo $result_subcat['categary_name']; ?></td>
                                        <td><?php echo $result_subcat['sub_categary']; ?></td>

                                        <td><img src="../uploads/icons/<?php echo $result_subcat['sub_icon']; ?>" height="100px" width="100px" ;></td>
                                        <td><?php echo $result_subcat['sub_status']; ?></td>
                                        <td><?php echo $result_subcat['sub_date']; ?></td>
                                        <td><?php echo $result_subcat['time']; ?></td>

                                        <td><a href="code/sub_cat_delete.php?id=<?php echo $result_subcat['id']; ?>" class="btn btn-danger">DELETE</a></td>
                                        <td><a href="code/sub_cat_edit.php?id=<?php echo $result_subcat['id']; ?>" class="btn btn-info">EDIT</a></td>

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