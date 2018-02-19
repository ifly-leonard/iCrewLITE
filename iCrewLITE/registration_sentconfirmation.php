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
              <div class="alert alert-success">
                Success, your registration was filed. Our Staff will moderate your application soon. This process may take upto 48 hours.
              </div>
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
