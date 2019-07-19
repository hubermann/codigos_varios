<!-- Text input-->
<div class="control-group">
<label class="control-label">Nickname</label>
<div class="controls">
	<input value="<?php echo $query->nickname; ?>" type="text" class="form-control" name="nickname" />
	<?php echo form_error('nickname','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Password</label>
<div class="controls">
	<input value="<?php echo $query->password; ?>" type="text" class="form-control" name="password" />
	<?php echo form_error('password','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Salt</label>
<div class="controls">
	<input value="<?php echo $query->salt; ?>" type="text" class="form-control" name="salt" />
	<?php echo form_error('salt','<p class="error">', '</p>'); ?>
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
<!-- Text input-->
<div class="control-group">
<label class="control-label">Apellido</label>
<div class="controls">
	<input value="<?php echo $query->apellido; ?>" type="text" class="form-control" name="apellido" />
	<?php echo form_error('apellido','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Nombre</label>
<div class="controls">
	<input value="<?php echo $query->nombre; ?>" type="text" class="form-control" name="nombre" />
	<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Dni</label>
<div class="controls">
	<input value="<?php echo $query->dni; ?>" type="text" class="form-control" name="dni" />
	<?php echo form_error('dni','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Sexo</label>
<div class="controls">
	<input value="<?php echo $query->sexo; ?>" type="text" class="form-control" name="sexo" />
	<?php echo form_error('sexo','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Nacimiento</label>
<div class="controls">
	<input value="<?php echo $query->nacimiento; ?>" type="text" class="form-control" name="nacimiento" />
	<?php echo form_error('nacimiento','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Estado_civil</label>
<div class="controls">
	<?php $options_estado_civil = [0=> "Soltero", 1=>"Casado", 2=>"Separado", 3=>"Viudo"]; 
	echo form_dropdown('estado_civil', $options_estado_civil,$query->estado_civil);
	?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Educacion</label>
<div class="controls">
	<input value="<?php echo $query->educacion; ?>" type="text" class="form-control" name="educacion" />
	<?php echo form_error('educacion','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Ocupacion</label>
<div class="controls">
	<input value="<?php echo $query->ocupacion; ?>" type="text" class="form-control" name="ocupacion" />
	<?php echo form_error('ocupacion','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Celular_cia</label>
<div class="controls">
	<input value="<?php echo $query->celular_cia; ?>" type="text" class="form-control" name="celular_cia" />
	<?php echo form_error('celular_cia','<p class="error">', '</p>'); ?>
</div>
</div>
<!-- Text input-->
<div class="control-group">
<label class="control-label">Tel_citas</label>
<div class="controls">
	<input value="<?php echo $query->tel_citas; ?>" type="text" class="form-control" name="tel_citas" />
	<?php echo form_error('tel_citas','<p class="error">', '</p>'); ?>
</div>
</div>
