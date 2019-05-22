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
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <?php
                            if (Input::exists()) {
                                if (Token::check(Input::get("login_token"))) {
                                    $validate = new Validate();
                                    $validation = $validate->check($_POST, array(
                                        'username' => array('required' => TRUE),
                                        'password' => array('required' => TRUE)
                                    ));
                                    if ($validation->passed()) {
                                        $username = Input::get("username");
                                        //login user
                                        $user = new User();
                                        $login = $user->login(Input::get("username"), Input::get("password"));
                                        if ($login) {
                                            Redirect::to('index.php?page=dashboard');
                                        } else {
                                            $notification = 'Sorry, login failed';
                                        }
                                    } 
                                }
                            }
                            ?>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="Username"  autocomplete="
                               off" required="true">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password"  placeholder="Password" required="true">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 pull-left">
                            <p class="login-box-msg text-danger"><?php echo $notification; ?></p>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 pull-right">
                            <input type="hidden" name="login_token" class="input" value="<?php echo Token::generate(); ?>">
                            <button type="submit" name="login" value="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="index.php?page=password_reset">I forgot my password</a>

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
