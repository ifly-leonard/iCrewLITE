<body class="hold-transition login-page" style="background-color: #222222;">
    <div class="login-box">
        <div class="login-logo">
            <a href="" style="color: white;">Crew<b>Center</b></a>
        </div>
        <!-- /.login-logo -->
        
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-exclamation-triangle"></i> Pending Approval</h4>
            Your registration has not yet been accepted by an administrator. Please try again later. You will receive an email when your registration has been accepted.
        </div>
        
        <div class="login-box-body">
            <p class="login-box-msg">Log in to view crew information and operations.</p>

            <form name="loginform" action="<?php echo url('/login');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <input type="checkbox" name="remember"> Remember Me
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <input type="hidden" name="redir" value="index.php/profile" />
                        <input type="hidden" name="action" value="login" />
                        <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Log In" />
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?php echo url('login/forgotpassword'); ?>">Forgot my password</a>
            <br>
            <a href="<?php echo SITE_URL?>/index.php/registration" class="text-center">Registration</a>
            <center style="margin-top: 30px;">
                <p class="text-muted">CrewCenter by Mark Swan</p>
            </center>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    
    <!-- iCheck -->
    <script src="<?php echo SITE_URL?>/lib/skins/crewcenter/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>