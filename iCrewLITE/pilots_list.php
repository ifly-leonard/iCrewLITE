<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="card">
  <div class="header">
    <h3><?php echo $title?></h3>
  </div>
  <div class="body">
    <?php
if(!$pilot_list) {
	echo 'There are no pilots in this hub!</div></div>';
	return;
}
?>
<table id="tabledlist" class="table table-hover">
<thead>
<tr>
	<th>Pilot ID</th>
	<th>Name</th>
	<th>Rank</th>
	<th>Flights</th>
	<th>Hours</th>
	<th>Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($pilot_list as $pilot)
{
	/* 
		To include a custom field, use the following example:

		<td>
			<?php echo PilotData::GetFieldValue($pilot->pilotid, 'VATSIM ID'); ?>
		</td>

		For instance, if you added a field called "IVAO Callsign":

			echo PilotData::GetFieldValue($pilot->pilotid, 'IVAO Callsign');		
	 */
	 
	 // To skip a retired pilot, uncomment the next line:
	 //if($pilot->retired == 1) { continue; }
?>
<tr>
	<td width="1%" nowrap>
			<?php echo PilotData::GetPilotCode($pilot->code, $pilot->pilotid)?>
	</td>
	<td>
		<img src="<?php echo Countries::getCountryImage($pilot->location);?>" 
			alt="<?php echo Countries::getCountryName($pilot->location);?>" />
			
		<?php echo $pilot->firstname.' '.$pilot->lastname?>
	</td>
	<td><img src="<?php echo $pilot->rankimage?>" alt="<?php echo $pilot->rank;?>" /></td>
	<td><?php echo $pilot->totalflights?></td>
	<td><?php echo Util::AddTime($pilot->totalhours, $pilot->transferhours); ?></td>
	<td><a  href="<?php echo url('/profile/view/'.$pilot->pilotid);?>" class="btn btn-info btn-xs waves-effect"><i class="material-icons">remove_red_eye</i></a></td>
<?php
}
?>
</tbody>
</table>
  </div>
</div>

