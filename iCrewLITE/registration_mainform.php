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
              <h3 class="text-center">Registration</h3>
              <form action="<?php echo url('/registration');?>" method="post">
                  <div class="form-group">
                      <input type="text" name="firstname" class="form-control" value="<?php echo Vars::POST('firstname');?>" placeholder="First Name">
                      <?php
                          if($firstname_error == true)
                              echo '<p class="error">Please enter your first name</p>';
                      ?>
                  </div>
                  <div class="form-group">
                      <input type="text" name="lastname" class="form-control" value="<?php echo Vars::POST('lastname');?>" placeholder="Last Name">
                      <?php
                          if($lastname_error == true)
                              echo '<p class="error">Please enter your last name</p>';
                      ?>
                  </div>
                  <div class="form-group">
                      <input type="text" name="email" class="form-control" value="<?php echo Vars::POST('email');?>" placeholder="Email">
                      <?php
                          if($email_error == true)
                              echo '<p class="error">Please enter your email address</p>';
                      ?>
                  </div>
                  <div class="form-group">
                      <input type="password" name="password1" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                      <?php
                          if($password_error == true)
                              echo '<p class="error">'.$password_error.'</p>';
                      ?>
                  </div>
                  <div class="form-group">
                      <select name="location" class="form-control">
                          <?php
                              foreach($countries as $countryCode=>$countryName)
                              {
                              if(Vars::POST('location') == $countryCode)
                                  $sel = 'selected="selected"';
                              else
                                  $sel = '';
                                  echo '<option value="'.$countryCode.'" '.$sel.'>'.$countryName.'</option>';
                              }
                          ?>
                      </select>
                      <?php
                          if($location_error == true)
                              echo '<p class="error">Please enter your location</p>';
                      ?>
                  </div>
                  <div class="form-group">
                      <select name="code" id="code" class="form-control">
                          <?php
                              foreach($allairlines as $airline)
                              {
                                  echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
                              }
                          ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <select name="hub" id="hub" class="form-control">
                          <?php
                              foreach($allhubs as $hub)
                              {
                                  echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
                              }
                          ?>
                      </select>
                  </div>

                  <?php
                      //Put this in a seperate template. Shows the Custom Fields for registration
                      Template::Show('registration_customfields.tpl');
                  ?>

                  <div class="form-group">
                    <?php if(isset($captcha_error)){echo '<p class="error">'.$captcha_error.'</p>';} ?>
                    <div class="g-recaptcha" data-sitekey="<?php echo Config::Get('RECAPTCHA_PUBLIC_KEY');?>"></div>
                    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                    </script>
                  </div>
                  <div class="row">
                      <div class="col-xs-8">
                          <a href="<?php echo url('/login'); ?>">Already have an account</a>
                      </div>
                      <div class="col-xs-4">
                          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Register" />
                      </div>
                      <!-- /.col -->
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
