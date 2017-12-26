<body class="hold-transition login-page" style="background-color: #222222;">
    <div class="login-box">
        <div class="login-logo">
            <a href="" style="color: white;">Crew<b>Center</b></a>
        </div>
        <!-- /.login-logo -->

        <div class="login-box-body">
            <p class="login-box-msg">Please complete this form to create your account.</p>

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
                    <?php
                        echo recaptcha_get_html(Config::Get('RECAPTCHA_PUBLIC_KEY'), $captcha_error);
                    ?>
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

<!-- <h3>Registration</h3>
<p>Welcome to the registration form for <?php echo SITE_NAME; ?>. After you register, you will be notified by a staff member about your membership.</p>
<form method="post" action="<?php echo url('/registration');?>">
<dl>
	<dt>First Name: *</dt>
	<dd><input type="text" name="firstname" value="<?php echo Vars::POST('firstname');?>" />
		<?php
			if($firstname_error == true)
				echo '<p class="error">Please enter your first name</p>';
		?>
	</dd>
	
	<dt>Last Name: *</dt>
	<dd><input type="text" name="lastname" value="<?php echo Vars::POST('lastname');?>" />
		<?php
			if($lastname_error == true)
				echo '<p class="error">Please enter your last name</p>';
		?>
	</dd>
	
	<dt>Email Address: *</dt>
	<dd><input type="text" name="email" value="<?php echo Vars::POST('email');?>" />
		<?php
			if($email_error == true)
				echo '<p class="error">Please enter your email address</p>';
		?>
	</dd>
	
	<dt>Select Airline: *</dt>
	<dd>
		<select name="code" id="code">
		<?php
		foreach($allairlines as $airline)
		{
			echo '<option value="'.$airline->code.'">'.$airline->code.' - '.$airline->name.'</option>';
		}
		?>
		</select>
	</dd>
	
	<dt>Hub: *</dt>
	<dd>
		<select name="hub" id="hub">
		<?php
		foreach($allhubs as $hub)
		{
			echo '<option value="'.$hub->icao.'">'.$hub->icao.' - ' . $hub->name .'</option>';
		}
		?>
		</select>
	</dd>

	<dt>Location: *</dt>
	<dd><select name="location">
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
	</dd>
	
	<dt>Password: *</dt>
	<dd><input id="password" type="password" name="password1" value="" /></dd>
	
	<dt>Enter your password again: *</dt>
	<dd><input type="password" name="password2" value="" />
		<?php
			if($password_error != '')
				echo '<p class="error">'.$password_error.'</p>';
		?>
	</dd>
		
	<?php
	
	//Put this in a seperate template. Shows the Custom Fields for registration
	Template::Show('registration_customfields.tpl');
	
	?>
	
	<dt>reCaptcha</dt>
	<dd>
		<?php
			echo recaptcha_get_html(Config::Get('RECAPTCHA_PUBLIC_KEY'), $captcha_error);
		?>
	</dd>
		
	<dt></dt>
	<dd><p>By clicking register, you're agreeing to the terms and conditions</p></dd>
	<dt></dt>
	<dd><input type="submit" name="submit" value="Register!" /></dd>
</dl>
</form> -->