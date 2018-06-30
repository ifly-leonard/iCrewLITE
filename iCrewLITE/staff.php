<?php
// Hey, if you're reading this,it means you've followed the documentation correctly!
// From here on, things are pretty easy to set up. Just Edit the lines at your convenience,
// If you need to add more, feel free to do so, but there are things to remember
// 1. The last variable of your Array does NOT end with a ","
// 2. Donot miss a "," if you're adding more entries!
// -- you're good to go :)

define('VA_CEO', 'Leonard Selvaraja');
// Set your VA's CEO over here! This is important

//Rest of the staff positions go here
$staff_array = array(
  "COO"=>"Anup Simha",
  "Flight Operations"=>"Hardik Ramnani"
);


if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="card">
  <div class="header">
    <h3><?php echo SITE_NAME?> <br><small>Staff Team</small></h3>
  </div>
  <div class="body">
<table id="tabledlist" class="table table-hover">

<div class="col-md-12">
  <div class="info-box-4 hover-expand-effect">
      <div class="icon">
        <i class="material-icons col-red">favorite</i>
      </div>
    <div class="content">

        <div class="number"><?php echo VA_CEO ?></div>
        <div class="text">Chief Executive Officer</div>
      </div>
  </div>
</div>
    <thead>
      <tr>
        <th>Position</th>
	      <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($staff_array as $staff => $staff_value)
          {
            ?>
            <tr>
              <td>
                <?php echo $staff; ?>
              </td>
	            <td>
		            <?php echo $staff_value ?>
	            </td>
            </tr>
	          <?php
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
