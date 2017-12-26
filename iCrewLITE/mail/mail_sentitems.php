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
?>

 <div class="row">
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
        
       <Strong> Sent Items  </Strong>          
         <?php 
         $now = time();
         $time = date('H:i:s', $now);
         
         ?>
      </div>
      <div class="body">
      <table class="table table-hover">
        <?php
        if(!$mail) {
            echo '<tr><td colspan="5">You have no sent messages.</td></tr>';
        }
        else {
            ?>
            <tr>
                <th>Status</th>
                <th>To</th>
                <th>Subject</th>
                <th>Date sent</th>
                <th>Remove</th>
            </tr>
    <?php
        foreach($mail as $thread){
            if($thread->read_state=='0'){
                if($thread->deleted_state == '0'){
                    $status = 'env_closed.gif" alt="The recipiant has not read your message.';
                }else{
                    $status = 'env_closed_deleted.gif" alt="The recipiant did not read this message before deleting it.';
                }
            }else{
                if($thread->deleted_state == '0'){
                    $status = 'env_open.gif" alt="The recipiant has read your message.';
                }else{
                    $status = 'env_open_deleted.gif" alt="The recipiant has read and discarded your message.';
                }
            }
            $user = PilotData::GetPilotData($thread->who_to); $pilot = PilotData::GetPilotCode($user->code, $thread->who_to);
    ?>
            <tr>
                <td align="center"><img src="<?php echo SITE_URL?>/core/modules/Mail/mailimages/<?php echo $status;?>" border="0" /></td>
                <td align="center"><?php
                    if ($thread->notam=='1') {
                        echo 'NOTAM (All Pilots)';
                    }
                    else {
                        echo $user->firstname.' '.$user->lastname; ?> <?php echo $pilot;
                    } ?>
                </td>
            <td align="center"><a href="<?php echo SITE_URL ?>/index.php/Mail/item/<?php echo $thread->thread_id.'/'.$thread->who_to;?>"><?php echo $thread->subject; ?></a></td>
                <td align="center"><?php echo date(DATE_FORMAT.' h:ia', strtotime($thread->date)); ?></td>
                <td align="center"><a href="<?php echo SITE_URL ?>/index.php/Mail/sent_delete/?mailid=<?php echo $thread->id;?>"><img src="<?php echo SITE_URL?>/core/modules/Mail/mailimages/delete.gif" alt="Delete" border="0"/></a></td>

            </tr>
    <?php
    }
}
?>	
        </table>
      </div>
    </div>
  </div>
</div>
