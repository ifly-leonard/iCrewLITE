<body class="hold-transition login-page" style="background-color: #222222;">
    <div class="login-box">
        <div class="login-logo">
            <a href="" style="color: white;">Crew<b>Center</b></a>
        </div>
        <!-- /.login-logo -->
        
        <div class="alert alert-danger">
            <h4><i class="icon fa fa-exclamation-triangle"></i> Error</h4>
            Email was not found in our database. Contact administrator for support.
        </div>
        
        <div class="login-box-body">
            <p class="login-box-msg">Enter your email to request a password reset.</p>

            <form action="<?php echo url('/login/forgotpassword');?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="<?php echo url('/login'); ?>" class="text-center">Back to login</a>
                    </div>
                    <div class="col-xs-4">
                        <input type="hidden" name="action" value="resetpass" />
                        <input class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="Submit" />
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            
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