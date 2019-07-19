<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_evento');
echo form_open_multipart(base_url('control/eventos/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
	
	<fieldset>
 

		<!-- Text input-->
		<div class="control-group">
		<label class="control-label">Categoria</label>
			<div class="controls">
				
				<select name="categoria_id" id="categoria_id" class="form-control">
				<?php  
				
				$categorias = $this->categoria_evento->get_records_menu();
				if($categorias){

					foreach ($categorias as $value) {
						
						if($query->categoria_id==$value->id){$selected = "selected";}else{ $selected = "";}
						echo '<option value="'.$value->id.'" '.$selected.'>'.$value->nombre.'</option>';
					}
				}
				
				?>
				</select>

				<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
			</div>
		</div>


			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
			<input value="<?php echo $query->fecha; ?>" type="text" class="form-control" name="fecha" />
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Hora</label>
			<div class="controls">
			<input value="<?php echo $query->hora; ?>" type="text" class="form-control" name="hora" />
			<?php echo form_error('hora','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
		<div class="control-group">
		<label class="control-label">Lugar</label>
			<div class="controls">
				
				<select name="lugar" id="lugar" class="form-control">
				<?php  
				
				$lugares = $this->lugar->get_records_menu();
				if($lugares){

					foreach ($lugares as $value) {
						
						if($query->lugar==$value->id){$selected = "selected";}else{ $selected = "";}
						echo '<option value="'.$value->id.'" '.$selected.'>'.$value->nombre.'</option>';
					}
				}
				
				?>
				</select>

				<?php echo form_error('lugar','<p class="error">', '</p>'); ?>
			</div>
		</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Precio</label>
			<div class="controls">
			<input value="<?php echo $query->precio; ?>" type="text" class="form-control" name="precio" />
			<?php echo form_error('precio','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Precio_hombres</label>
			<div class="controls">
			<input value="<?php echo $query->precio_hombres; ?>" type="text" class="form-control" name="precio_hombres" />
			<?php echo form_error('precio_hombres','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Edad_minima</label>
			<div class="controls">
			<input value="<?php echo $query->edad_minima; ?>" type="text" class="form-control" name="edad_minima" />
			<?php echo form_error('edad_minima','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Edad_maxima</label>
			<div class="controls">
			<input value="<?php echo $query->edad_maxima; ?>" type="text" class="form-control" name="edad_maxima" />
			<?php echo form_error('edad_maxima','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Edad_minina_hombre</label>
			<div class="controls">
			<input value="<?php echo $query->edad_minina_hombre; ?>" type="text" class="form-control" name="edad_minina_hombre" />
			<?php echo form_error('edad_minina_hombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Edad_maxima_hombre</label>
			<div class="controls">
			<input value="<?php echo $query->edad_maxima_hombre; ?>" type="text" class="form-control" name="edad_maxima_hombre" />
			<?php echo form_error('edad_maxima_hombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Estado_hombres</label>
			<div class="controls">
			<input value="<?php echo $query->estado_hombres; ?>" type="text" class="form-control" name="estado_hombres" />
			<?php echo form_error('estado_hombres','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Estado_mujeres</label>
			<div class="controls">
			<input value="<?php echo $query->estado_mujeres; ?>" type="text" class="form-control" name="estado_mujeres" />
			<?php echo form_error('estado_mujeres','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Coincidencias_habilitadas</label>
			<div class="controls">
			<input value="<?php echo $query->coincidencias_habilitadas; ?>" type="text" class="form-control" name="coincidencias_habilitadas" />
			<?php echo form_error('coincidencias_habilitadas','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Lugar</label>
					<div class="controls">
						<select name="tipo_evento" id="tipo_evento" class="form-control">
						<?php  
						
						$tipos_eventos = $this->eventos_tipo->get_records_menu();
						if($tipos_eventos){

							foreach ($tipos_eventos as $value) {
								
								if($query->tipo_evento==$value->id){$selected = "selected";}else{ $selected = "";}
								echo '<option value="'.$value->id.'" '.$selected.'>'.$value->nombre.'</option>';
							}
						}
						
						?>
						</select>

						<?php echo form_error('tipo_evento','<p class="error">', '</p>'); ?>
					</div>
				</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Localidad</label>
			<div class="controls">
			<input value="<?php echo $query->localidad; ?>" type="text" class="form-control" name="localidad" />
			<?php echo form_error('localidad','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Duracion_session</label>
			<div class="controls">
			<input value="<?php echo $query->duracion_session; ?>" type="text" class="form-control" name="duracion_session" />
			<?php echo form_error('duracion_session','<p class="error">', '</p>'); ?>
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
