
							<p>
								<?php
    error_reporting(0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

    if(!file_exists('../core/codon.config.php'))
            {
                echo '<hr /><h4><font color="#FF0000">It Does Not Appear That The Flightboard Installer Has Been Placed In The phpVMS Application Root</font></h4>
                <a href="./index.php">Check For Proper Location Again<br /><br /></a><hr />';
            }
    else
    {
    include_once '../core/codon.config.php';
    if(Auth::LoggedIn())
            {
                    if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                    {
                    	?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iCrew LITE | Bootstrap Admin Theme</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/lity/dist/lity.css">
	<link rel="stylesheet" href="assets/style/flaticon.css">
	<link rel="stylesheet" href="assets/plugins/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/socicon/css/socicon.css">
	<link rel="stylesheet" href="assets/style/style.css">
	<link rel="stylesheet" href="assets/plugins/filament-sticky/fixedsticky.css">

	<!-- Code Highlight -->
	<link rel="stylesheet" href="assets/plugins/highlight-js/src/styles/railscasts.css">

	<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/plugins/tether/dist/js/tether.min.js"></script>
	<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/plugins/lity/dist/lity.min.js"></script>
	<script src="assets/plugins/filament-fixed/fixedfixed.js"></script>
	<script src="assets/plugins/filament-sticky/fixedsticky.js"></script>

	<!-- Code Highlight -->
	<script src="assets/plugins/highlight-js/src/highlight.js"></script>
	<script src="assets/plugins/highlight-js/build/highlight.pack.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>

	<script src="assets/js/custom.js"></script>
	<link rel="icon" href="http://jet.iflyva.in/lib/skins/iCrewLITE/images/favicon.png" type="image/x-icon">
</head>
<body data-spy="scroll" data-target="#sidebarScroll" data-offset="20">

<div class="wrapper"><!-- wrapper -->



	<section class="section section--white section--padding"><!-- section -->
		<div class="content">

			<div class="contents"><!-- contents -->
				<div class="contents__box contents__box--right"><!-- contents__box -->
					<div id="overview" class="section">
						<h2 class="section-head">iCrew LITE Web Installer</h2>
						<div class="section-content">
							Web installer for "Le Non-programmers". I've learnt from the forum that not everyone is a programmer. Well, not everyone needs to be a
							programmer to enjoy this Skin on their VA :) <br>
							So I've tried my best with whatever knowledge i have to make this installer. If something doesn't work out, don't think twice about disturbing me for
							help, I'll try my best to help
							<br><br>
							<strong><span class="text-danger">Warning</span></strong><br>
							Create your sub domain first, else the installer won't run. <br>
							This CrewCenter was built on phpVMS by simpilot (v5.5.2), I cannot gaurentee that this will work with other versions of phpVMS as intended.

							<?php
                        echo '<hr /><h4>iCrew <em>LITE</em> Skin installer For '.SITE_NAME.'</h4>';
                        echo ' www.icrewsystems.com &copy;'. date(' Y', time());
                        echo '<hr>';
                    }
             else
                    {
                        header('Location: '.url('/'));
                    }
            }
            else
            {header('Location: '.url('/'));}
	//Checking the phpVMS Version
	$phpver = trim(file_get_contents('../core/version'));
	$required_php_ver = 'simpilot 5.5.2';
	$strcmp = strcmp($phpver, "simpilot 5.5.2");
	if($strcmp === 0) {
		echo 'phpVMS Version Check...<font color="#32CD32">OK</font>';
	}
	else {
		echo 'phpVMS Version Check...<font color="#ff7b00">NOT OK</font>';
		echo '<br>';
		echo '--You are running on '.$phpver.', iCrew LITE was built and tested on simpilot 5.5.2. I cannot gaurentee this skin will work with other versions of phpVMS';
	}
    //Checking the DNS
	$dns = SITE_URL;
    $icdns = str_replace('www', 'icrew', $dns);
    $dns_check = str_replace('http://', '', $icdns);
    echo '<br>';
    if (checkdnsrr($dns_check, 'ANY') ) {
	$dns_record = 1;
	 }
	else {
	$dns_record = 0;
	}
    //Check the current Website
    if($dns == $icdns) {
    	$message = 'Subdomain verification...<font color="#32CD32">OK</font>';
    	echo $message;
    }
    else if ($dns_record == 0){
    	$message = 'Subdomain verification...<font color="#ff7b00">NOT OK</font> <br><br>--You are not on "icrew" sub-domain. For the best use, please create a new Sub-domain called "icrew" or "crew" via your cpanel and then try again.';
    	echo $message;
    	return;
    }
    else if ($dns_record == 1) {
    	$message = 'Subdomain verification...<font color="#32CD32">OK</font>, <br><br>--DNS History for "icrew" subdomain found. But you have placed the files in the wrong directory. Please install phpVMS on '.$icdns.' and try again.';
    	echo $message;
    	return;
    }



    //Checking package integrity
    echo '<br>';
    echo 'Checking Documents...';
    if(!file_exists('./Documentation')) {
    	echo '<font color="#FF0000">ERROR</font> <br> --Documentation folder not found, Just wondering how you got this installation page.';
    }
    else {
    	echo '<font color="#32CD32">OK</font>';
    }
    echo '<br>';
    echo 'Checking iCrewLITE folder...';
    if(!file_exists('./iCrewLITE')) {
    	echo '<font color="#FF0000">ERROR</font> <br> --iCrewLITE folder not found, please re-upload.';
    	return;
    	$fileerr = 1;
    }
    else {
    	echo '<font color="#32CD32">OK</font>';
    }
    echo '<br>';
    //Checking if there are all required Addons

    //controller
    if ($_GET['func'] == install)
        {
            echo 'Installing iCrewLITE...<hr />';

            //create folders and move files
            echo '<h4>Creating Skin Folder for iCrewLITE</h4>';

            flush();sleep(1);

            if(!file_exists('../lib/skins/iCrewLITE'))
            {
            if(mkdir('../lib/skins/iCrewLITE'))
            {echo 'Skin folder...<font color="#32CD32">CREATED</font><br /><br />';
            }
            }
            else
            {echo 'Skin folder...<font color="#FF0000">ALREADY EXISTS</font><br /><br />';}
			function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        echo 'Copying all files...<font color="#32CD32">DONE</font><br>';
        closedir($dir);
        echo 'Closing Directory';
    }
     recurse_copy('../iCrewLITE', '../lib/skins/iCrewLITE/');
            flush();sleep(1);

            if(!file_exists('../lib/skins/iCrewLITE'))
            {
            if(copy('./iCrewLITE','../lib/skins/iCrewLITE'))
                {echo 'Copying Contents...<font color="#32CD32">DONE</font><br /><br />';}
                else
                {echo 'Copying Contents...<font color="#FF0000">ERROR</font><br /><br />';}
            }
            else
            {echo 'Copying Contents...<font color="#FF0000">ERROR</font><br> Already copied<br /><br />';}

            flush();sleep(1);

            if(!file_exists('../lib/skins/iCrewLITE'))
            {
                @mkdir('../lib/skins/iCrewLITE/inssts');
								echo 'Directory "inssts" created<br>';
                sleep(1);
                echo 'Copying Contents...<font color="#32CD32">DONE</font><br /><br />';
            }
            else
            {echo 'Copying Contents...<font color="#FF0000">ERROR</font><br> Already copied<br /><br />';}

            flush();sleep(1);

            $servername = $_SERVER['SERVER_NAME'];
            $serveraddress = $_SERVER['SERVER_ADDR'];
            $host = $_SERVER['HTTP_HOST'];
            $root = $_SERVER['PHP_SELF'];
            $user = $_SERVER['REMOTE_ADDR'];
            $email = 'kashrayks@gmail.com';
            $sub = 'NEW iCrew LITE Installation';
            $datec = date('d-m-y H:i:s', time());
            $message = 'Hello, There has been a new iCrew LITE installation. Details are as follows <br /><table width="400" border="1px solid black">
            	<thead>
            		<th>Virtual Airline</th>
            		<th>Server Name</th>
            		<th>Server Address</th>
            		<th>Host</th>
            		<th>Install Location</th>
            		<th>User IP</th>
            		<th>Date</th>
            	</thead>
            	<tbody>
            		<tr>
            			<td>'.SITE_NAME.'</td>
            			<td>'.$servername.'</td>
            			<td>'.$serveraddress.'</td>
            			<td>'.$host.'</td>
            			<td>'.$root.'</td>
            			<td>'.$user.'</td>
            			<td>'.$datec.'</td>
            		</tr>
            	</tbody>
            </table>';
            ?>

            <?php
            Util::SendEmail($email, $sub, $message);
            echo '<h4><font color="#FF0000">FATAL ERROR OCCURED, erasing all information from database...</font></h4>';
            echo '<br><br> Just Kidding, Your installation is complete, and your database is intact ;) Just that I love pranking people<br>
            	Enjoy your new skin!';
            echo '<br><h4>Oh, and don\'t forget to delete this file as it may possess great threat to your VA</h4>';
                }
    else
        {
            echo '<h4>Installation:</h4>';

            if(file_exists('../lib/skins/iCrewLITE'))
                {
                    echo '<h4><font color="#32CD32">Looks like iCrewLITE has already been installed. Go to your Admin Panel, select iCrew LITE to active skin and Enjoy!</font></h4>';
                    echo '<br><br><a href="'.SITE_URL.'/icrewinstall/index.php?func=install" class="button">FORCE REINSTALL</a><hr />';
                }
                else if($fileerr == 1) {
                	echo '<h4><font color="#FF0000">Certain Files are missing, Please re-upload and try again</font></h4>';
                }
                else
                {
                    echo '<h4><font color="#32CD32">Pre installation check complete, ready to install</font></h4>';
                    echo '<br><br><a href="?func=install" class="button">INSTALL</a><hr />';
                }
            }
    }
?>
							</p>
						</div>
					</div>
				</div><!-- contents__box END -->
			</div><!-- contents END -->
		</div>
	</section><!-- section END -->

	<section class="section section--bg"><!-- section -->
		<div class="content">
			<h2 class="title text-center">Do you like your new Crew Center? </h2>
			<div class="text-center">
				<a href="https://www.paypal.me/ICSAnsbert/5" target="_blank" class="intro__video">I want to get you a coffee and encourage more free stuff</a><br><br>
				<a href="mailto:kashrayks@gmail.com?Subject=I%20Want%20to%20hire%20you" target="_blank" class="button">I want to hire you</a><br><br>
				<a href="https://www.paypal.me/ICSAnsbert/5" target="_blank" class="intro__video">I can't do both, but i can give you a thumbs up</a>
			</div>
		</div>
	</section><!-- section END -->

	<footer>
			<img src="assets/img/bootstrap.jpg" alt=""><br>
			Created by iCrewSystems &copy; 2014-2018
			<br><br>
			<div class="socials">
				<a href="https://www.facebook.com/icrewsystems" target="_blank"><i class="socicon-facebook"></i></a>
				<a href="https://www.facebook.com/icrewsystems" target="_blank"><i class="socicon-github"></i></a>
			</div>
		</footer>

</div><!-- wrapper END -->

<div class="cover-layout"></div>

<script>
	// Bind as an event handler
	$(document).ready(function () {
		$(".intro__video").on('click', '[data-lightbox]', lity);
	});
</script>

<script>
	$('.contents__sidebar').fixedsticky();
</script>


</body>
</html>
