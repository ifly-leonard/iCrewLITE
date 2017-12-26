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
    	<h3>Past Event Review : <?php echo $event->title; ?></h3>
    </div>
    <table class="table table-hover">
        <?php
        if($event->image !='none') { ?>
        <tr>
            <td colspan="2"><img src="<?php echo $event->image; ?>" alt="Event Image" /></td>
        </tr>
    <?php
        }
        ?>
        <tr>
            <td width="25%">Event:</td>
            <td width="75%" align="left"><b><?php echo $event->title; ?></b></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td align="left"><?php echo $event->description; ?></td>
        </tr>
        <tr>
            <td>Scheduled Date:</td>
            <td align="left"><?php echo date('m/d/Y', strtotime($event->date)); ?></td>
        </tr>
        <tr>
            <td>Scheduled Start Time: (GMT)</td>
            <td align="left"><?php echo date('G:i', strtotime($event->time)); ?></td>
        </tr>
        <tr>
            <td>Departure Field:</td>
            <td align="left"><?php echo $event->dep; ?></td>
        </tr>
        <tr>
            <td>Arrival Field:</td>
            <td align="left"><?php echo $event->arr; ?></td>
        </tr>
        <tr>
            <td>Company Schedule:</td>
            <td align="left"><?php echo $event->schedule; ?></td>
        </tr>
        <tr>
            <td>Participants:</td>
            <td align="left">
        <?php
                if(!$signups)
                {
                    echo 'No Participants';
                }
                else
                {
                    foreach ($signups as $signup)
                        {
                            $pilot = PilotData::getPilotData($signup->pilot_id);
                            echo date('G:i', strtotime($signup->time)).' - ';
                            echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid).' - ';
                            echo $pilot->firstname.' '.$pilot->lastname.'<br />';
                         }
                }
        ?>
            </td>
        </tr>
    </table>
</div>
<h3><?php echo SITE_NAME; ?> Past Event</h3>
<center>
    <table border="1px" width="80%" cellpadding="3px">
        <?php
        if($event->image !='none') { ?>
        <tr>
            <td colspan="2"><img src="<?php echo $event->image; ?>" alt="Event Image" /></td>
        </tr>
    <?php
        }
        ?>
        <tr>
            <td width="25%">Event:</td>
            <td width="75%" align="left"><b><?php echo $event->title; ?></b></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td align="left"><?php echo $event->description; ?></td>
        </tr>
        <tr>
            <td>Scheduled Date:</td>
            <td align="left"><?php echo date('m/d/Y', strtotime($event->date)); ?></td>
        </tr>
        <tr>
            <td>Scheduled Start Time: (GMT)</td>
            <td align="left"><?php echo date('G:i', strtotime($event->time)); ?></td>
        </tr>
        <tr>
            <td>Departure Field:</td>
            <td align="left"><?php echo $event->dep; ?></td>
        </tr>
        <tr>
            <td>Arrival Field:</td>
            <td align="left"><?php echo $event->arr; ?></td>
        </tr>
        <tr>
            <td>Company Schedule:</td>
            <td align="left"><?php echo $event->schedule; ?></td>
        </tr>
        <tr>
            <td>Participants:</td>
            <td align="left">
        <?php
                if(!$signups)
                {
                    echo 'No Participants';
                }
                else
                {
                    foreach ($signups as $signup)
                        {
                            $pilot = PilotData::getPilotData($signup->pilot_id);
                            echo date('G:i', strtotime($signup->time)).' - ';
                            echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid).' - ';
                            echo $pilot->firstname.' '.$pilot->lastname.'<br />';
                         }
                }
        ?>
            </td>
        </tr>
    </table>
    <br />
    <a class="btn btn-info waves-effect" href="<?php echo SITE_URL; ?>/index.php/events"><b>Return To Events Listing</b></a>
</center>