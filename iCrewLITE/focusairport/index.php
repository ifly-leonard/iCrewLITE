  <?php 
    // Set the Focus Airport here :
    $icao = 'OMDB';
    // Set the Image URL here : 
    $url = SITE_URL.'/lib/skins/iCrewLITE/focusairport/dxb.jpg';
  ?>
  
  <div class="card">
    <div class="header">
      <h2>Focus Airport</h2>
    </div>
    <div class="body">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        
      <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <!--You can edit it below this-->
            <img src="<?php echo $url; ?>" />
          <div class="carousel-caption">
            <h3>#FOCUSAIRPORT</h3> 
            <p>This week's focus airport is <strong><?php echo $icao ?></strong></p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>