<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="card">
  <div class="header">
    <h3><?php echo SITE_NAME?> <br><small>Staff Team</small></h3>
  </div>
  <div class="body">
<table id="tabledlist" class="table table-hover">

<?php
function staff() {
        $sql = "SELECT * FROM `phpvms_pilots` WHERE staff = 1; ";
				return DB::get_results($sql);
        
      }
     
$pilot_list = staff(); ?>
<div class="col-md-12">
  <div class="info-box-4 hover-expand-effect">
      <div class="icon">
        <i class="material-icons col-red">favorite</i>
      </div>
    <div class="content">
        
        <div class="number"><?php VA_CEO ?></div>
        <div class="text">Chief Executive Officer</div>
      </div>
  </div>
</div>

<?php
echo '<thead>
<tr>
  <th>Position</th>
	<th>Name</th>
</tr>
</thead>
<tbody>';
foreach($pilot_list as $pilot)
{
$posn = $pilot->comment;	if($posn == 'Chief Executive Officer') { return;}
?>
<tr>
  <td>
    <?php echo $posn; ?>
  </td>
	<td>
		<?php echo $pilot->firstname.' '.$pilot->lastname?>
	</td>
	<?php
}
?>
</tbody>
</table>
  </div>
</div>

