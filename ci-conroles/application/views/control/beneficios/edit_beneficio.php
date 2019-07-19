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
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_beneficio');
echo form_open_multipart(base_url('control/beneficios/update/'),$attributes);

echo form_hidden('id', $query->id);
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">




<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria id</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php
		/*
		$categorias = $this->categoria->get_records_menu();
		if($categorias){

			foreach ($categorias as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
			}
		}
		*/
		?>
		</select>

		<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
	</div>
</div>
-->

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
			<label class="control-label">Telefono</label>
			<div class="controls">
			<input value="<?php echo $query->telefono; ?>" type="text" class="form-control" name="telefono" />
			<?php echo form_error('telefono','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Direccion</label>
			<div class="controls">
			<input value="<?php echo $query->direccion; ?>" type="text" class="form-control" name="direccion" />
			<?php echo form_error('direccion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Link</label>
			<div class="controls">
			<input value="<?php echo $query->link; ?>" type="text" class="form-control" name="link" />
			<?php echo form_error('link','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Imagen</label>
				<div class="controls">
				<div id="previewImg">
				<?php if($query->adjunto){
				echo '<p><img src="'.base_url('images-beneficios/'.$query->adjunto).'" width="140" /></p>';
				} ?>

			</div>
				<input value="<?php echo set_value('adjunto'); ?>" type="file" class="form-control" name="adjunto" onchange="show_preview(this)"/>
				<?php echo form_error('adjunto','<p class="error">', '</p>'); ?>
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
