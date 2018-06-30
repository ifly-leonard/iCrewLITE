<?php require 'app_top.php' ?>

<section class="content-header">
    <h1>Dashboard</h1>
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
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo SITE_URL?>/lib/skins/crewcenter/dist/img/pilot.png" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname; ?></h3>

                    <p class="text-muted text-center"><?php echo $pilotcode; ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Rank</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->rank;?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Total Flights</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->totalflights?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Flight Hours</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->totalhours; ?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Transfer Hours</b> <p class="pull-right" style="color: #3C8DBC"><?php echo $userinfo->transferhours?></p>
                        </li>
                        <li class="list-group-item">
                            <b>Money</b> <p class="pull-right" style="color: #3C8DBC"><?php echo FinanceData::FormatMoney($userinfo->totalpay) ?></p>
                        </li>
                    </ul>

                    <a href="<?php echo url('profile/editprofile'); ?>" class="btn btn-primary btn-block"><b>Go to My Profile</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- middle col -->
        <section class="col-lg-7 connected">

            <!-- ALERT BAR >> UNCOMMENT TO DISPLAY ALERT TO ALL USERS ON DASHBOARD -->

            <!--

            <div class="callout callout-danger">
                <h4>Important Alert</h4>
                <p>This is an alert. Customise this text and uncomment to display the alert.</p>
            </div>

            -->
            
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Live Flights</h3>
                </div>
                <div class="box-body">
                    <?php require 'acarsmap.tpl' ?>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest News</h3>
                </div>
                <div class="box-body">
                    <?php MainController::Run('News', 'index', 5); ?>
                </div>
            </div>
        </section>
        <!-- middle col -->
        <!-- right col -->
        <section class="col-lg-2 connected">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo StatsData::TotalFlightsToday(); ?></h3>

                    <p>Flights Today</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plane"></i>
                </div>
            </div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Newest Pilots</h3>
                </div>
                <div class="box-body">
                    <?php MainController::Run('Pilots', 'RecentFrontPage', 5); ?>
                </div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

</section>
<!-- /.content -->

<?php require 'app_bottom.php' ?>

<!-- <div id="mainbox">
<h3>Pilot Center</h3>
<div class="indent">
<p><strong>Welcome back <?php echo $userinfo->firstname . ' ' . $userinfo->lastname; ?>!</strong></p>
<table>
<tr>
	<td valign="top" align="center">
		<img src="<?php echo PilotData::getPilotAvatar($pilotcode); ?>" />
		<br /><br />
		<img src="<?php echo $userinfo->rankimage ?>" />
	</td>
	<td valign="top">
		<ul style="margin-top: 0px;">
			<li><strong>Your Pilot ID: </strong> <?php echo $pilotcode; ?></li>
			<li><strong>Your Rank: </strong><?php echo $userinfo->rank;?></li>
			<?php
			if($report)
			{ ?>
				<li><strong>Latest Flight: </strong><a 
						href="<?php echo url('pireps/view/'.$report->pirepid); ?>">
						<?php echo $report->code . $report->flightnum; ?></a>
				</li>
			<?php
			}
			?>
			
			<li><strong>Total Flights: </strong><?php echo $userinfo->totalflights?></li>
			<li><strong>Total Hours: </strong><?php echo $userinfo->totalhours; ?></li>
			<li><strong>Total Transfer Hours: </strong><?php echo $userinfo->transferhours?></li>
			<li><strong>Total Money: </strong><?php echo FinanceData::FormatMoney($userinfo->totalpay) ?></li>
		
			<?php
			if($nextrank)
			{
			?>
				<p>You have <?php echo ($nextrank->minhours - $pilot_hours)?> hours 
					left until your promotion to <?php echo $nextrank->rank?></p>
			<?php
			}
			?>
		</ul>

	</td>
</tr>
</table>
	<table>
	<tr>
	<td valign="top" nowrap>
		<p>
			<strong>Profile Options</strong>
			<ul>
				<li><a href="<?php echo url('/profile/editprofile'); ?>">Edit My Profile, Email and Avatar</a></li>
				<li><a href="<?php echo url('/profile/changepassword'); ?>">Change my Password</a></li>
				<li><a href="<?php echo url('/profile/badge'); ?>">View my Badge</a></li>
				<li><a href="<?php echo url('/profile/stats'); ?>">My Stats</a></li>
				<li><a href="<?php echo url('/downloads'); ?>">View Downloads</a></li>
			</ul>
		</p>
		<p>
			<strong>Flight Operations</strong>
			<ul>
				<li><a href="<?php echo url('/pireps/mine');?>">View my PIREPs</a></li>
				<li><a href="<?php echo url('/pireps/routesmap');?>">View a map of all my flights</a></li>
				<li><a href="<?php echo url('/pireps/filepirep');?>">File a Pilot Report</a></li>
				<li><a href="<?php echo url('/schedules/view');?>">View Flight Schedules</a></li>
				<li><a href="<?php echo url('/schedules/bids');?>">View my flight bids</a></li>		
				<li><a href="<?php echo url('/finances');?>">View VA Finances</a></li>
			</ul>	
		</p>
		<p>
			<strong>My Awards</strong><br />
			<?php
			if(!$allawards)
			{
				echo 'No awards yet';
			}
			else
			{	
			
				/* To show the image:
					<img src="<?php echo $award->image?>" alt="<?php echo $award->descrip?>" />
				*/
							
			?>
			<ul>
				<?php foreach($allawards as $award){ ?>
				<li><?php echo $award->name ?></li>
				<?php } ?>
				
				
			</ul>	
			<?php
			}
			?>
		</p>
		<p>
			<strong>ACARS Config</strong>
			<ul>
				<li><a href="<?php echo actionurl('/acars/fsacarsconfig');?>">Download FSACARS Config</a></li>
				<li><a href="<?php echo actionurl('/acars/fspaxconfig');?>">Download FSPax Config</a></li>
				<li><a href="<?php echo actionurl('/acars/xacarsconfig');?>">Download XAcars Config</a></li>
				<li><strong>For FSFK, you need the following (Place in Documents/FS Flight Keeper/Templates): </strong></li>
				<li><a href="<?php echo actionurl('/fsfk/vaconfig_template');?>">VA-Template.txt</a></li>
				
			</ul>
		</p>
	</td>
	<td valign="top">
		
	</td>
	</tr></table>
</div>
</div>
<br /> -->