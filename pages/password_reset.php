<?php
ob_start();
?>
<!DOCTYPE html>
<html>
    <?php
    include 'include/header.php';
    
    ?>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <div class="text-center">
                    <img src="assets/uploads/logo/logo2.png" alt="User Image">
                </div>
                <!-- <b><a href="#">GADC</a></b> -->
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Account recovery</p>
                <p class="login-box-msg" id="password_reset">Reset password</p>

                <form action="" method="post">

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="Enter email address or username"  autocomplete="
                               off">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" id="password_reset">
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" id="password_reset">
                        <input type="password" class="form-control" name="password_repeat"  placeholder="Repeat password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 pull-left">
                            <p class="login-box-msg text-danger"><?php echo $notification; ?></p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 pull-right">
                            <input type="hidden" name="login_token" class="input" value="<?php echo Token::generate(); ?>">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>
