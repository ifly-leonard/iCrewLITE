<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
        }

        #myBar {
            width: 1%;
            height: 30px;
            background-color: #009907;
        }
    </style>
    <div class="card">
        <div class="header">
            <ul class="header-dropdown m-r--5">
                <li class="dropdown">
                    <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Route ID : <span class="badge">#<?php echo $schedule->id; ?></span></button>
                    <a href="<?php echo url('/schedules/view'); ?>" class="btn btn-info waves-effect">Return to Search</a>
                </li>
            </ul>
            <h2>
              Schedule Briefing <small><?php echo SITE_NAME?> Flight Ops</small>
            </h2>
        </div>
        <div class="body">
            <div class="box-body no-padding">
                <div class="info-box-3 bg-teal hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">airplanemode_active</i>
                    </div>
                    <div class="content">
                        <div class="text">FLIGHT#</div>
                        <div class="number">
                            <?php echo $schedule->code.$schedule->flightnum ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box-4 hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons col-red">flight_takeoff</i>
                            </div>
                            <div class="content">
                                <div class="text">
                                    <?php echo strtoupper($schedule->depname); ?>
                                </div>
                                <div class="number">
                                    <?php echo $schedule->deptime ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box-4 hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons col-light-green">flight_land</i>
                            </div>
                            <div class="content">
                                <div class="text">
                                    <?php echo strtoupper($schedule->arrname); ?>
                                </div>
                                <div class="number">
                                    <?php echo $schedule->arrtime ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="well">
                    <?php if(!$schedule->route) { echo 'Route not found, report to flight ops. Till that, Use <a href="http://rfinder.asalink.net/free/">this</a> as an alternate. We are sorry for the inconvenience'; } else
                      {
                        echo '<span class="text-muted">'.$schedule->depicao.' SID </span>  '.$schedule->route.'  <span class="text-muted">STAR '.$schedule->arricao.'</span>';
                      }
                      ?>
                </div>
                <div class="indent">
                    <strong>Departure: </strong>
                    <?php echo $schedule->depname ?> (
                        <?php echo $schedule->depicao ?>) at
                            <?php echo $schedule->deptime ?>
                                <br />
                                <strong>Arrival: </strong>
                                <?php echo $schedule->arrname ?> (
                                    <?php echo $schedule->arricao ?>) at
                                        <?php echo $schedule->arrtime ?>
                                            <br />
                                            <?php
                                              if($schedule->route!='')
                                                { ?>
                                                <strong>Route: </strong>
                                                <?php echo $schedule->route ?>
                                                    <br />
                                                    <?php
                                                       }?>
                                                        <br />
                                                        <div> <strong>Weather Information</strong>
                                                            <br>
                                                            <div id="myProgress">
                                                                <div id="myBar"></div>
                                                            </div>
                                                            <div id="reDep" class="foo">
                                                                Getting current METAR information for
                                                                <?php echo $schedule->depicao ?>...
                                                            </div>
                                                            <div class="animation-fadeIn" id="depmetar" style="display: none;">
                                                                <strong>METAR Report for <?php echo $schedule->depicao ?></strong>
                                                                <?php echo file_get_contents("http://wx.ivao.aero/metar.php?id=$schedule->depicao"); ?>
                                                            </div>
                                                            <div id="reArr" class="foo">
                                                                Getting current METAR information for
                                                                <?php echo $schedule->arricao ?>...
                                                            </div>
                                                            <div id="arrmetar" style="display: none;">
                                                                <strong>METAR Report for <?php echo $schedule->arricao ?></strong>
                                                                <?php echo file_get_contents("http://wx.ivao.aero/metar.php?id=$schedule->arricao"); ?>
                                                            </div>
                                                            <br />
                                                            <a target="_blank" href="https://uk.flightaware.com/live/airport/<?php echo $schedule->depicao; ?>" class="btn btn-info waves-effect">View Live Airport Traffic</a>
                                                            <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
                                                            <script type="text/javascript">
                                                                $('#depmetar').delay(5000).show(0).fadeIn(5000);
                                                                $('#arrmetar').delay(5000).show(0);
                                                            </script>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <!-- Main row -->
                                                </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                          Airport Charts
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Departure</a></li>
                            <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="true">Arrival</a></li>
                        </ul>
                        <!--Please don't mess with this, for your sake and mine :) -Leonard-->
                        <?php
                            function fakeip()
                            {
                            return long2ip( mt_rand(0, 65537) * mt_rand(0, 65535) );
                            }
                            function getdata($url,$args=false)
                            {
                            global $session;
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL,$url);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".fakeip(),"X-Client-IP: ".fakeip(),"Client-IP: ".fakeip(),"HTTP_X_FORWARDED_FOR: ".fakeip(),"X-Forwarded-For: ".fakeip()));
                            if($args)
                            {
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                            }
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            //curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888");
                            $result = curl_exec ($ch);
                            curl_close ($ch);
                            return $result;
                            }
                        ?>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">
                                    <?php
                                    $result=getdata("https://api.openaviationdata.com/v4/Airport/$schedule->depicao/Charts");
                                    $depdata = json_decode($result,true);
                                    $depcharts = count($depdata['charts']);
                                    if($depcharts > 0) {


                                  ?>
                                  <small>Available Charts <span class="badge"><?php echo $depcharts; ?></span></small>
                                    <table class="table">
                                      <thead>
                                        <th>Chart Name</th>
                                        <th>Options</th>
                                      </thead>
                                      <tbody>
                                          <?php
                                            //print_r ($total_charts);
                                          $i = $depcharts;
                                          for ($var = 0; $var < $i; $var++) {
                                          echo '<tr><td>'.$depdata['charts'][$var]['name'].'</td>
                                                <td><a class="btn btn-success waves-effect" href="'.$depdata['charts'][$var]['url'].'">Download</a></td>
                                                </tr>';
                                          }
                                        ?>
                                      </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in">
                                    <?php
                                    $result=getdata("https://api.openaviationdata.com/v4/Airport/$schedule->arricao/Charts");
                                    $depdata = json_decode($result,true);
                                    $depcharts = count($depdata['charts']);
                                  ?>
                                        <small>Available Charts <span class="badge"><?php echo $depcharts; ?></span></small>
                                        <table class="table">
                                            <thead>
                                                <th>Chart Name</th>
                                                <th>Options</th>
                                            </thead>
                                            <tbody>
                                              <?php
                                              //print_r ($total_charts);
                                                $i = $depcharts;
                                                for ($var = 0; $var < $i; $var++) {
                                                echo '<tr><td>'.$depdata['charts'][$var]['name'].'</td>
                                                <td><a class="btn btn-success waves-effect" href="'.$depdata['charts'][$var]['url'].'">Download</a></td>
                                                </tr>';
                                                }
                                              } else {
                                                echo 'Unable to retrive charts at the moment!';
                                              }
                                              ?>
                                            </tbody>
                                        </table>
                                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">The Route ID</h4>
                    </div>
                    <div class="modal-body">
                        If you wish to report any specific errors in this route, contact the admins <a href="<?php echo SITE_URL?>/index.php/help">here</a> with this route ID. It will be easier for them to fix the error.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">OKAY</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Dont mess with this too :) Again, -Leonard-->
        <script>
            function move() {
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + '%';
                    }
                }
            }
            setTimeout(function() {
                move();
            }, 3000);

            function targetGroup(className) {
                // loop throgh the elements
                var elemArray = document.getElementsByClassName(className);
                for (var i = 0; i < elemArray.length; i++) {
                    elemArray[i].style.color = "#05a800";
                }
            }

            setTimeout(function() {
                targetGroup('foo');
            }, 3000);
            setTimeout('$("#myProgress").hide()', 4500);
            setTimeout('$("#reDep").hide()', 2500);
            setTimeout('$("#reArr").hide()', 2500);
        </script>
