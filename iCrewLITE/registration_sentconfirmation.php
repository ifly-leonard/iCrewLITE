<body class="hold-transition login-page" style="background-color: #222222;">
    <div class="login-box">
        <div class="login-logo">
            <a href="" style="color: white;">Crew<b>Center</b></a>
        </div>
        <!-- /.login-logo -->

        <div class="login-box-body">
            <div class="alert alert-success">
                <h4><i class="icon fa fa-check"></i> Confirmation Sent</h4>
                Thanks for registering for <?php echo SITE_NAME; ?>. You will be notified via email of your registration status.
            </div>
            
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