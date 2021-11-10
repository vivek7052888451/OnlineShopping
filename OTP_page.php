<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Shopping</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .card {
            width: 350px;
            padding: 10px;
            border-radius: 20px;
            background: #fff;
            border: none;
            height: 350px;
            position: relative
        }

        .container {
            height: 100vh
        }

        body {
            background: #eee
        }

        .mobile-text {
            color: #989696b8;
            font-size: 15px
        }

        .form-control {
            margin-right: 12px
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #ff8880;
            outline: 0;
            box-shadow: none
        }

        .cursor {
            cursor: pointer
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center container">
        <div class="card py-5 px-3">
            <h5 class="m-0">Mobile phone verification</h5>
            <form action="code/otp_code.php" method="post">
                <div class="d-flex flex-row mt-5">
                    <input type="text" class="form-control" name="otp[]" autofocus="">
                    <input type="text" class="form-control" name="otp[]">
                    <input type="text" class="form-control" name="otp[]">
                    <input type="text" class="form-control" name="otp[]">
                </div>
                <button class="btn btn-info mt-2" type="submit">verify</button>
                <div class="text-center mt-5"><span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div>
            </form>
        </div>
    </div>

</body>

</html>