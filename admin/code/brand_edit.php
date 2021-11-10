<?php
include('connection.php');
$brand_editid = $_REQUEST['id'];
//echo $brand_editid;

$brand_sel = "SELECT * FROM `brand` WHERE id='$brand_editid'";
$brand_edit_query = mysqli_query($con, $brand_sel);
$brand_result = mysqli_fetch_array($brand_edit_query, MYSQLI_BOTH);

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
                        Brand Edit Form
                    </div>
                    <div class="card-body">
                        <form method="post" action="brand_update.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $brand_result['id']; ?>">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" name="up_brandname" value="<?= $brand_result['brand_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Brand Icon</label>
                                <input type="file" class="form-control" name="up_brand_icon">
                                <img src="../../uploads/icons/<?php echo $brand_result['brand_icon']; ?>" height="100px" ;width="100px" ;>
                            </div>
                            <button type="submit" class="btn btn-info">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>