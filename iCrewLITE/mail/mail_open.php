<?php
//AIRMail3
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full icense text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2011, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?><div class="row">
  <?php Template::Show('mail/email_account.php'); ?>
  <div class="col-md-9">
    <div class="card">
      <div class="header">
        <script>
          function reload() {
            location.reload();
          }
        </script>
        <ul class="header-dropdown m-r--5">
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li> <a href="javascript::void(0);" onclick="reload();" class="waves-effect waves-block">Refresh</a></li>
                </ul>
            </li>
        </ul>
        <?php
            foreach ($mail as $data) {
        ?>
       <Strong>  <?php
                                if($data->who_to == Auth::$userinfo->pilotid){
                                    $user = PilotData::GetPilotData($data->who_from);
                                    $pilot = PilotData::GetPilotCode($user->code, $data->who_from);
                                    echo '<button href="javascript::void(0);" class="btn btn-info">From</button> ';
                                }
                                if($data->who_from == Auth::$userinfo->pilotid){
                                    $user = PilotData::GetPilotData($data->who_to);
                                    $pilot = PilotData::GetPilotCode($user->code, $data->who_to);
                                    echo '<button href="javascript::void(0);" class="btn btn-info">To</button>  ';
                                }
                                echo $user->firstname.' '. $user->lastname.' '.$pilot;
                            ?>
                            </Strong>     <br>
                            <button href="javascript::void(0);" class="btn btn-info"> Subject</button> <Strong><?php echo $data->subject; ?></Strong>
         <?php 
         $now = time();
         $time = date('H:i:s', $now);
         
         ?>
      </div>
      <div class="body">
         <table class="table">
        <tr>
                    <td colspan="4" align="left"><b>Message:</b><br /><br /><?php echo nl2br($data->message); ?><br /></td>
                </tr>

            <?php
            }
            ?>
    </table>
    <p>
     <a class="pull-left btn btn-success waves-effect" href="<?php echo SITE_URL ?>/index.php/Mail/reply/<?php echo $data->thread_id;?>">Reply</a>
     &nbsp; <a class="btn btn-success waves-effect" href="<?php echo SITE_URL ?>/index.php/Mail/move_message/<?php echo $data->id;?>">Move To Folder</a>
    <center><em><?php echo date(DATE_FORMAT.' h:ia', strtotime($data->date)); ?></em></center>
    
    </p>
      </div>
    </div>
  </div>
</div>
