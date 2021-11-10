<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #eee;
        }

        .separator {
            border-right: 1px solid #dfdfe0;
        }

        .icon-btn-save {
            padding-top: 0;
            padding-bottom: 0;
        }

        .input-group {
            margin-bottom: 10px;
        }

        .btn-save-label {
            position: relative;
            left: -12px;
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 3px 0 0 3px;
        }

        .box {
            margin-top: 80px;
            margin-left: 80px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="container bootstrap snippets bootdey">
            <div class="row box">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
                    <form action="code/change_password_code.php" method="post">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <span class="glyphicon glyphicon-th"></span>
                                    Change password
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                                        <img alt="" class="img-thumbnail" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                    </div>
                                    <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                                <input class="form-control" type="password" placeholder="Current Password" name="old_pass" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                                <input class="form-control" type="password" placeholder="New Password" name="new_pass" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                                                <input class="form-control" type="password" placeholder="New Password" name="con_pass" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6"></div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <button class="btn icon-btn-save btn-success" type="submit">
                                            <span class="btn-save-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>