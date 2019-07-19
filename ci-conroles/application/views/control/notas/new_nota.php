<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'new_nota');
echo form_open_multipart(base_url('control/notas/create/'),$attributes);
echo form_hidden('nota[id]');
?>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<legend><?= $title ?></legend>
				<fieldset>

				<!-- Text input-->
					<div class="control-group">
					<label class="control-label">Categoria</label>
						<div class="controls">
							
							
							<?php  
							
							$categorias = $this->categoria_nota->get_records_menu();

							if($categorias){
								echo '<select name="categoria_id" id="categoria_id">';
								foreach ($categorias as $value) {
									echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
								}
								echo '</select>';
							}else{
								echo '<h4>Necesita <a href="'.base_url('control/categoria_notas/form_new').'">crear</a> al menos una categoria. </h4>';
							}
							
							?>
							

							<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
						</div>
					</div>
					<!-- Text input-->
					<div class="control-group">
						<label class="control-label">Titulo</label>
						<div class="controls">
							<input value="<?php echo set_value('titulo'); ?>" class="form-control" type="text" name="titulo" />
							<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
						</div>
					</div>
					<!-- Text input-->
					<div class="control-group">
						<label class="control-label">Descripcion</label>
						<div class="controls">
							<textarea name="descripcion" id="descripcion" class="form-control"><?php echo set_value('descripcion'); ?></textarea>
							<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
						</div>
					</div>
					<!-- Text input-->
				<div class="control-group">
					<label class="control-label">Fecha desde</label>
					<div class="controls">
					<table>
						<tr>
							<td>
								<select name="dia_fecha_desde" class="form-control">
									<?= getDias(); ?>
								</select>
							</td>
							<td>
								<select name="mes_fecha_desde" class="form-control">
									<?= getMeses(); ?>
								</select>
							</td>
							<td>
								<select name="ano_fecha_desde" class="form-control">
									<?= getAnos(); ?>
								</select>
							</td>
						</tr>
					</table>
						<?php echo form_error('fecha_desde','<p class="error">', '</p>'); ?>
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label">Fecha hasta</label>
					<div class="controls">
					<table>
						<tr>
							<td>
								<select name="dia_fecha_hasta" class="form-control">
									<?= getDias(); ?>
								</select>
							</td>
							<td>
								<select name="mes_fecha_hasta" class="form-control">
									<?= getMeses(); ?>
								</select>
							</td>
							<td>
								<select name="ano_fecha_hasta" class="form-control">
									<?= getAnos(); ?>
								</select>
							</td>
						</tr>
					</table>
						<?php echo form_error('fecha_hasta','<p class="error">', '</p>'); ?>
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
