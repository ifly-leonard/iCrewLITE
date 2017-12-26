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
    <table width="100%" cellspacing="1" cellpadding="5" border="1">
        <tr bgcolor="#cccccc">
            <td>Current Folder Name</td>
            <td colspan="2">New Folder Name</td>
        </tr>
        <tr>
            <td><?php echo $folder->folder_title; ?></td>
            <td colspan="2"><input type="text" name="folder_title" value="<?php echo $folder->folder_title; ?>" /></td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <input type="hidden" name="folder_id" value="<?php echo $folder->id; ?>" />
                <input type="hidden" name="action" value="confirm_edit_folder" />
                <input type="submit" value="Edit Folder" />
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b><font size="1.5px">| AIRmail3 &copy 2011 | <a href="http://www.simpilotgroup.com">simpilotgroup.com</a> |</font></b></td>
        </tr>
    </table>
</form>