<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_categoria_nota');
echo form_open_multipart(base_url('control/categoria_notas/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>

<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<legend><?= $title ?></legend>
		</fieldset>
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
			<label class="control-label"></label>
			<div class="controls">
				<button class="btn" type="submit">Actualizar</button>
			</div>
		</div>
	</fieldset>
	<?= form_close(); ?>
</div>	
</div>
</div>
