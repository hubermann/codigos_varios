<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'new_categoria_nota');
echo form_open_multipart(base_url('control/categoria_notas/create/'),$attributes);
echo form_hidden('categoria_nota[id]');
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
							<input value="<?= set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
							<?= form_error('nombre','<p class="error">', '</p>'); ?>
						</div>
					</div>
					<!-- Text input-->
					<div class="control-group">
					<label class="control-label"></label>
						<div class="controls">
							<button class="btn" type="submit">Crear</button>
						</div>
					</div>
			</fieldset>
			<?= form_close(); ?>
		</div>	
	</div>
</div>

