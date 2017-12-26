<div class="card">
                        <div class="header">
                          <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button class="btn btn-danger">
                                      Schedules Returned <span class="badge"><?php $cnt = count($allroutes) - 1; echo $cnt?>+</span>
                                    </button>
                                </li>
                            </ul>
                            <h2>
                                Schedule Results <small><?php echo SITE_NAME?> Flight Ops</small>
                            </h2>
                        </div>
                        <div class="body">
                           <?php
                    if(!$allroutes) {
                ?>    
                <div class="box-body">
                    <div class="callout callout-info">
                        <h4>No Results</h4>
                        Your search returned no results.
                    </div>
                </div>
                <?php
                    } else {
                ?>
                <div class="box-body table-responsive no-padding">
                    <table id="tabledlist" class="tablesorter table table-hover">
                        <thead>
                            <tr>
                                <th>Flight Information</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        foreach($allroutes as $route)
                        {

                            /* Uncomment this code if you want only schedules which are from the last PIREP that
                                pilot filed */
                            /*if(Auth::LoggedIn())
                            {
                                $search = array(
                                    'p.pilotid' => Auth::$userinfo->pilotid,
                                    'p.accepted' => PIREP_ACCEPTED
                                );

                                $reports = PIREPData::findPIREPS($search, 1); // return only one

                                if(is_object($reports))
                                {
                                    # IF the arrival airport doesn't match the departure airport
                                    if($reports->arricao != $route->depicao)
                                    {
                                        continue;
                                    }
                                }
                            }*/

                            /*
                            Skip over a route if it's not for this day of week
                            Left this here, so it can be omitted if your VA
                             doesn't use this. 

                            Comment out these two lines if you don't want to.
                            */

                            /*	Check if a 7 is being used for Sunday, since PHP
                                thinks 0 is Sunday */
                            $route->daysofweek = str_replace('7', '0', $route->daysofweek);

                            if(strpos($route->daysofweek, date('w')) === false)
                                continue;

                            /* END DAY OF WEEK CHECK */



                            /*
                            This will skip over a schedule if it's been bid on
                            This only runs if the below setting is enabled

                            If you don't want it to skip, then comment out
                            this code below by adding // in front of each 
                            line until the END DISABLE SCHEDULE comment below

                            If you do that, and want to show some text when
                            it's been bid on, see the comment below
                            */
                            if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0)
                            {
                                continue;
                            }
                            /* END DISABLE SCHEDULE ON BID */


                            /*	Skip any schedules which have aircraft that the pilot
                                is not rated to fly (according to RANK), only skip them if
                                they are logged in. */
                            if(Config::Get('RESTRICT_AIRCRAFT_RANKS') === true && Auth::LoggedIn())
                            {
                                /*	This means the aircraft rank level is higher than
                                    what the pilot's ranklevel, so just do "continue"
                                    and move onto the next route in the list 
                                 */
                                if($route->aircraftlevel > Auth::$userinfo->ranklevel)
                                {
                                    continue;
                                }
                            }

                            /* THIS BEGINS ONE TABLE ROW */
                        ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo url('/schedules/details/'.$route->id);?>"><?php echo $route->code . $route->flightnum?>
                                    <?php echo '('.$route->depicao.' - '.$route->arricao.')'?>
                                </a>
                                        <br />

                                        <strong>Departure: </strong>
                                        <?php echo $route->deptime;?> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Arrival: </strong>
                                            <?php echo $route->arrtime;?>
                                                <br />
                                                <strong>Equipment: </strong>
                                                <?php echo $route->aircraft; ?> (
                                                    <?php echo $route->registration;?>) <strong>Distance: </strong>
                                                        <?php echo $route->distance . Config::Get('UNITS');?>
                                                            <br />
                                                            <strong>Days Flown: </strong>
                                                            <?php echo Util::GetDaysCompact($route->daysofweek); ?>
                                                                <br />
                                                                <?php echo ($route->route=='') ? '' : '<strong>Route: </strong>'.$route->route.'<br />' ?>
                                                                    <?php echo ($route->notes=='') ? '' : '<strong>Notes: </strong>'.html_entity_decode($route->notes).'<br />' ?>
                                                                        <?php
                                # Note: this will only show if the above code to
                                #	skip the schedule is commented out
                                if($route->bidid != 0)
                                {
                                    echo 'This route has been bid on';
                                }
                                ?>
                                    </td>
                                    <td nowrap>
                                        <a class="btn btn-info" href="<?php echo url('/schedules/details/'.$route->id);?>">DETAILS</a>
                                        <br />
                                        <a class="btn btn-warning" href="<?php echo url('/schedules/brief/'.$route->id);?>">BRIEFING</a>
                                        <br />

                                        <?php 
                                # Don't allow overlapping bids and a bid exists
                                if(Config::Get('DISABLE_SCHED_ON_BID') == true && $route->bidid != 0)
                                {
                                ?>
                                            <a id="<?php echo $route->id; ?>" class="addbid btn btn-success" href="<?php echo actionurl('/schedules/addbid');?>">BID FLIGHT</a>
                                            <?php
                                }
                                else
                                {
                                    if(Auth::LoggedIn())
                                    {
                                     ?>
                                                <a id="<?php echo $route->id; ?>" class="addbid btn btn-success" href="<?php echo url('/schedules/addbid');?>">BID FLIGHT</a>
                                                <?php			 
                                    }
                                }		
                                ?>
                                    </td>
                                </tr>
                                <?php
                         /* END OF ONE TABLE ROW */
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <?php } ?>
                        </div>
                    </div><!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-3 connected">
            <div class="box box-primary">
                <div class="box-body">
                    <p>Click the button below to return to the search page.</p>
                    <a href="<?php echo url('/schedules/view'); ?>" class="btn btn-primary btn-flat">Return to Search</a>
                </div>
            </div>
        </section>
        <!-- /.Left col -->
        <!-- Middle col -->
        <section class="col-lg-9 connected">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Search Results</h3>
                </div>
                <!-- /.box-header -->
                
            </div>
            <!-- /.box -->
        </section>
        <!-- /.Second col -->
    </div>
    <!-- /.row (main row) -->