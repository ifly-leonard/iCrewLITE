            <div class="block-header">
              <!--You can edit this to display any kind of welcome message to your Pilots-->
                <p class="alert alert-danger">
                  Hello <?php echo Auth::$userinfo->firstname; ?>, Welcome back to <?php echo SITE_NAME?> 
                </p>
            </div>

            <!-- Airline Stats Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">access_time</i>
                        </div>
                        <div class="content">
                            <div class="text">Today's Hours</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo StatsData::TodayHours(); ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">flight_takeoff</i>
                        </div>
                        <div class="content">
                            <div class="text">Today's flights</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo StatsData::TotalFlightsToday(); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">timelapse</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Hours</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo StatsData::TotalHours(); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">flight_land</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Flights</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo StatsData::TotalFlights(); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
                  <script>
                    function reload() {
                      location.reload();
                    }
                  </script>
            <!-- ACARS Map -->
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2><?php echo SITE_NAME?>'s ACARS Map</h2>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript::void(0);" onclick="reload();">Reload</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php require 'acarsmap.php' ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# ACARS Map -->
            
            <div class="row clearfix">
                
                <!-- VA News -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">LATEST VA NEWS</div>
                            <ul class="dashboard-stat-list">
                              <?php MainController::Run('PopUpNews', 'PopUpNewsList'); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# VA News -->
                <!-- Activity Feed -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">ACTIVITY FEED</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    <?php MainController::Run('Activity', 'frontpage', 2); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Activity Feed -->
                <!-- CrewCenter Updates -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="font-bold m-b--35">CREWCENTER CHANGELOG</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    v2.0.2 b - Beta Testing Completed
                                </li>
                                <li>
                                    v2.0 - Public release
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# CrewCenter Updates -->
            </div>
            
            <div class="row clearfix">
                 <!-- Focus Airport -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <?php Template::Show('focusairport/index.php'); ?>
                </div>
                <!-- #END# Basic Example -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Screenshot of the week</h2>
                        </div>
                        <?php MainController::Run('Screenshots','show_random_screenshot'); ?>
                    </div>
                </div>
            </div>
        