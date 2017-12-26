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
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4>ScreenShot Gallery<br><small>Upload a screenshot</small></h4>
      </div>
      <div class="body">
        <form action="<?php echo url('/Screenshots');?>" method="post" enctype="multipart/form-data">
    <table class="profiletop">
        <tr>
            <td width="50%" valign="top">
                <h5>Terms and Conditions</h5>
                <ul>
                    <li>By uploading your screenshots you give <?php echo SITE_NAME?> full permission to use your screenshots for the betterment of the VA</li>
                    <li>Your Screenshot will be rejected if it contains anything other than Flight Simulator Screenshots</li>
                </ul>
            </td>
            <td>
                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
                </p>

                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    <label for="file">File to upload:</label><br />
                    <input class="mail btn btn-info" id="file" type="file" name="uploadedfile" />
                </p>

                <p>
                    <label for="description">Enter a description for your screenshot:</label><br />
                    <textarea class="mail form-control" name="description" rows="5" cols="50"></textarea>
                </p>

                <p>
                    <input type="hidden" name="action" value="save_upload" />
                    <input class="mail btn btn-success waves-effect" type="submit" value="Upload File!">
                </p>
            </td>
        </tr>
    </table>
</form>
      </div>
    </div>
  </div>
</div>


