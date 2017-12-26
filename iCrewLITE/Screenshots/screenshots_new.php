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

$pilot = PilotData::getPilotData($screenshot->pilot_id);

echo '<center>';
echo '<img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" style="max-width: 170px;" alt="Newest Screenshot" />
                <br />Submitted By '.PilotData::GetPilotCode($pilot->code, $screenshot->pilot_id)
    .'<br />';
echo $date;
echo '</center>';
?>
