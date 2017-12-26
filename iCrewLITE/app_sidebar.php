<!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="http://dl.iflyva.in/img/pilot_avatar.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo Auth::$pilot->firstname.' '.Auth::$pilot->lastname; ?></div>
                    <div class="email"><?php echo Auth::$userinfo->code.' '.Auth::$userinfo->pilotid; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo SITE_URL?>/index.php/profile"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo SITE_URL?>/index.php/profile/editprofile"><i class="material-icons">build</i>Settings</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo SITE_URL?>/index.php/logout"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="<?php echo SITE_URL?>/index.php/profile">
                            <i class="material-icons">home</i>
                            <span>Dasboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">airplanemode_active</i>
                            <span>Flight Operations</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/schedules">
                                    <span>Schedule Search</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/schedules/bids">
                                    <span>Current Bookings</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/pireps/mine">
                                    <span>Airline Logbook</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL?>/index.php/events">
                          <i class="material-icons">event</i>
                             <span>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL?>/index.php/mail">
                          <i class="material-icons">mail</i>
                            <span>AIR Mail</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Corporate</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/ranks">
                                    <span>AirCrew Ranking</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/pilots">
                                    <span>Pilot Roster</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo SITE_URL?>/index.php/staff">
                                    <span>Staff Team</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                         <a href="<?php echo SITE_URL?>/index.php/screenshots">
                            <i class="material-icons">photo_camera</i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <?php echo SITE_NAME?> &copy; <?php echo date("Y"); ?><br>
                    powered by <a href="www.phpvms.net">phpVMS</a><br>
                </div>
                <div class="version">
                    <b>Version: </b> <?php echo PHPVMS_VERSION; ?>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Pilots Online</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">Quick Access</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <?php
                              $usersonline = StatsData::UsersOnline();
                              $guestsonline = StatsData::GuestsOnline();
                            ?>
                                <h5><?php      
                                    $shown = array();
                                    foreach($usersonline as $pilot) 
                                    { 
                                    if(in_array($pilot->pilotid, $shown))
                                    continue;
                                    else
                                    $shown[] = $pilot->pilotid; 
                                    echo "<p>";
                                    echo '<img src="'.SITE_URL.'/lib/skins/iCrewLITE/images/online.png" alt="avatar" style="width: 10px;" /> &nbsp; ';
                                    echo $pilot->firstname.' '.$pilot->lastname.'<br />'; 
                                    echo "</p>";
                                    }
                                    ?>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <ul class="setting-list">
                            <li>
                               <a target="_blank" href="http://webeye.ivao.aero" class="btn btn-info waves-effect">WebEye LIVE</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <a target="_blank" href="https://vatmap.jsound.org" class="btn btn-info waves-effect">VatMap LIVE</a>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>