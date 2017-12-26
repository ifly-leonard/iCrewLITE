<?php
//AIRMail3
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2011, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?>
<center>
<?php
    if ($items > 0)
		{
			echo '<img src="'.SITE_URL.'/core/modules/Mail/mailimages/new_mail.gif" border="0" /><br />';
			echo 'You Have Mail';
		}
		else
		{
			echo 'You have no new mail';
		}
?>
</center>