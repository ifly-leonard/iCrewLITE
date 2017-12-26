<style>
        body {
          background: url(http://jet.iflyva.in/iCrew/backgrounds/b777.jpg);
          background-repeat: no-repeat;
          background-size: 100%;
        }
        
        
</style>
     <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><?php echo CREWCENTER_TITLE ?></a>
            
        </div>
        <?php
        if(isset($message))
            echo '<div class="alert alert-danger">
            <h4><i class="icon fa fa-exclamation-triangle"></i> Error</h4> '.$message.'</div>';
        ?>
        <div class="card">
            <div class="body">
                <form name="loginform" action="<?php echo url('/login');?>" method="post">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" id="remember" name="remember" class="filled-in chk-col-blue">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <input type="hidden" name="redir" value="index.php/profile" />
                        <input type="hidden" name="action" value="login" />
                        <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Log In" />
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo SITE_URL?>/index.php/registration"><span class="text-muted" >Registration</span></a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?php echo url('login/forgotpassword'); ?>"><span class="text-muted" >Forgot Password?</span></a>
                        </div>
                    </div>
                    <div class="m-t-25 m-b--5 align-center">
                        <small><?php echo SITE_NAME?> &bull; powered by phpVMS</small>
                        <h5><small><span class="text-muted">iCrew v2 &bull; iCrewSystems</span></small></h5>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    
    <!-- Jquery Core Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/js/admin.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/js/pages/examples/sign-in.js"></script>