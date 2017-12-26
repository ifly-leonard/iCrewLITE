<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<!DOCTYPE html>

<html class="no-js" lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>iCrew | <?php echo SITE_NAME?></title>
    
    <!-- Favicon-->
    <link rel="icon" href="http://jet.iflyva.in/lib/skins/iCrewLITE/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/css/themes/all-themes.css" rel="stylesheet" />
    
    <!--WaitMe Css-->
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/waitme/waitMe.min.css" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    
    <!--Your Google Maps API Key here-->
    <script src="http://maps.google.com/maps/api/js?v=3&libraries=geometry&language=en_gr&key=AIzaSyDbwylblt3-Nz21yNoDJWbHyqTjTNogYcg" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
		
		<?php
      Template::Show('core_htmlhead.tpl');
    ?>
    
    </head>
    <?php if(!Auth::LoggedIn()) 
    {
      ?>
      
      <body class="login-page">
        <?php echo $page_content; ?>
      </body>
      <?php 
    } 
      
      else 
      
    {
    ?>
    <body class="theme-indigo"> 
    	
    	<?php echo $page_htmlreq; ?>
		<?php
		// var_dump($_SERVER['REQUEST_URI']);
		# Hide the header if the page is not the registration or login page
		# Bit hacky, don't like doing it this way
		
		if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
			if(Auth::LoggedIn()) {
			  Template::Show('page_preloader.php');
				Template::Show('app_top.php');
				Template::Show('app_sidebar.php'); 
			}
		}
		?>
        
         <section class="content">
          <div class="container-fluid">
            <?php echo $page_content; ?>
          </div>
        </section>
        
		<?php
		# Hide the footer if the page is not the registration or login page
		# Bit hacky, don't like doing it this way
		if (!isset($_SERVER['REQUEST_URI']) || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/login' || ltrim($_SERVER['REQUEST_URI'],'/') !== SITE_URL.'/index.php/registration') {
			if(Auth::LoggedIn()) {
				Template::Show('app_bottom.php');
			}
		}
    }
		?>
		
    	
     <!-- Jquery Core Js -->
    

    <!-- Bootstrap Core Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/node-waves/waves.js"></script>

    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/waitme/waitMe.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/plugins/waitme/waitMe.min.js"></script>
    
    <!-- Custom Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/js/admin.js"></script>
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/js/pages/index.js"></script>
    <!-- Demo Js -->
    <script src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/js/demo.js"></script>
</body>

</html>

      