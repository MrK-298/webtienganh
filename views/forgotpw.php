<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(-135deg, #66FF00, #4158d0);
        }
        .form-gap {
            padding-top: 70px;
        }
        .btn-primary {
            background: linear-gradient(-135deg, #66FF00, #4158d0);
            color: black;
            font-family: Arial, sans-serif;
        }
        .lock-icon {
            background: linear-gradient(-135deg, #66FF00, #4158d0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent; 
        }
    </style>
</head>
    <body>
        <div class="form-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                    <h3 class="lock-icon"><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Quên mật khẩu?</h2>
                                    <p>Bạn có thể đặt lại mật khẩu của bạn ở đây.</p>
                                    <div class="panel-body">
                                        <form id="forgot-form" role="form" autocomplete="off" class="form" method="puy">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                    <input id="email" name="email" placeholder="Nhập email của bạn" class="form-control" type="email" required>
                                                </div>
                                                <div class="input-group" style="display:none" id="verificationCode-form">
                                                    <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                                    <input id="verificationCode" name="verificationCode" class="form-control" placeholder="Nhập mã xác minh">                                                  
                                                </div>
                                                <div class="input-group" style="display:none" id="password-form">
                                                    <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                                    <input id="password" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn">                                                  
                                                </div>
                                                <div class="input-group" style="display:none" id="confirmpassword-form">
                                                    <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                                    <input id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Xác nhận mật khẩu của bạn">                                                  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input id="send-code-btn" name="send-code" class="btn btn-lg btn-primary btn-block" value="Send code" type="button">
                                            </div>
                                            <div class="form-group">
                                                <input id="recover-btn" name="recover-btn" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="Reset Password">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="../js/forgotpw.js"></script>
</html>
