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

 
$pagination = new Pagination();
$pagination->setLink("screenshots?page=%s");
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setTotalRecords($total);
$screenshots = ScreenshotsData::getpagnated($pagination->getLimitSql());
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4>ScreenShot Gallery</h4>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table width="100%">
        <tr>
            <td width="50%" align="center">
                <?php
                if(Auth::LoggedIn())
                    {
                        if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                        {
                            echo '<form method="link" action="'.SITE_URL.'/index.php/screenshots/approval_list">
                                <input class="mail btn btn-success" type="submit" value="Screenshot Approval List"></form><br />';
                        }
                        echo '<form method="link" action="'.SITE_URL.'/index.php/screenshots/upload">
                        <input class="mail btn btn-info" type="submit" value="Upload A New Screenshot"></form></td>';
                     }
                     else
                     {
                         echo 'Login to rate or upload screenshots.';
                     }
                     ?>
            </td>
        </tr>
    </table>
        </div>
    
    <center>
<?php
if (!$screenshots) {echo '<div id="error">There are no screenshots in the database!</div>'; }
else {
    echo '<table class="table">';
    $tiles=0;
    foreach($screenshots as $screenshot) {
        $pilot = PilotData::getpilotdata($screenshot->pilot_id);
        if(!$screenshot->file_description)
        {$screenshot->file_description = 'Not Available';}
        if ($tiles == '0') { echo '<tr>'; }
        { 
          if($screenshot->rating == 1)
        {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i>';
        }
        else if ($screenshot->rating == 2) {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i>';
        }
        else if ($screenshot->rating == 3) {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i>';
        }
        else if ($screenshot->rating == 4) {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star_border</i>';
        }
        else if ($screenshot->rating == 5) {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>';
        }
        else if ($screenshot->rating > 5) {
          $rating = '<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>';
        }
        else {
          $rating = '<i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i><i class="material-icons">star_border</i>';
        }
        }
        $v = $screenshot->views;
        $limit = 100;
        if($v < $limit)
          {
            $views = $screenshot->views;
            $ratings = $rating;
          }
          else
          
          {
            $views = $screenshot->views;
            $ratings = '<i class="material-icons">trending_up</i> TRENDING';
          }
          
        echo '<td width="25%" valign="top"><br />
                  
                    <a href="javascript::void(0);">
                        <img src="'.SITE_URL.'/pics/'.$screenshot->file_name.'" border="0" width="auto;" height="169px" alt="By: '.$pilot->firstname.' '.$pilot->lastname.'" /></a>
                            <br />
                      <div class="btn-group" role="group">
                       <a class="btn bg-default waves-effect">'.$pilot->firstname.' '.$pilot->lastname.'</a>
                       <a class="btn bg-default waves-effect">'.date(DATE_FORMAT, strtotime($screenshot->date_uploaded)).'</a>
                       <div class="btn-group" role="group">
                       <a class="btn bg-default waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Options
                       <span class="caret"></span>
                       </a>
                       <ul class="dropdown-menu">
                          <li><a href="'.SITE_URL.'/index.php/Screenshots/large_screenshot?id='.$screenshot->id.'" class=" waves-effect waves-block">View Full</a></li>
                          <li><a href="'.SITE_URL.'/pics/'.$screenshot->file_name.'" class=" waves-effect waves-block" download>Download</a></li>
                       </ul>
                       </div>
                       </div> <br><br>
                       <button class="btn bg-blue btn-sm waves-effect" type="button"><i class="material-icons">visibility</i> <span class="badge">'.$views.'</span></button>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn bg-orange btn-sm waves-effect" type="button">'.$ratings.'</button>
                       
                </td>';
        $tiles++;
        if ($tiles == '4') {  echo '</tr>'; $tiles=0; }
    }
    echo '</table>';
}
$navigation = $pagination->create_links();
echo $navigation;
?>
    </center>
      </div>
    </div>
  </div>
</div>
