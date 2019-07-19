<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_admin');
echo form_open_multipart(base_url('control/admins/update/'),$attributes);


echo form_hidden('id', $query->id);
?>
<legend><?php echo $title;?></legend>
<div class="well well-large well-transparent">


      <!-- Text input-->

      <div class="control-group">
      <label class="control-label">role id</label>
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
      		</select>

      		<?php echo form_error('role_id','<p class="error">', '</p>'); ?>
      	</div>
      </div>


			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Password</label>
			<div class="controls">
			<input value="" type="text" class="form-control" name="password" />
			<?php echo form_error('password','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Email</label>
			<div class="controls">
			<input value="<?php echo $query->email; ?>" type="text" class="form-control" name="email" />
			<?php echo form_error('email','<p class="error">', '</p>'); ?>
			</div>
			</div>


<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Actualizar</button>
	</div>
</div>

</fieldset>

<?php echo form_close(); ?>

</div>
