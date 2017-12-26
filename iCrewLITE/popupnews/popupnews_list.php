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

<li><?php
    foreach($news as $item) {
        
    }
     $hashtag_string = str_replace(['!', '\\', '/', '*', ' '], '',$item->subject);
     $lowercase = strtolower($hashtag_string);
     echo '<a href="'.SITE_URL.'/index.php/PopUpNews/popupnewsitem/'.$item->id.'"><font color="white">#'.$lowercase.'</font></a>';
     $posted_month = date(m, $item->postdate);
     $current_month = date('m');
     if($posted_month == $current_month)
     {
      echo '<span class="pull-right">
        <i class="material-icons">trending_up</i>
      </span>'; 
     }
     else
     {
       '';
     }
     
?></li>

		<!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
		<!--echo '
		<div class="alert alert-success">
		    
		    <i class="fa fa-info-circle fa-fw"></i> <a href="'.SITE_URL.'/index.php/PopUpNews/popupnewsitem/'.$item->id.'">'.$item->subject.'</a><br>
		    <small> Published on <b>'.date(DATE_FORMAT, $item->postdate).'</b> by '.$item->postedby.'</small>
		</div>
		';-->