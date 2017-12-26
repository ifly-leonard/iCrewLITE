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
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                  <script>
                    function reload() {
                      location.reload();
                    }
                  </script>
                    <a href="javascript::void(0);" onclick="reload();" class="btn btn-info waves-effect">Refresh</a>
                </li>
            </ul>
            <h2>
               EventsCenter <small><?php echo SITE_NAME?> Flight Ops</small>
            </h2>
        </div>
        <div class="body">
           <?php
            if(!$events)
            {
            ?>
              	<div class="media-heading">
            					<h4><strong> What's Next? </strong></h4>
            				</div>
            			<div class="widget-extra-full text-center">
            				<span class="h2 animation-expandOpen"></span>
            					
            				<img src="<?php echo SITE_URL?>/lib/skins/iCrewLITE/images/event_comingsoon.jpg" alt="Coming Soon!" style="max-width:100%; max-height:300px; outline:10px; text-decoration:none;">
            				<br><br>
            			<p class="text-center text-muted"><?php echo '#'.VA_TAGLINE; ?></p>
            		</div>
            			<?php
                }
             else
               {
              ?>
              <?php
              foreach($events as $event)
              {
              if($event->active == '2')
              {
              continue;
              }
              ?>
              <div class="media-heading">
            					<h4><strong> What's Next? </strong></h4>
            				</div>
            			<div class="widget-extra-full text-center">
            				<span class="h2 animation-expandOpen"></span>
            					
            	<img src="<?php echo $event->image?>" alt="<?php echo $event->title?>" style="max-width:100%; max-height:300px; outline:10px; text-decoration:none;">
            				<br><br>
              <p class="text-center text-muted"><?php echo $event->title?> </p>
              <p><a href="<?php echo SITE_URL ?>/index.php/events/get_event?id=<?php echo $event->id ?>" class="btn btn-info">Details</a></p>
        
<?php
}
?>
<center>
    <table class="table table-hover">
        <thead>
            <td width="25%"><b>Date:</b></td>
            <td width="60%"><b>Event:</b></td>
            <td><b>Details/Signups</b></td>
        </thead>
            <?php
            foreach($events as $event)
            {
                if($event->active == '2')
                {
                    continue;
                }
        echo '<tr><td>'.date('n/j/Y', strtotime($event->date)).'</td>';
        echo '<td>'.$event->title.'</td>';
        echo '<td><a class="btn btn-warning waves-effect" href="'.SITE_URL.'/index.php/events/get_event?id='.$event->id.'">Details/Signups</a></td></tr>';
    }
    ?>
    </table>
</center>
    <?php
}
?>



<hr />
<a class="btn btn-info btn-block" href="<?php echo url('/events/get_rankings'); ?>">Show Pilot Rankings For Events</a>
        </div>
    </div>
<div class="card">
	<div class="header">
		<h4><?php echo SITE_NAME; ?>'s Past Events</h4>
	</div>
	
	<?php
if(!$history)
{
    echo '<div class="alert alert-danger"><strong>Oops</strong><br>There are no past events at '.SITE_NAME.' </div>';
}
else
{
    echo '<table class="table table-hover">
        <thead>
            <td><b>Date:</b></td>
            <td><b>Event:</b></td>
            <td><b>Details</b></td>
            <td>View</td>
        </thead>';
        foreach($history as $event)
    {
        echo '<tr><td><span class="label label-info">'.date('d m Y', strtotime($event->date)).'</span></td>';
        echo '<td><h4 class="text-success"><Strong>'.$event->title.'</strong></h4></td>';
        echo '<td>'. $event->dep.' - '.$event->arr .' </td>';
        echo '<td> <a class="btn btn-xs btn-default" data-toggle="tooltip" title="" data-original-title="View Event" href="'.SITE_URL.'/index.php/events/get_past_event?id='.$event->id.'"><i class="fa fa-eye "></i></a></td>';
		echo '</tr>';
	}
    ?>
    <?php
}
?>
</table>
</div>