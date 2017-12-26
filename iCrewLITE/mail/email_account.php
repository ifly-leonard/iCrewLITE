<div class="col-md-3">
    <div class="card">
      <div class="header">
        <Strong>Your Mailing Account</Strong>
      </div>
      <div class="body">
      <?php echo Auth::$pilot->firstname.' '.Auth::$pilot->lastname; ?><br>
      Company Mail : <em><button class="btn btn-success waves-effect">@<?php echo Auth::$pilot->code.''.Auth::$pilot->pilotid; ?></button></em><br>
      </div>
    </div>
  </div>