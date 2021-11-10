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
                                    Add New Product
                                </button>
                            </div>
                        </div>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header bg-light">
                                        <h4 class="modal-title">Add Product</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="post" action="code/product_code.php" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Product Short Name</label>
                                                    <input type="text" required class="form-control" id="product_short_name" name="product_short_name" placeholder="Enter Product Short Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Title</label>
                                                    <input type="text" required class="form-control" id="product_title" name="product_title" placeholder="Enter Product Title">
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Photo1</label>
                                                    <input type="file" required class="form-control" name="product_icon">

                                                </div>

                                                <div class="form-group">
                                                    <label>Product Photo2</label>
                                                    <input type="file" required class="form-control" name="product_icon2">

                                                </div>
                                                <div class="form-group">
                                                    <label>Product Photo3</label>
                                                    <input type="file" required class="form-control" name="product_icon3">

                                                </div>
                                                <div class="form-group">
                                                    <label>Product Photo4</label>
                                                    <input type="file" required class="form-control" name="product_icon4">

                                                </div>
                                                <?php
                                                $select_cat = "SELECT * FROM `categary`";
                                                $select_query = mysqli_query($con, $select_cat);
                                                ?>
                                                <div class="form-group">
                                                    <label>Product Category</label>

                                                    <select name="product_cat_name" id="product_cat_name" class="form-control" required>
                                                        <option value="">Select Product Category</option>
                                                        <?php
                                                        while ($fetch_cat = mysqli_fetch_array($select_query, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?= $fetch_cat['id']; ?>"><?= $fetch_cat['category_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                                $select_sub_cat = "SELECT * FROM `sub_category`";
                                                $select_subcat_query = mysqli_query($con, $select_sub_cat);
                                                ?>
                                                <div class="form-group">
                                                    <label>Product Sub-Category</label>

                                                    <select name="product_sub_cat_name" id="product_sub_cat_name" class="form-control" required>
                                                        <option value="">Select Product Sub-Category</option>
                                                        <?php
                                                        while ($fetch_sub_cat = mysqli_fetch_array($select_subcat_query, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?= $fetch_sub_cat['id']; ?>"><?= $fetch_sub_cat['sub_categary']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                                $select_brand = "SELECT * FROM `brand`";
                                                $select_brand_query = mysqli_query($con, $select_brand);
                                                ?>
                                                <div class="form-group">
                                                    <label>Brand</label>

                                                    <select name="product_brand" id="product_brand" class="form-control" required>
                                                        <option value="">Select Brand</option>
                                                        <?php
                                                        while ($fetch_brand = mysqli_fetch_array($select_brand_query, MYSQLI_BOTH)) {
                                                        ?>
                                                            <option value="<?= $fetch_brand['id']; ?>"><?= $fetch_brand['brand_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>MRP</label>
                                                    <input type="number" required class="form-control" onkeyup="amount()" id="m" name="mrp" placeholder="Enter MRP">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tax</label>
                                                    <input type="number" required class="form-control" onkeyup="amount()" id="t" name="tax" placeholder="Enter Tax">
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <input type="number" required class="form-control" onkeyup="amount()" id="d" name="discount" placeholder="Enter Discount">
                                                </div>


                                                <div class="form-group">
                                                    <label>Offer Price</label>
                                                    <input type="number" required class="form-control" readonly id="offer" name="offer_price" placeholder="Enter Offer Price">
                                                </div>

                                                <div class="form-group">
                                                    <label>Discription</label>
                                                    <textarea name="discription" required id="discription" cols="10" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="add_product">Submit</button>
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
                        $sel_product_data = "SELECT * FROM `product`";
                        $sel_product_query = mysqli_query($con, $sel_product_data);
                        ?>
                        <div class='table-responsive'>
                            <table class="table table-bordered table-hover text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>SHORT NAME</th>
                                        <th>PRODUCT TITLE</th>
                                        <th>PHOTO1</th>
                                        <th>PHOTO2</th>
                                        <th>PHOTO3</th>
                                        <th>PHOTO4</th>
                                        <th>CATEGORY</th>
                                        <th>SUB-CATE</th>
                                        <th>BRAND</th>
                                        <th>MRP</th>
                                        <th>TAX</th>
                                        <th>DISCOUNT</th>
                                        <th>OFFER</th>
                                        <th>DISCRIPTION</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>TIME</th>

                                        <th>DELETE</th>
                                        <th>EDIT</th>

                                    </tr>
                                </thead>
                                <?php
                                while ($product_result = mysqli_fetch_array($sel_product_query, MYSQLI_BOTH)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $product_result['id']; ?></td>
                                            <td><?php echo $product_result['produnt_shortname']; ?></td>
                                            <td><?php echo $product_result['product_title']; ?></td>

                                            <td><img src="../uploads/products/<?php echo $product_result['product_photo']; ?>" height="100px" width="100px" ;></td>
                                            <td><img src="../uploads/products/<?php echo $product_result['product_photo2']; ?>" height="100px" width="100px" ;></td>
                                            <td><img src="../uploads/products/<?php echo $product_result['product_photo3']; ?>" height="100px" width="100px" ;></td>
                                            <td><img src="../uploads/products/<?php echo $product_result['product_photo4']; ?>" height="100px" width="100px" ;></td>

                                            <td><?php echo $product_result['product_category']; ?></td>
                                            <td><?php echo $product_result['produnt_sub_category']; ?></td>
                                            <td><?php echo $product_result['produnt_brand']; ?></td>
                                            <td><?php echo $product_result['product_mrp']; ?></td>
                                            <td><?php echo $product_result['product_tax']; ?></td>
                                            <td><?php echo $product_result['product_discount']; ?></td>
                                            <td><?php echo $product_result['product_offer']; ?></td>
                                            <td><?php echo $product_result['product_discription']; ?></td>
                                            <td><?php echo $product_result['product_date']; ?></td>
                                            <td><?php echo $product_result['status']; ?></td>
                                            <td><?php echo $product_result['time']; ?></td>

                                            <td><a href="code/product_delete.php?id=<?= $product_result['id']; ?>" class="btn btn-danger">Delete</td>
                                            <td><a href="code/product_edit.php?id=<?= $product_result['id']; ?>" class="btn btn-success">Edit</td>


                                        </tr>
                                    <?php
                                }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
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
    <script>
        function amount() {
            var mrp = parseInt(document.getElementById('m').value);
            var tax = parseInt(document.getElementById('t').value);
            var dis = parseInt(document.getElementById('d').value);

            var add = (mrp * tax) / 100;
            var total = mrp + add;

            var totaldisc = (total * dis) / 100;
            var offerprice = total - totaldisc;

            document.getElementById('offer').value = offerprice;

            //alert(offerprice);
        }
    </script>

</body>

</html>