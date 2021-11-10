<?php
include('connection.php');
$slider_editid = $_REQUEST['id'];
//echo $brand_editid;

$slider_sel = "SELECT * FROM `slider` WHERE id='$slider_editid'";
$slider_edit_query = mysqli_query($con, $slider_sel);
$slider_result = mysqli_fetch_array($slider_edit_query, MYSQLI_BOTH);

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
                        Slider Edit Form
                    </div>
                    <div class="card-body">
                        <form method="post" action="slider_update.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Headding</label>
                                <input type="text" class="form-control" name="up_headding" value="<?= $slider_result['headding']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Headding2</label>
                                <input type="text" class="form-control" name="up_headding2" value="<?= $slider_result['headding2']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Button</label>
                                <input type="text" class="form-control" name="up_button" value="<?= $slider_result['btn']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Slider Image</label>
                                <input type="hidden" class="form-control" name="id" value="<?= $slider_result['id']; ?>">
                                <input type="file" class="form-control" name="up_slider_icon">
                                <img src="../../uploads/slider/<?php echo $slider_result['slider']; ?>" height="100px" ;width="100px" ;>
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