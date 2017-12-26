<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full license text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2010, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?>
<div class="card">
    <div class="header">
    	<h4>EventCenter<br><small>Pilots Attendance Statistics</small></h4>
    </div>
    
    <?php
    if(!$rankings)
    {
        echo '<p class="alert alert-info">We haven\'t conducted any events yet. We will have something to show when we do.</p>';
    }
    else
    {
      echo'<table class="table table-hover">
        <thead>
            <th>Pilot</th>
            <th># Of Events Attended</th>
        </thead>';
    foreach($rankings as $rank)
        {
        $pilot = PilotData::getPilotData($rank->pilot_id);

        echo '<tr><td>'.PilotData::getPilotCode($pilot->code, $pilot->pilotid).' - '.$pilot->firstname.' '.$pilot->lastname.'</td><td>'.$rank->ranking.'</td></tr>';
    }
    }
    ?>
    </table>
</div>
