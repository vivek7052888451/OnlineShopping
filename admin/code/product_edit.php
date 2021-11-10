<?php
include('connection.php');
$edit_productid = $_REQUEST['id'];
//echo $edit_productid;

$edit_sel_product = "SELECT * FROM `product` WHERE id='$edit_productid'";
$edit_product_query = mysqli_query($con, $edit_sel_product);
$edit_product_result = mysqli_fetch_array($edit_product_query, MYSQLI_BOTH);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container bg-info">
        <div class="row bg-light mt-5">
            <div class="col-6 mx-auto p-5">
                <div class="card">
                    <div class="card-header">
                        Product Edit Form
                    </div>
                    <div class="card-body">
                        <form method="post" action="product_update.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $edit_product_result['id']; ?>">
                                <label>Product Short Name</label>
                                <input type="text" class="form-control" name="up_product_name" value="<?= $edit_product_result['produnt_shortname']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Product title</label>
                                <input type="text" class="form-control" name="up_title_name" value="<?= $edit_product_result['product_title']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Product MRP</label>
                                <input type="text" id="m" class="form-control" onkeyup="amount()" name="up_mrp" value="<?= $edit_product_result['product_mrp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Product tax</label>
                                <input type="text" id="t" class="form-control" onkeyup="amount()" name="up_tax" value="<?= $edit_product_result['product_tax']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Product discount</label>
                                <input type="text" id="d" class="form-control" onkeyup="amount()" name="up_discount" value="<?= $edit_product_result['product_discount']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Product offer</label>
                                <input type="text" id="offer" class="form-control" readonly name="up_offer" value="<?= $edit_product_result['product_offer']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Product discription</label>

                                <textarea name="up_discription" id="" cols="3" rows="3" class="form-control"><?= $edit_product_result['product_discription']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Photo</label>
                                <input type="file" class="form-control" name="up_product">
                                <img src="../../uploads/products/<?php echo $edit_product_result['product_photo']; ?>" height="100px" ;width="100px" ;>
                            </div>

                            <div class="form-group">
                                <label>Product Photo2</label>
                                <input type="file" class="form-control" name="up_product2">
                                <img src="../../uploads/products/<?php echo $edit_product_result['product_photo2']; ?>" height="100px" ;width="100px" ;>
                            </div>
                            <div class="form-group">
                                <label>Product Photo3</label>
                                <input type="file" class="form-control" name="up_product3">
                                <img src="../../uploads/products/<?php echo $edit_product_result['product_photo3']; ?>" height="100px" ;width="100px" ;>
                            </div>
                            <div class="form-group">
                                <label>Product Photo4</label>
                                <input type="file" class="form-control" name="up_product4">
                                <img src="../../uploads/products/<?php echo $edit_product_result['product_photo4']; ?>" height="100px" ;width="100px" ;>
                            </div>
                            <button type="submit" class="btn btn-info">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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