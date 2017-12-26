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
        
                    
         <?php 
         $now = time();
         $time = date('H:i:s', $now);
         
         if(isset($folder)) {
                echo '<td colspan="6" align="center"><b>'.$folder->folder_title.' folder </b>';
                echo '  <a class="btn btn-xs btn-warning pull-right" href="'.SITE_URL.'/index.php/Mail/editfolder/'.$folder->id.'">Edit Folder Name</a></td>';
                }
                else {echo '<td colspan="6" align="center"><b><em>INBOX</em> </b>  </td>';}
            ?>
      </div>
      <div class="body">
        
<?php if(!$mail) {
        echo '<tr><div class="alert alert-warning">You have no messages, why not send one to your colleuges?</div></tr>';
        echo '<span class="pull-right">Last Updated : <span class="text-success">'.$time.'z </span></span><br>';
        }
        else {
          echo '<center>
          <div class="table-responsive">
            <table class="table table-hover">
        <tr>
           
        </tr>
        <tr>
            <th>Status</th>
            <th>From</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>';
            foreach($mail as $data) {
                if ($data->read_state=='0') {
                    $status = 'env_closed.gif' ;
                }
                else {
                    $status = 'env_open.gif';
                }
                ?>
                <?php $user = PilotData::GetPilotData($data->who_from); $pilot = PilotData::GetPilotCode($user->code, $data->who_from); ?>
        <tr bgcolor="#eeeeee">
            <td align="center"><img src="<?php echo SITE_URL?>/core/modules/Mail/mailimages/<?php echo $status;?>" border="0" alt="Status" /></td>
            <td align="center"><?php echo "$user->firstname $user->lastname $pilot"; ?></td>
            <td align="center"><a href="<?php echo SITE_URL ?>/index.php/Mail/item/<?php echo $data->thread_id;?>"><?php echo $data->subject; ?></a></td>
            <td align="center"><?php echo date(DATE_FORMAT.' h:ia', strtotime($data->date)); ?></td>
            <td align="center"><a href="<?php echo SITE_URL ?>/index.php/Mail/delete/<?php echo $data->id;?>">
                <img src="<?php echo SITE_URL?>/core/modules/Mail/mailimages/delete.gif" alt="Delete" border="0"/></a></td>
        </tr>
<?php
}
?>
        <tr>
            <?php echo '<span class="pull-right">Last Updated : <span class="text-success">'.$time.'z </span></span><br>'; ?>
            <td align="center"><a class="btn btn-danger waves-effect" href="<?php echo url('/mail/delete_all/').$data->reciever_folder; ?>" onclick="return confirm('Delete All Inbox Messages?')">Delete All</a></td>
        </tr>
        <?php
        }
        ?>

    </table>
          </div>
        </center>
      </div>
    </div>
  </div>
</div>
