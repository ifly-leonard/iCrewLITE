<div class="row">
  <div class="col-md-4">
		<div class="card">
			<div class="header">
				<h2><i class="fa fa-user"> </i>  Pilot <strong>Info</strong> </h2>
			</div>
			<div class="body">
				<a href="javascript:void(0)">
					<img src="http://icrew.iflyva.in/lib/skins/iCrew/img/placeholders/avatars/pilot_profile_pic.jpg" alt="avatar" class="img-circle">
				</a>
			<h3 class="">
				<strong>  &nbsp;<?php echo $pilot->firstname . '</strong> ' . $pilot->lastname?>
			</h3>
			<i>Joined on :  <?php $newdate = date('d-m-Y', strtotime($pilot->joindate)); echo $newdate;  ?></i><br>
			<span class="label label-primary"><?php echo $pilot->code;?><?php echo $pilot->pilotid;?></span>
			
			</div>
		</div>
	</div>
	
	<div class="col-md-8">
		<div class="card">
			<div class="header">
				<h3><strong>Pilot </strong>Details</h3>
			</div>
			<div class="body">
			  <table class="table table-borderless table-striped table-vcenter animation-fadeIn">
			<tbody>
				<tr>
				<td class="text-right"><strong>Airline Rank</strong></td>
				<td><?php echo $pilot->rank ?></td>
				</tr>
			
			<tr>
				<td class="text-right" style="width: 50%;"><strong>Base Airport</strong></td>
				<td><?php echo $pilot->hub ?></td>
			</tr>
			
			<tr>
				<td class="text-right"><strong>IVAO VID</strong></td>
				<td><?php $ivao = PilotData::GetFieldValue($pilot->pilotid, 'IVAO'); 
					if ($ivao > "0")
					{
						echo '<a target="_blank" class="text-success" href="https://www.ivao.aero/Member.aspx?Id='.$ivao.'">'.$ivao.'</a>';
					}
					else 
					{
						echo '<span class="text-muted">Not Provided</span>';
					}
					?></td>
			</tr>
			<tr>
				<td class="text-right"><strong>VATSIM CID</strong></td>
				<td><?php $vatsim = PilotData::GetFieldValue($pilot->pilotid, 'VATSIM'); 
					if ($vatsim > "0")
					{
						echo $vatsim;
					}
					else 
					{
						echo '<span class="text-muted">Not Provided</span>';
					}
				?></td>
			</tr>
			
			<tr>
				<td class="text-right"><strong>Pilot Origin </strong></td>
				<td><?php echo '<img src="'.Countries::getCountryImage($pilot->location).'" alt="'.Countries::getCountryName($pilot->location).'" />'?> (<?php echo $pilot->location; ?>)</td>
			</tr>
			<tr>
				<td class="text-right"><strong>Total Pay </strong></td>
				<td><i class="fa fa-inr"></i> <?php $number = $pilot->totalpay;
						echo number_format($number, 0, '.', ','); ?> /-</td>
			</tr>
			<tr>
				<td class="text-right"><strong>Status</strong></td>
				<td>
					<?php 
					$status = $pilot->retired;
					if ($status < 1)
					{
					 	echo'<span class="label label-success"><i class="fa fa-check"></i> Active </span>';
					}
					else 
					{
						echo '<span class="label label-danger"><i class="gi gi-power"></i> Retired </span>';
					}
					?>
				</td>
			</tr>
		</tbody>
	</table>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h3><strong>Pilot</strong> Statistics</h3>
			</div>
			<div class="body">
			  <div class="row">
			    <?php $lastpirep = PIREPData::getLastReports($pilot->pilotid, 1, PIREP_ACCEPTED);
			if(!$lastpirep)
			{ ?>
			    <p class="alert alert-info">
            Oops, looks like there is nothing to calculate from. No worries, we'll have something to show you when <strong><?php echo $pilot->firstname; ?></strong> files a PIREP
          </p>
    <?php } ?>
			<div class="col-sm-3">
				<!-- Widget -->
	        	<div class="widget-simple">
	                		<h3 class="widget-content text-center text-warning animation-pullDown visible-lg">
	                    		 <strong><?php echo $pilot->totalhours; ?></strong>
	                    		<br><small>Total Hours</small>
	                		</h3>
	            		</div>
	        	<!-- END Widget -->
			</div>
			<div class="col-sm-3">
				<!-- Widget -->
	        		<div class="widget-simple">
	                		<h3 class="widget-content text-center animation-pullDown visible-lg">
	                    		 <strong><?php echo $pilot->totalflights; ?></strong>
	                    		<br><small>Total Flights</small>
	                		</h3>
	            		</div>
	        	<!-- END Widget -->
			</div>
			<div class="col-sm-3">
				<!-- Widget -->
				<?php $last_location = PIREPData::getLastReports($pilot->pilotid, 1, PIREP_ACCEPTED);
									$icao = $last_location->arricao; ?>
	        		<div class="widget-simple">
	                		<h3 class="widget-content text-center text-danger animation-pullDown visible-lg">
	                    		 <strong><?php $last_location = PIREPData::getLastReports($pilot->pilotid, 1, PIREP_ACCEPTED);
									$icao = $last_location->arricao; 
										if(!$last_location) {
								echo $pilot->hub;
								} else { echo $icao; ?><?php
								} ?></strong>
	                    		<br><small>Current Location </small>
	                		</h3>
	            		</div>
	        	<!-- END Widget -->
			</div>
			<div class="col-sm-3">
				<!-- Widget -->
	        		<div class="widget-simple">
	                		<h3 class="widget-content text-center text-success animation-pullDown visible-lg">
	                    		 <strong><?php $newdate = date(DATE_FORMAT, strtotime($pilot->lastlogin)); echo $newdate;  ?></strong>
	                    		<br><small>Last Active</small>
	                		</h3>
	            		</div>
	        	<!-- END Widget -->
			</div>
			  </div>
			</div>
    </div>
	</div>



<div class="row">
	<div class="col-md-12">
		 <div class="card ">
            <!-- Quick Stats Title -->
            <div class="header">
                <h2><strong>Recent</strong>  Flights</h2>
            </div>
            
            <div class="col-md-12">
				 <h2 class="text-center"><font face="bauhaus"><?php echo SITE_NAME?></font><br><h3 class="text-center"><small>ICAO Style Log book</small></h3></h2><br><hr size="30">
            </div>
		 <h4 class="text-center"><small>Belongs to </small><br><strong><?php echo $pilot->firstname . ' ' . $pilot->lastname?></strong></h4><hr size="30">
		 <h4 class="text-center text-success">
                        <small> Total Log hours</small><br><strong><?php echo $userinfo->totalhours;?></strong> <br><hr>
                        <h4 class="text-center"><small>Endorsements  <br></small> <strong>Airbus A320</strong> </h4><hr>
          
         <Center>
         	<button type="button" class="btn btn-alt btn-default" data-toggle="modal" data-target="#myModal">Open</button>
         </Center><br>
        </div>
        
   </div>
</div>	
 
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><font face="Bauhaus"><?php echo SITE_NAME?></font><br>PIREP Logbook<br><small>Belongs to <?php echo  $pilot->firstname.' '.$pilot->lastname;?></small></h4>
      </div>
      <div class="modal-body">
        <p>
		    <?php
				$pilotid = $userinfo->pilotid;
				$reports = PIREPData::getLastReports($pilotid, 500,'');
			?>
			<?php
			if(!$reports) {
				echo '
	            <div class="alert alert-info">
	                <h3 class="font-w300 push-15">Information</h3>
	                <p>Oops, No Reports Found for this Pilot.</p>
	            </div></div></div></div>
				';
				return;
			}
			?>
			<div class="table-responsive">
				<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">Operating Crew<br><h5 class="text-center"><small>P1 / P2</small></h5></th>
						<th class="text-center">Flight Number</th>
						<th class="text-center">Date of Flight (DOF)</th>
						<th class="text-center">Departure (DEP)</th>
						<th class="text-center">Arrival (ARR)</th>
						<th class="text-center">Hours of Flight (HOF)</th>
						<th class="text-center">Passengers On Board (POB)</th>
						<th class="text-center">Landing Rate</th>
						<th class="text-center">Fuel Used</th>
						
					</tr>
				</thead>
				<?php
				foreach($reports as $report)
				{
				?>
				<tr>
					<th class="text-center">P1 : <small><?php echo $pilot->firstname . ' ' . $pilot->lastname?></small></th>
					<td class="text-center"><a href="<?php echo url('/pireps/view/'.$report->pirepid);?>"><?php echo $report->code . $report->flightnum; ?></a></td>
					<td class="text-center"><?php echo $report->submitdate; ?></td>
					<td class="text-center"><?php echo $report->depicao; ?></td>
					<td class="text-center"><?php echo $report->arricao; ?></td>
					<td class="text-center"><?php echo $report->flighttime; ?> Hrs</td>
					<td class="text-center"><?php echo $report->load; ?> pax</td>
					<td class="text-center"><?php echo $report->landingrate; ?> fpm</td>
					<td class="text-center"><?php echo $report->fuelused; ?> Kgs</td>
					
					<?php
					}
					?>
					
				</tr>
				
				
			</table>
			</div>
			</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>