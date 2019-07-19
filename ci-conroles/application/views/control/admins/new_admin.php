<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_admin');
echo form_open_multipart(base_url('control/admins/create/'),$attributes);
echo form_hidden('admin[id]');
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

<!-- Text input-->
	<div class="control-group">
		<label class="control-label">role</label>
		<div class="controls">

			<select name="role_id" id="role_id">
				<?php  
				$roles = $this->role->get_records_menu();
				if($roles){

					foreach ($roles as $value) {
						if($query->role_id == $value->id){$sel= "selected";}else{$sel="";}
						echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
					}
				}
				
				?>

				?>
			</select>

			<?php echo form_error('role_id','<p class="error">', '</p>'); ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="control-group">
		<label class="control-label">Password</label>
		<div class="controls">
			<input value="<?php echo set_value('password'); ?>" class="form-control" type="text" name="password" />
			<?php echo form_error('password','<p class="error">', '</p>'); ?>
		</div>
	</div>

	<!-- Text input-->
	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<input value="<?php echo set_value('email'); ?>" class="form-control" type="text" name="email" />
			<?php echo form_error('email','<p class="error">', '</p>'); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button class="btn" type="submit">Crear</button>
		</div>
	</div>



</fieldset>

<?php echo form_close(); ?>

</div>
