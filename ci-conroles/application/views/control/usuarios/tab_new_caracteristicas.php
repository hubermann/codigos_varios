<!-- Text input-->
<div class="control-group">
	<label class="control-label">Provincia</label>
	<div class="controls">
		<?php
		echo form_dropdown('provincia', $this->config->item('provincias_list'), $query->provincia);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Cod_postal</label>
	<div class="controls">
		<input value="<?php echo $query->cod_postal; ?>" type="text" class="form-control" name="cod_postal" />
		<?php echo form_error('cod_postal','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Zodiaco</label>
	<div class="controls">
		<?php
			echo form_dropdown('zodiaco', $this->config->item('options_zodiaco'),$query->zodiaco);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Estatura</label>
	<div class="controls">
		<input value="<?php echo $query->estatura; ?>" type="text" class="form-control" name="estatura" />
		<?php echo form_error('estatura','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Peso</label>
	<div class="controls">
		<input value="<?php echo $query->peso; ?>" type="text" class="form-control" name="peso" />
		<?php echo form_error('peso','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Contextura_fisica</label>
	<div class="controls">
		<?php echo form_dropdown('contextura_fisica', $this->config->item('contextura_fisica'),$query->contextura_fisica); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Color_pelo</label>
	<div class="controls">
		<input value="<?php echo $query->color_pelo; ?>" type="text" class="form-control" name="color_pelo" />
		<?php echo form_error('color_pelo','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Color_ojos</label>
	<div class="controls">
		<input value="<?php echo $query->color_ojos; ?>" type="text" class="form-control" name="color_ojos" />
		<?php echo form_error('color_ojos','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Edad</label>
	<div class="controls">
		<input value="<?php echo $query->edad; ?>" type="text" class="form-control" name="edad" />
		<?php echo form_error('edad','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Profesion</label>
	<div class="controls">
		<input value="<?php echo $query->profesion; ?>" type="text" class="form-control" name="profesion" />
		<?php echo form_error('profesion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Fuma</label>
	<div class="controls">
		<?php $options_fuma = [0=> "No", 1=>"Si"];
		echo  form_dropdown('fuma', $options_fuma, $query->fuma);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Toma</label>
	<div class="controls">
		<?php $options_toma = [0=> "No", 1=>"Si"];
		echo form_dropdown('toma', $options_toma, $query->toma);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Descripcion</label>
	<div class="controls">
		<textarea name="descripcion" id="descripcion" class="form-control"><?php echo $query->descripcion; ?></textarea>
		<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Busco</label>
	<div class="controls">
		<input value="<?php echo $query->busco; ?>" type="text" class="form-control" name="busco" />
		<?php echo form_error('busco','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Hijos</label>
	<div class="controls">
		<input value="<?php echo $query->hijos; ?>" type="text" class="form-control" name="hijos" />
		<?php echo form_error('hijos','<p class="error">', '</p>'); ?>
	</div>
</div>
