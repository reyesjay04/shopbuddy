<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
    <div class="container">
        
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 text-center">

        <?php display_message(); ?>
        <?php validate_user_login(); ?>
        <?php 
        if(isset($_SESSION['email'])) {
            redirect("index.php");
        }
        ?>
                                
        </div>
    </div>
    <hr>
   <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="login.php" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="register.php" id="">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form"  method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="login-
                                        password" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group text-center">
<!--                                         <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?

                                                </div>
                                                <div class="text-center">
                                                <a href="activate.php" tabindex="5" class="forgot-password">Activate your account here.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

   