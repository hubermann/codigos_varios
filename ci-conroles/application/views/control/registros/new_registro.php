<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_registro');
echo form_open_multipart(base_url('control/registros/create/'),$attributes);

echo form_hidden('registro[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria</label>
	<div class="controls">
		
		<select name="categoria_id" id="categoria_id">
		<?php  
		/*
		$categorias = $this->Categoria->get_records_menu();
		if($categorias){

			foreach ($categorias->result() as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
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
			<label class="control-label">Usuario_id</label>
			<div class="controls">
			<input value="<?php echo set_value('usuario_id'); ?>" class="form-control" type="text" name="usuario_id" />
			<?php echo form_error('usuario_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Evento_id</label>
			<div class="controls">
			<input value="<?php echo set_value('evento_id'); ?>" class="form-control" type="text" name="evento_id" />
			<?php echo form_error('evento_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Pago</label>
			<div class="controls">
			<input value="<?php echo set_value('pago'); ?>" class="form-control" type="text" name="pago" />
			<?php echo form_error('pago','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Neto</label>
			<div class="controls">
			<input value="<?php echo set_value('neto'); ?>" class="form-control" type="text" name="neto" />
			<?php echo form_error('neto','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Comision</label>
			<div class="controls">
			<input value="<?php echo set_value('comision'); ?>" class="form-control" type="text" name="comision" />
			<?php echo form_error('comision','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Asistio</label>
			<div class="controls">
			<input value="<?php echo set_value('asistio'); ?>" class="form-control" type="text" name="asistio" />
			<?php echo form_error('asistio','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Confirmado</label>
			<div class="controls">
			<input value="<?php echo set_value('confirmado'); ?>" class="form-control" type="text" name="confirmado" />
			<?php echo form_error('confirmado','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo set_value('created_at'); ?>" class="form-control" type="text" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Updated_at</label>
			<div class="controls">
			<input value="<?php echo set_value('updated_at'); ?>" class="form-control" type="text" name="updated_at" />
			<?php echo form_error('updated_at','<p class="error">', '</p>'); ?>
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