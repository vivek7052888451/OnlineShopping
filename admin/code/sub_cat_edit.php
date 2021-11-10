<?php
include('connection.php');
$edit_sub_catid = $_REQUEST['id'];
//echo $edit_sub_catid;
$edit_sel_sub_cat = "SELECT * FROM `sub_category` WHERE id='$edit_sub_catid'";
$edit_sub_query = mysqli_query($con, $edit_sel_sub_cat);
$edit_sub_result = mysqli_fetch_array($edit_sub_query, MYSQLI_BOTH);

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
                        Sub-Category Edit Form
                    </div>
                    <div class="card-body">
                        <form method="post" action="sub_cat_update.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $edit_sub_result['id']; ?>">
                                <label>Sub-Category Name</label>
                                <input type="text" class="form-control" name="up_subcat_name" value="<?= $edit_sub_result['sub_categary']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Sub-Category Icon</label>
                                <input type="file" class="form-control" name="up_subcat_icon">
                                <img src="../../uploads/icons/<?php echo $edit_sub_result['sub_icon']; ?>" height="100px" ;width="100px" ;>
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