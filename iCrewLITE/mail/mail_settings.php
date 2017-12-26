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
        
       <Strong> Settings  </Strong>          
         <?php 
         $now = time();
         $time = date('H:i:s', $now);
         
         ?>
      </div>
      <div class="body">
        
    <form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
      <h2 class="card-inside-title">Recive e-mail's whenever you have a new message?</h2>
                 <div class="form-group">
                    <div class="form-line">
                         <select name="email" class="form-control">
        <option value="0">No</option>
        <option value="1"<?php if(MailData::send_email(Auth::$userinfo->pilotid) === TRUE){echo 'selected="seclected"';} ?>>Yes</option>
    </select>
    
                    </div>
                </div>
                <input type="hidden" name="action" value="save_settings" />
    <input type="submit" class="btn btn-info waves-effect" value="Save" />
                
    </form>
      </div>
    </div>
  </div>
</div>


