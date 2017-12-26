<?php
/* Show any extra fields
 */
if($extrafields)
{
	foreach($extrafields as $field)
	{
?>
    <div class="form-group">
        <?php
		if($field->type == 'dropdown')
		{
			echo '<select name=\"{$field->fieldname}\" class="form-control">';
			$values = explode(',', $field->value);
		
			if(is_array($values))
			{						
				foreach($values as $val)
				{
					$val = trim($val);
					echo "<option value=\"{$val}\">{$val}</option>";
				}
			}
			
			echo '</select>';
		}
		elseif($field->type == 'textarea')
		{
			echo '<textarea name="'.$field->fieldname.'" class="customfield_textarea form-control" placeholder="<?php echo $field->title; ?>"></textarea>';
		}
		else
		{
        ?>
        <input type="text" name="<?php echo $field->fieldname; ?>" value="<?php echo Vars::POST($field->fieldname);?>" placeholder="<?php echo $field->title; ?>" />
<?php	}
    }
}
?>