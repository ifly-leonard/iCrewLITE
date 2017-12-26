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
                                Schedule Details <small><?php echo SITE_NAME?> Flight Ops</small>
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
                            <div class="number"><?php echo $schedule->code.$schedule->flightnum ?></div>
                            
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="info-box-4 hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons col-red">flight_takeoff</i>
                            </div>
                            <div class="content">
                                <div class="text"><?php echo strtoupper($schedule->depname); ?></div>
                                <div class="number"><?php echo $schedule->deptime ?></div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="info-box-4 hover-zoom-effect">
                            <div class="icon">
                                <i class="material-icons col-light-green">flight_land</i>
                            </div>
                            <div class="content">
                                <div class="text"><?php echo strtoupper($schedule->arrname); ?></div>
                                <div class="number"><?php echo $schedule->arrtime ?></div>
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
                        <strong>Departure: </strong><?php echo $schedule->depname ?> (<?php echo $schedule->depicao ?>) at <?php echo $schedule->deptime ?><br />
                        <strong>Arrival: </strong><?php echo $schedule->arrname ?> (<?php echo $schedule->arricao ?>) at <?php echo $schedule->arrtime ?><br />
                        <?php 
                          if($schedule->route!='')
                            { ?>
                              <strong>Route: </strong><?php echo $schedule->route ?><br />
                        <?php
                          }?>
                        <br />
                        <strong>Weather Information</strong><br>
                        
                           <div id="myProgress">
                            <div id="myBar"></div>
                          </div>
                        <!--<span class="foo">Leo</span>-->
                        <div id="reDep" class="foo">
                          Getting current METAR information for <?php echo $schedule->depicao ?>...
                        </div>
                        <div class="animation-fadeIn"id="depmetar" style="display: none;">
                          <strong>METAR Report for <?php echo $schedule->depicao ?></strong> <?php echo file_get_contents("http://wx.ivao.aero/metar.php?id=$schedule->depicao"); ?>
                        </div>
                        <div id="reArr" class="foo">
                          Getting current METAR information for <?php echo $schedule->arricao ?>...
                        </div>
                        <div id="arrmetar" style="display: none;">
                          <strong>METAR Report for <?php echo $schedule->arricao ?></strong> <?php echo file_get_contents("http://wx.ivao.aero/metar.php?id=$schedule->arricao"); ?>
                        </div>
                        <br />
                        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
                        <script type="text/javascript">
                          $('#depmetar').delay(5000).show(0).fadeIn(5000);
                          $('#arrmetar').delay(5000).show(0);   
                        </script>
                        </div>
                      <!-- /.box-body -->
                      </div>
                    </div><!-- Main row -->
   
    <!-- /.row (main row) -->
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
                          setTimeout(function(){
                         move();
                          },3000);
                          function targetGroup(className){
                          // loop throgh the elements
                          var elemArray = document.getElementsByClassName(className);
                          for(var i = 0; i < elemArray.length; i++){
                          elemArray[i].style.color = "#05a800";
                              }
                            }

                        setTimeout(function(){
                         targetGroup('foo');
                          },3000);
                          setTimeout('$("#myProgress").hide()',4500);
                          setTimeout('$("#reDep").hide()',2500);
                          setTimeout('$("#reArr").hide()',2500);
                        </script>