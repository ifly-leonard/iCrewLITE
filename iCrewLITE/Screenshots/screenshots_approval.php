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

echo '<br /><center>';
if (!$screenshots)
{
    echo '<div id="error">There are no screenshots awaiting approval</div>';
    echo '<form method="link" action="'.SITE_URL.'/index.php/Screenshots">
                <input class="mail" type="submit" value="Back To Gallery"></form>';
    }
else
{
foreach($screenshots as $screenshot)
    {
        $pilot = PilotData::getpilotdata($screenshot->pilot_id);
        
        echo '<form action="'.SITE_URL.'/index.php/Screenshots" method="post" enctype="multipart/form-data">';
       echo '<table class="profiletop">';
       echo '<tr>
                <td>
                    <img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" width="400px" height="300px" alt="screenshot" /><br /><br />
                </td>
                <td>
                    File Name: '.$screenshot->file_name.'<br /><br />
                    Submited By: '.$pilot->firstname.' '.$pilot->lastname.' - '.PilotData::getpilotcode($pilot->code, $pilot->pilotid).'<br /><br />
                    Date: '.date('m/d/Y', date(strtotime($screenshot->date_uploaded))).'<br /><br />
                    Description: '.$screenshot->file_description.'<br /><br />
                    <input type="hidden" name="file" value="'.$screenshot->file_name.'" />
                    <input type="hidden" name="id" value="'.$screenshot->id.'" />
                    <input type="hidden" name="pid" value="'.$pilot->pilotid.'" />
                    <input type="hidden" name="action" value="approve_screenshot" />
                    <input class="mail" type="submit" value="Approve Screenshot!">
                    </form>
                    <br /><br />
                    <form action="'.SITE_URL.'/index.php/Screenshots" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="file" value="'.$screenshot->file_name.'" />
                    <input type="hidden" name="id" value="'.$screenshot->id.'" />
                    <input type="hidden" name="pid" value="'.$pilot->pilotid.'" />
                    <input type="hidden" name="action" value="reject_screenshot" />
                    <input class="mail" type="submit" value="Reject Screenshot">
                </td>';
          echo '</tr>';
          echo '</table></form>';

    }
}
 echo '</center>';
?>