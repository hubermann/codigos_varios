<div class="row">

	<?php
	$attributes = array('class' => 'form-horizontal', 'id' => 'new_cita');
	echo form_open_multipart(base_url('control/citas/create/'),$attributes);
	echo form_hidden('cita[id]');
	?>
	<legend><?php echo $title ?></legend>
	<div class="well well-large well-transparent">
	 <div class="controls">

			<select name="evento_id" id="evento_id" class="form-control">
			<?php
			$eventos = $this->evento->get_records_menu();
			if($eventos){

				foreach ($eventos as $value) {
					echo '<option value="'.$value->id.'">Cat: '.$value->categoria_nombre .' - Fecha: '.$value->fecha.' '.$value->hora.' </option>';
				}
			}
			?>
			</select>

			<?php echo form_error('usuario_id','<p class="error">', '</p>'); ?>
		</div>
	</div>
	<!-- Text input-->
	<div class="control-group">
		<label class="control-label">Usuario</label>
		<div class="controls">

			<select name="usuario_id" id="usuario_id"  class="form-control">
			<?php
			$usuarios = $this->usuario->get_records_menu();
			if($usuarios){

				foreach ($usuarios as $value) {
					echo '<option value="'.$value->id.'">'.$value->apellido.' '.$value->nombre.' ('.$value->edad.')</option>';
				}
			}
			?>
			</select>
			<?php echo form_error('usuario_id','<p class="error">', '</p>'); ?>
		</div>
	</div>



<div class="row">
	<br>
</div>	

<div class="row">
<?php
$usuario_principal = 4;
$usuarios = $this->usuario->get_records_menu();
if($usuarios)
{
	foreach ($usuarios as $user) {
		if ($user->id != $usuario_principal)
		{
			echo '
			<div class="row">
				<div class="col-md-6">
					<!-- Text input-->
					<div class="control-group">
						<label class="control-label">Cita</label>
						<div class="controls">
							<select name="usuario_id" id="usuario_id"  class="form-control">
								<option value="'.$user->id.'">['.$user->id.']'.$user->apellido.' '.$user->nombre.' ('.$user->edad.')</option>
							</select>
							'.form_error('usuario_id','<p class="error">', '</p>').'
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<!-- Text input-->
					<div class="control-group">
						<label class="control-label">Clasificacion_id</label>
						<div class="controls">
							'.form_dropdown('clasificacion_id[]', $this->config->item('clasificaciones_citas'), '',['class' =>'form-control'] ).'
						</div>
					</div>
				</div>
			</div>';
		}
		
	}
}

?>


</div>

<div class="row">
	<div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<button class="btn" type="submit">Crear</button>
		</div>
	</div>
</div>



</fieldset>

<?php echo form_close(); ?>


</div>
