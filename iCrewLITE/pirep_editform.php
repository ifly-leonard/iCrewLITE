<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>


<div class="card">
       <div class="header">
           <ul class="header-dropdown m-r--5">
               <li class="dropdown">
                   <a href="<?php echo url('/pireps/mine'); ?>" class="btn btn-info waves-effect">Go Back</a>
               </li>
           </ul>
           <h2>
              Edit PIREP Custom Fields
           </h2>
       </div>
       <div class="body">
         <div class="row">
       <div class="col-md-12">
           <div class="box box-primary">
               <div class="box-body table-responsive">                 
                 <form action="<?php echo url('/pireps/viewpireps');?>" method="post">
                 <?php
                 // List all of the custom PIREP fields
                 if(!$pirepfields)
                 {
                 	echo '<p>There are no custom fields to edit for PIREPs! Contact Admins</p>';
                 	return;
                 }

                 foreach($pirepfields as $field)
                 {
                 ?>
                 	<dt><?php echo $field->title ?></dt>
                 	<dd>
                 	<?php

                 	// Determine field by the type
                 	$value = PIREPData::GetFieldValue($field->fieldid, $pirep->pirepid);

                 	if($field->type == '' || $field->type == 'text')
                 	{
                 	?>
                 		<input type="text" name="<?php echo $field->name ?>" value="<?php echo $value ?>" />
                 	<?php
                 	}
                 	elseif($field->type == 'textarea')
                 	{
                 		echo '<textarea class="form-group" no-resize" name="'.$field->name.'">'.$value.'</textarea>';
                 	}
                 	elseif($field->type == 'dropdown')
                 	{
                 		$values = explode(',', $field->options);

                 		echo '<select class="form-group" name="'.$field->name.'">';
                 		foreach($values as $fvalue)
                 		{
                 			if($value == $fvalue)
                 			{
                 				$sel = 'selected="selected"';
                 			}
                 			else
                 			{
                 				$sel = '';
                 			}

                 			$value = trim($fvalue);
                 			echo '<option value="'.$fvalue.'" '.$sel.'>'.$fvalue.'</option>';
                 		}
                 		echo '</select>';
                 	}
                 	?>

                 	</dd>
                 	<?php
                 }
                 ?>

                 <br />
                 <input type="hidden" name="action" value="editpirep" />
                 <input type="hidden" name="pirepid" value="<?php echo $pirep->pirepid?>" />
                 <input class="btn btn-success waves-effect" type="submit" name="submit" value="Save fields" />
                 </form>
               </div>
           </div>
       </div>
   </div>
       </div>
     </div>
