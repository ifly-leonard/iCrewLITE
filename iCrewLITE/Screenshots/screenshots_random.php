<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2010, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
/*echo '<b>Random Screenshot!</b><br />
      <img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" height="125px" width="180px" alt="Random Screenshot" />
     <br />Submitted By '.$pilot->firstname.' - '.PilotData::GetPilotCode($pilot->code, $screenshot->pilot_id)
    .'<br />On - ';
echo $date;*/
$pilot = PilotData::getPilotData($screenshot->pilot_id);

?>
<div class="body">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <a href="screenshots">
          <div class="item active">
          <?php echo '<img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" height="auto;" width="100%" alt="Random Screenshot" />'; ?>
        </div>
        </a>
      </div>
     <br> <p class="text-center text-muted">Click to view in full quality</p>
  </div>
  
</div>