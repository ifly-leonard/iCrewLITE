<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2010, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/

    if (!$screenshot)
        {echo 'You Have Not Submitted<br />Any Screenshots'; }
    else
        {
            echo '<b>Your Latest Submission</b><br />
            <img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" height="125px" width="180px" alt="Random Screenshot" />
            <br />Submitted On - '.$date;
        }
?>
