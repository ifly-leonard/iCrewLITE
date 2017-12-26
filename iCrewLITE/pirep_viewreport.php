<?php require 'app_top.php' ?>

<section class="content-header">
    <h1>Flight Report</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connected">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo SITE_URL?>/lib/skins/crewcenter/dist/img/airplane.png" alt="User profile picture">

                    <h3 class="profile-username text-center">Flight <?php echo $pirep->code . $pirep->flightnum; ?></h3>

                    <p class="text-muted text-center">Submitted by <?php echo $pirep->firstname.' '.$pirep->lastname?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Departure Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->depname?> (<?php echo $pirep->depicao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Arrival Airport</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->arrname?> (<?php echo $pirep->arricao; ?>)</p>
                        </li>
                        <li class="list-group-item">
                            <b>Aircraft</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->aircraft . " ($pirep->registration)"?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Time</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $pirep->flighttime; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Date Submitted</b> <p class="pull-right" style="color: #3C8DBC"><?php echo date(DATE_FORMAT, $pirep->submitdate);?></p>
                        </li>
                        <?php
                            if($pirep->route != '')
                            {
                                echo '<li class="list-group-item"><b>Route</b> <p class="pull-right" style="color: #3C8DBC">'.$pirep->route.'</p></li>';
                            }
                        ?>
                        <li class="list-group-item"><b>Status</b>
                            <?php
                                if($pirep->accepted == PIREP_ACCEPTED)
                                    echo '<div class="label label-success pull-right">Accepted</div>';
                                elseif($pirep->accepted == PIREP_REJECTED)
                                    echo '<div class="label label-danger pull-right">Rejected</div>';
                                elseif($pirep->accepted == PIREP_PENDING)
                                    echo '<div class="label label-info pull-right">Approval Pending</div>';
                                elseif($pirep->accepted == PIREP_INPROGRESS)
                                    echo '<div class="label label-warning pull-right">Flight in Progress</div>';
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Flight Details</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Gross Revenue</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Fuel Cost</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?></p>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- Middle col -->
        <section class="col-lg-6 connected">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Route Map</h3>
                </div>
                <div class="box-body">
                    
                <!-- </div>
            </div>
        </section>
    </div>
</section> -->



<!--

<h3>Flight <?php echo $pirep->code . $pirep->flightnum; ?></h3>

<table width="100%">
<tr>

<td width="50%">
<ul>
	<li><strong>Submitted By: </strong><a href="<?php echo SITE_URL.'/index.php/profile/view/'.$pirep->pilotid?>">
			<?php echo $pirep->firstname.' '.$pirep->lastname?></a></li>
	<li><strong>Departure Airport: </strong><?php echo $pirep->depname?> (<?php echo $pirep->depicao; ?>)</li>
	<li><strong>Arrival Airport: </strong><?php echo $pirep->arrname?> (<?php echo $pirep->arricao; ?>)</li>
	<li><strong>Aircraft: </strong><?php echo $pirep->aircraft . " ($pirep->registration)"?></li>
	<li><strong>Flight Time: </strong> <?php echo $pirep->flighttime; ?></li>
	<li><strong>Date Submitted: </strong> <?php echo date(DATE_FORMAT, $pirep->submitdate);?></li>
	<?php
	if($pirep->route != '')
	{
		echo "<li><strong>Route: </strong>{$pirep->route}</li>";
	}
	?>
	<li><strong>Status: </strong>
		<?php

		if($pirep->accepted == PIREP_ACCEPTED)
			echo 'Accepted';
		elseif($pirep->accepted == PIREP_REJECTED)
			echo 'Rejected';
		elseif($pirep->accepted == PIREP_PENDING)
			echo 'Approval Pending';
		elseif($pirep->accepted == PIREP_INPROGRESS)
			echo 'Flight in Progress';
		?>
	</li>
</ul>
</td>
<td width="50%" valign="top" align="right">
<table class="balancesheet" cellpadding="0" cellspacing="0" width="100%">

	<tr class="balancesheet_header">
		<td align="" colspan="2">Flight Details</td>
	</tr>
	<tr>
		<td align="right">Gross Revenue: <br /> 
			(<?php echo $pirep->load;?> load / <?php echo FinanceData::FormatMoney($pirep->price);?> per unit  <br />
		<td align="right" valign="top"><?php echo FinanceData::FormatMoney($pirep->load * $pirep->price);?></td>
	</tr>
	<tr>
		<td align="right">Fuel Cost: <br />
			(<?php echo $pirep->fuelused;?> fuel used @ <?php echo $pirep->fuelunitcost?> / unit)<br />
		<td align="right" valign="top"><?php echo FinanceData::FormatMoney($pirep->fuelused * $pirep->fuelunitcost);?></td>
	</tr>
	</table>
</td>
</tr>
</table>

<?php
if($fields)
{
?>
<h3>Flight Details</h3>			
<ul>
	<?php
	foreach ($fields as $field)
	{
		if($field->value == '')
		{
			$field->value = '-';
		}
	?>		
		<li><strong><?php echo $field->title ?>: </strong><?php echo $field->value ?></li>
<?php
	}
	?>
</ul>	
<?php
}
?>

<?php
if($pirep->log != '')
{
?>
<h3>Additional Log Information:</h3>
<p>
	<?php
	/* If it's FSFK, don't show the toggle. We want all the details and pretty
		images showing up by default */
	if($pirep->source != 'fsfk')
	{
		?>
	<p><a href="#" onclick="$('#log').toggle(); return false;">View Log</a></p>
	<p id="log" style="display: none;">
	<?php
	}
	else
	{
		echo '<p>';
	}
	?>
		<div>
		<?php
		# Simple, each line of the log ends with *
		# Just explode and loop.
		$log = explode('*', $pirep->log);
		foreach($log as $line)
		{
			echo $line .'<br />';
		}
		?>
		</div>
	</p>
</p>
<?php
}
?>

<?php
if($comments)
{
echo '<h3>Comments</h3>
	<table id="tabledlist" class="tablesorter">
<thead>
<tr>
<th>Commenter</th>
<th>Comment</th>
</tr>
</thead>
<tbody>';

foreach($comments as $comment)
{
?>
<tr>
	<td width="15%" nowrap><?php echo $comment->firstname . ' ' .$comment->lastname?></td>
	<td align="left"><?php echo $comment->comment?></td>
</tr>
<?php
}

echo '</tbody></table>';
}
?>

-->