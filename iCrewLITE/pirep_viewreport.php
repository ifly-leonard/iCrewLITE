<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>


<div class="card">
       <div class="header">
           <ul class="header-dropdown m-r--5">
               <li class="dropdown">
                   <a href="<?php echo url('/pireps/mine'); ?>" class="btn btn-info waves-effect">Go Back</a>
               </li>
           </ul>
           <h2>
              Flight Details
           </h2>
       </div>
       <div class="body">
         <div class="row">
           <h3 class="profile-username text-center"><?php echo $pirep->code . $pirep->flightnum; ?></h3>

           <p class="text-muted text-center">Flown by <?php echo $pirep->firstname.' '.$pirep->lastname?></p>
       <div class="col-md-6">
         <div class="box box-primary">
             <div class="box-body box-profile">
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
       </div>
       <div class="col-md-6">
         <div class="box box-primary">
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
          <?php
           $existing_comments = PIREPData::getComments($pirep->pirepid);
           foreach ($existing_comments as $comment) {
             ?>
             <blockquote>
                 <?php echo $comment->comment; ?>
                 <br>
                 <small><?php echo $comment->firstname.' '.$comment->lastname; ?> on <?php echo date(DATE_FORMAT, $comment->postdate); ?></small>
             </blockquote>
             <?php
           }
           ?>
           <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
              View Flight Log
            </button>
            <div class="collapse" id="collapseExample" aria-expanded="false" style="height: 0px;">
              <div class="well">
                <?php if($pirep->log != ''){
                  $log = explode('*', $pirep->log);
              		foreach($log as $line)
              		{
              			echo $line .'<br />';
              		}
                }

                ?>
              </div>
            </div>
       </div>

       <div class="col-md-12">
         <div class="box box-primary">
             <div class="box-header with-border">
                 <h3 class="box-title">Route Map</h3>
             </div>
             <div class="box-body">
               <?php
               Template::Show('route_map.php')
               ?>
              </div>
         </div>
       </div>
   </div>
       </div>
     </div>
