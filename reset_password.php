<html lang="en">

<head>
    <title>Online Shopping</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto border border-info mt-5">
                <div class="row bg-info text-light">
                    <div class="col-12 text-center mt-3 p-3">
                        <h4>Reset Password</h4>

                    </div>

                </div>
                <!--Section: Block Content-->

                <form action="code/reset_password_code.php" class="p-3" method="post">

                    <div class="md-form md-outline">
                        <label data-error="wrong" data-success="right" for="newPass">New password</label>
                        <input type="password" name="new" class="form-control">

                    </div>

                    <div class="md-form md-outline">
                        <label data-error="wrong" data-success="right" for="newPass">New password</label>
                        <input type="password" name="Confirm" class="form-control">

                    </div>
                    <button type="submit" class="btn btn-primary mb-4 mt-3">Change password</button>

                </form>

                <div class="d-flex justify-content-between align-items-center mb-2">

                    <a href="loginpage.php">Back to Log In</a>

                    <a href="loginpage.php">Register</a>

                </div>


                <!--Section: Block Content-->
            </div>
        </div>
    </div>

</body>

</html>