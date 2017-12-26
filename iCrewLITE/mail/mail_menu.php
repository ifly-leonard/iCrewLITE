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
<?php if(isset($message)) {

?>
<div class="alert alert-success">
<?php echo $message.'<br>';  ?>
</div>

<?php
} 
?>

<div class="row">
  <div class="col-md-3">
    
  </div>
  <div class="col-md-9">
    <center>
      <table>
    <tr>
        <td align="center">
            <a href="<?php echo SITE_URL ?>/index.php/Mail" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="Inbox"><i class="material-icons">inbox</i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo SITE_URL ?>/index.php/Mail/newmail" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="Compose New" ><i class="material-icons">create</i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo SITE_URL ?>/index.php/Mail/newfolder" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="New Folder" ><i class="material-icons">create_new_folder</i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo SITE_URL ?>/index.php/Mail/deletefolder" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="Delete Folder" ><i class="material-icons">delete</i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo SITE_URL ?>/index.php/Mail/settings" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="Settings" ><i class="material-icons">build</i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo SITE_URL ?>/index.php/Mail/sent" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="Sent Items" ><i class="material-icons">sms</i></a>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
                if (isset($folders)) {foreach ($folders as $folder) {echo '<a class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" title="'.$folder->folder_title.'" href="'.SITE_URL.'/index.php/Mail/getfolder/'.$folder->id.'"><i class="material-icons">folder_open</i></a>'; echo ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}
                }
                ?>
            
        </td>
    </tr>
    </table>
    </center>
  </div>
</div>
<br>
