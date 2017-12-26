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
?>
<div class="card">
   <div class="header">
     <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <a href="<?php echo url('/events'); ?>" class="btn btn-info waves-effect">Back</a>
                </li>
            </ul>
   	<h3>TEST<?php echo $event->title; ?></h3>
   </div>
    <table class="table table-striped">
        <?php
        if($event->image !='none') { ?>
        <tr align="center">
            <td colspan="2"><img src="<?php echo $event->image; ?>" alt="Event Image" height="250" width="auto;" /></td>
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
        <tr class="info">
            <td>Company Schedule:</td>
            <td align="left"><?php echo $event->schedule; ?></td>
        </tr>
<?php
        if(!Auth::LoggedIn()) {
            ?>
        <tr class="success">
            <td>Current Signups:</td>
            <td align="left">
    <?php
    $count=0;
                    if (!$signups) {
                        echo 'No Signups required for this event';
                    }
                    else {
                        foreach ($signups as $signup) {
                            $pilot = PilotData::getPilotData($signup->pilot_id);
                            echo date('G:i', strtotime($signup->time)).' - ';
                            echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid).' - ';
                            echo $pilot->firstname.' '.$pilot->lastname.'<br />';
                            $count++;
                        }
                    }
                    ?>
            </td>
        </tr>
                    <?php
                }
                else { ?>
        <tr class="success">
    <?php
            $check = EventsData::check_signup(Auth::$userinfo->pilotid, $event->id);
            if($check->total >= '1') {
                echo '<td>You have Already Signed Up For This Event</td>';

        echo '<td align="left">';
                    $slot_time = strtotime($event->time);
                    $slots=1;
                    while ($slots <= $event->slot_limit):
                        $test = date('G:i',$slot_time);
                        $check2 = EventsData::signup_time($event->id, $test);
                        if(!$check2) {
                            echo date('G:i', $slot_time).' - Open<br />';
                            $slots++;
                        }
                        else {
                            $pilot = PilotData::getPilotData($check2->pilot_id);
                            echo date('G:i', $slot_time).' - ';
                            echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid).' - ';
                            echo $pilot->firstname.' '.$pilot->lastname;
                            if($pilot->pilotid == Auth::$pilotid)
                            {echo ' <a class="btn btn-danger waves-effect" href="'.SITE_URL.'/index.php/events/remove_signup?id='.$pilot->pilotid.'&event='.$event->id.'">- Remove</a>';}
                            echo '<br />';
                        }
                        $slot_time = $slot_time + ($event->slot_interval * 60);

                    endwhile;
                    echo '</td>';
                }
                else {
                    echo '<td>Available Signups</td>';

                    echo '<td align="left">';
                    $slot_time = strtotime($event->time);
                    $slots=1;
                    while ($slots <= $event->slot_limit):
                        $test = date('G:i',$slot_time);
                        $check2 = EventsData::signup_time($event->id, $test);
                        if(!$check2) {
                            echo date('G:i', $slot_time).' - <a class="btn btn-info waves-effect" href="'.SITE_URL.'/index.php/events/signup?eid='.$event->id.'&pid='.Auth::$userinfo->pilotid.'&time='.date('G:i', $slot_time).'">Open</a><br />';
                            $slots++;
                        }
                        else {
                            $pilot = PilotData::getPilotData($check2->pilot_id);
                            echo date('G:i', $slot_time).' - ';
                            echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid).' - ';
                            echo $pilot->firstname.' '.$pilot->lastname.'<br />';
                        }
                        $slot_time = $slot_time + ($event->slot_interval * 60);

                    endwhile;
                    echo '</td>';
                    ?>
        </tr>
                    <?php
                }
            }
            ?>
    </table>
    <br />
</div>