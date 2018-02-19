<?php $ranks = RanksData::getAllRanks(); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4>AirCrew <strong>Ranking</strong></h4>
			</div>
			<p class="alert alert-info">
				At <?php echo SITE_NAME ?>, pilots are automatically promoted once they reach the hours requirement for the Rank
			</p>
			<div class="body">
			  <div class="table-responsive">
				<table class="table table-hover">
         	<thead>
	            <h4>
	            	<tr>
		               <th>Rank Title</th>
	<th>Minimum Hours</th>
	<th>Rank Image</th>
	<th>Pay Rate</th>
	<th>Total Pilots</th>
	            	</tr>
	            </h4>
         	</thead>
         	<?php
foreach($ranks as $rank)
{
?>
         	<tbody>
	            <tr>
	            	<td align="center"><?php echo $rank->rank; ?></td>
	<td align="center"><?php echo $rank->minhours; ?></td>
	<td align="center"><img src="<?php echo $rank->rankimage; ?>" /></td>
	<td align="center"><?php echo Config::Get('MONEY_UNIT').$rank->payrate.'/hr'; ?></td>
	<td align="center"><?php echo $rank->totalpilots; ?></td>
			 </tr>
	         </tbody>
	         <?php } ?>
      	</table>
			</div>
			</div>

		</div>
	</div>
</div>
