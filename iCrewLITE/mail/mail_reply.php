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
        <?php foreach($mail as $data) ?>
       <Strong><?php $user = PilotData::GetPilotData($data->who_from); $pilot = PilotData::GetPilotCode($user->code, $data->who_from); ?>
               Recipent Code : @<?php echo $pilot; ?>
        </Strong>          
         <?php 
         $now = time();
         $time = date('H:i:s', $now);
         
         ?>
      </div>
      <div class="body">

       
        <form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="who_from" value="<?php echo Auth::$userinfo->pilotid ?>" />
        <input type="hidden" name="who_to" value="<?php echo $data->who_from; ?>" />
        <input type="hidden" name="oldmessage" value="<?php echo ' '.$data->thread_id.'<br /><br />'; ?>" />
                    
                <h2 class="card-inside-title">Subject </h2>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="subject" value="RE: <?php echo $data->subject;?>" disabled>
                    </div>
                </div>
                <h2 class="card-inside-title">You are replying to </h2>
                <div class="form-group">
                    <div class="form-line">
                         <?php echo $data->message; ?>
                    </div>
                </div>
                
                <h2 class="card-inside-title">Reply </h2>
                <div class="form-group">
                    <div class="form-line">
                         <textarea name="message" rows="10" cols="100" class="form-control" p></textarea>
                    </div>
                </div>
                <input type="hidden" name="who_from" value="<?php echo Auth::$userinfo->pilotid ?>" />
                    <input type="hidden" name="action" value="send" />
                    <input type="submit" class="btn btn-info waves-effect" value="Send">
              </form>
      </div>
    </div>
  </div>
</div>
