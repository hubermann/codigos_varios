<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_registro');
echo form_open_multipart(base_url('control/registros/update/'),$attributes);

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
			<label class="control-label">Usuario_id</label>
			<div class="controls">
			<input value="<?php echo $query->usuario_id; ?>" type="text" class="form-control" name="usuario_id" />
			<?php echo form_error('usuario_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Evento_id</label>
			<div class="controls">
			<input value="<?php echo $query->evento_id; ?>" type="text" class="form-control" name="evento_id" />
			<?php echo form_error('evento_id','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Pago</label>
			<div class="controls">
			<input value="<?php echo $query->pago; ?>" type="text" class="form-control" name="pago" />
			<?php echo form_error('pago','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Neto</label>
			<div class="controls">
			<input value="<?php echo $query->neto; ?>" type="text" class="form-control" name="neto" />
			<?php echo form_error('neto','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Comision</label>
			<div class="controls">
			<input value="<?php echo $query->comision; ?>" type="text" class="form-control" name="comision" />
			<?php echo form_error('comision','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Asistio</label>
			<div class="controls">
			<input value="<?php echo $query->asistio; ?>" type="text" class="form-control" name="asistio" />
			<?php echo form_error('asistio','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Confirmado</label>
			<div class="controls">
			<input value="<?php echo $query->confirmado; ?>" type="text" class="form-control" name="confirmado" />
			<?php echo form_error('confirmado','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Created_at</label>
			<div class="controls">
			<input value="<?php echo $query->created_at; ?>" type="text" class="form-control" name="created_at" />
			<?php echo form_error('created_at','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Updated_at</label>
			<div class="controls">
			<input value="<?php echo $query->updated_at; ?>" type="text" class="form-control" name="updated_at" />
			<?php echo form_error('updated_at','<p class="error">', '</p>'); ?>
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
