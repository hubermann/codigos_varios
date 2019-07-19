<script>
	function show_preview(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('#previewImg').html('<img src="'+e.target.result+'" width="140" />' );
	}
	reader.readAsDataURL(input.files[0]);
	}
}
</script>
<?php

$attributes = array('class' => 'form-horizontal', 'id' => 'new_lugar');
echo form_open_multipart(base_url('control/lugares/create/'),$attributes);

echo form_hidden('lugar[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">



			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
			<input value="<?php echo set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Direccion</label>
			<div class="controls">
			<input value="<?php echo set_value('direccion'); ?>" class="form-control" type="text" name="direccion" />
			<?php echo form_error('direccion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Telefono</label>
			<div class="controls">
			<input value="<?php echo set_value('telefono'); ?>" class="form-control" type="text" name="telefono" />
			<?php echo form_error('telefono','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Link</label>
			<div class="controls">
			<input value="<?php echo set_value('link'); ?>" class="form-control" type="text" name="link" />
			<?php echo form_error('link','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Visible</label>
			<div class="controls">
			<select name="visible" id="visible">
				<option value="1">Si</option>
				<option value="0">No</option>
			</select>
			</div>
			</div>
			<!-- Text input
			<div class="control-group">
			<label class="control-label">Beneficio</label>
			<div class="controls">
			<input value="<?php echo set_value('beneficio'); ?>" class="form-control" type="text" name="beneficio" />
			<?php echo form_error('beneficio','<p class="error">', '</p>'); ?>
			</div>
			</div>-->

			<div class="control-group">
				<label class="control-label"> Logo</label>
				<div class="controls">
				<div id="previewImg"></div>
				<input value="<?php echo set_value('adjunto'); ?>" type="file" class="form-control" name="adjunto" onchange="show_preview(this)"/>
				<?php echo form_error('adjunto','<p class="error">', '</p>'); ?>
				</div>
			</div>



			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Beneficio</label>
				<div class="controls">

					<select class="form-control"	name="beneficio_id" id="beneficio_id">
						<option value="0">Sin beneficio</option>
						<?php
						$beneficios = $this->beneficio->get_records_menu();
						if($beneficios){
							foreach ($beneficios->result() as $value) {
								echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
							}
						}
						?>
					</select>

					<?php echo form_error('beneficios_id','<p class="error">', '</p>'); ?>
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
