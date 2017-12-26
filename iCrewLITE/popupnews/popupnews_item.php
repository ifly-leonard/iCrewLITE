<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2012, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?>
<!-- Article Content -->
<div class="row">
    <div class="col-md-12">
        <!-- Article Block -->
        <div class="card">
          <div class="header">
            <h3><strong><?php echo $item->subject;?></strong></h3>
          </div>
          <div class="body">
            <!-- Article Content -->
            <article>
              <?php 
                    
                    $currtime = $item->postdate;
			              $currnet_time_stamp = strtotime($currtime);
                    $time =  date('H:i:s', $currnet_time_stamp); 
                    $date =  date('d-m-Y', $currnet_time_stamp); 
                    
                    ?>
                <p class="sub-header pull-left">Posted by : <span class="label label-info"><?php echo $item->postedby;?></span> <br></p>
                <p class="sub-header pull-right">Posted on : <span class="text-muted"><?php echo $date; ?></span> <br></p>
                
                <p><?php echo $item->body;?></p>
            </article>
            <!-- END Article Content -->
          </div>
        </div>
        <!-- END Article Block -->
    </div>
</div>
<!-- END Article Content -->