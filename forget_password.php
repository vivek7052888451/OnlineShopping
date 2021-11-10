<?php
include('admin/code/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Shoping</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-5 mx-auto bg-light p-3">
                <form method="post" action="code/forget_pass_code.php">
                    <div class="form-group p-4">
                        <div class="card">
                            <div class="card-header">
                                Send OTP Page
                            </div>
                            <div class="card-body">
                                <label>Mobile Number</label>
                                <input type="number" class="form-control" class="Enter mobile number" name="mob" required>
                                <button class="btn btn-primary mt-4">Send OTP</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>