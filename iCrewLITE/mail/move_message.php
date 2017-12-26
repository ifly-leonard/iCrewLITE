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
<form action="<?php echo url('/Mail');?>" method="post" enctype="multipart/form-data">
    <center>
        <b>Move Message To:</b> 
    <select name="folder">
        <option value="0">AIRMail Inbox</option>
    <?php 
        if(isset($folders)) {foreach ($folders as $folder) {echo '<option value="'.$folder->id.'">'.$folder->folder_title.'</option>';}
    }?>
    </select>
    <input type="hidden" name="mail_id" value="<?php echo $mail_id ?>" />
    <input type="hidden" name="cur_folder" value="<?php echo $data->reciever_folder ?>" />
    <input type="hidden" name="action" value="move" />
    <input type="submit" value="Move" />
    </center>
</form>
<center>
    <b><font size="1.5px">| AIRmail3 &copy 2011 | <a href="http://www.simpilotgroup.com">simpilotgroup.com</a> |</font></b>
</center>