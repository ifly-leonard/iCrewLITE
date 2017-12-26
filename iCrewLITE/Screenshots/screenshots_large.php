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

$pilot = PilotData::getPilotData($screenshot->pilot_id);
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4>ScreenShot Gallery<br><small>View tool</small></h4>
      </div>
      <div class="body">
        <table>
        <tr>
            <td>
                <?php
                    $previous = ScreenshotsData::get_previous($screenshot->id);
                    if(!$previous)
                    {echo '&nbsp'; }
                    else
                    {
                ?>
                <form method="post" action="<?php echo SITE_URL ?>/index.php/Screenshots" >
                <input type="hidden" name="action" value="last" />
                <input type="hidden" name="id" value="<?php echo $previous->id; ?>" />
                <input class="mail btn btn-info waves-effect" type="submit" value="Previous Screenshot">
                </form>
                <?php
                    }
                    ?>
            </td>
            <td colspan="2" align="right">
                <?php
                    $next = ScreenshotsData::get_next($screenshot->id);
                    if(!$next)
                    {echo '&nbsp'; }
                    else
                    {
                ?>
                <form method="post" action="<?php echo SITE_URL ?>/index.php/Screenshots" >
                <input type="hidden" name="action" value="last" />
                <input type="hidden" name="id" value="<?php echo $next->id; ?>" />
                <input class="mail btn btn-info waves-effect" type="submit" value="Next Screenshot">
                </form>
                <?php
                    }
                    ?>
            </td>
        </tr>
        <tr>
          <?php  { 
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
          ?>
            <td width="70%"valign="top"><h4>Screenshot By: <?php echo $pilot->firstname.' '.$pilot->lastname.' - '.PilotData::GetPilotCode($pilot->code, $pilot->pilotid); ?></h4></td>
            
            <td>
                <button class="btn bg-orange btn-sm waves-effect" type="button"><?php echo $ratings ?></button>
            </td>
            <td  width="15%" valign="bottom">
                <?php
                    if(Auth::loggedin())
                    {
                    $boost = ScreenshotsData::check_boost(Auth::$userinfo->pilotid, $screenshot->id);
                    if($boost->total > 0)
                    {echo 'Already Rated, Thank you';}
                    else
                    {
                    ?>
                    <form method="post" action="<?php echo SITE_URL ?>/index.php/Screenshots/addkarma">
                    <input type="hidden" name="id" value="<?php echo $screenshot->id; ?>" />
                    <input class="mail" type="submit" value="Boost Rating"></form>
                    <?php
                    }
                    }
                    else
                    {echo 'Login To Rate Screenshot'; }
                    ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>Date Submitted:</b> <?php echo date('m/d/Y', strtotime($screenshot->date_uploaded)); ?><br />
                <b>Description:</b> <?php 
                                        if(!$screenshot->file_description)
                                        {echo 'Not Available';}
                                        else
                                        {echo $screenshot->file_description;} ?>
                <br /></td>
            <td align="center"><button class="btn bg-blue btn-sm waves-effect" type="button"><i class="material-icons">visibility</i> <span class="badge"><?php echo $views ?></span></button></td>
            <td>
                <!-- <form><input class="mail" type="button" value="Back To Gallery" onClick="history.go(-1);return true;"> </form> -->
                  <?php if(PilotGroups::group_has_perm(Auth::$usergroups, ACCESS_ADMIN))
                        { ?><a class="btn btn-danger waves-effect" href="<?php echo SITE_URL ?>/index.php/Screenshots/delete_screenshot?id=<?php echo $screenshot->id; ?>"><b>Delete Screenshot</b></a><?php } else {} ?>
                <a href="<?php echo SITE_URL ?>/index.php/Screenshots" class="btn btn-success waves-effect">Back To Gallery</a>
            </td>
        </tr>
        <tr>
            <td colspan="3"><hr /></td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <img src="<?php echo SITE_URL; ?>/pics/<?php echo $screenshot->file_name; ?>" width="920px" height="auto;"  alt="<?php echo $screenshot->file_description; ?>" />
            </td>
        </tr>
        <tr>
            <td colspan="3"><hr /></td>
        </tr>
        <tr>
            <td colspan="2"><h4>Comments:</h4></td>
            <td>Posted By:</td>
        </tr>
        <?php if(!$comments)
            {echo '<tr><td colspan="3">No Comments</td></tr>';}
            else
            {
                echo '<tr><td colspan="3"><hr class="comment" /></td></tr>';
                foreach($comments as $comment){
                    $pilot = PilotData::getPilotData($comment->pilot_id);
                    echo '<tr>';
                    echo '<td colspan="2">'.$comment->comment.'</td>';
                    echo '<td>'.$pilot->firstname.' '.$pilot->lastname.' - '.PilotData::getPilotCode($pilot->code, $pilot->pilotid).'</td>';
                    echo '</tr>';
                    echo '<tr><td colspan="3"><hr class="comment" /></td></tr>';
                }
            }
        ?>
        <tr>
            <td colspan="3"><hr /></td>
        </tr>
        <?php if(Auth::LoggedIn())
        { ?>
        <tr>
            <td colspan="3"><h4>Add A Comment:</h4></td>
        </tr>
        <tr>
            <td colspan="3">
                <br />
                <form action="<?php echo url('/Screenshots');?>" method="post" enctype="multipart/form-data">
                <textarea class="form-control" name="comment" cols="50" rows="4"></textarea>
                    <br /><br />
                    <input type="hidden" name="id" value="<?php echo $screenshot->id; ?>" />
                    <input type="hidden" name="action" value="add_comment" />
                        <input  type="submit" class="mail btn btn-info wave-effect"value="Add Comment">
                </form>
            </td>
        </tr>
        <?php }
        else
        { ?>
        <tr>
            <td colspan="3">Login to add a comment</td>
        </tr>
        <?php } ?>
    </table>
      </div>
    </div>
  </div>
</div>

