<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_nota');
echo form_open_multipart(base_url('control/notas/update/'),$attributes);
echo form_hidden('id', $query->id); 

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
							
							<select name="categoria_id" id="categoria_id">
							<?php  
							
							$categorias = $this->categoria_nota->get_records_menu();
							if($categorias){

								foreach ($categorias as $value) {
									
									if($query->categoria_id==$value){$selected = "selected";}else{ $selected = "";}
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
					<label class="control-label">Titulo</label>
					<div class="controls">
						<input value="<?php echo $query->titulo; ?>" type="text" class="form-control" name="titulo" />
						<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label">Descripcion</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion" rows="8" class="form-control"><?php echo $query->descripcion; ?></textarea>
						<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label">Fecha desde</label>
					<div class="controls">
					<?php  
					if($query->fecha_desde)
					{
						list($ano, $mes, $dia) = explode("-", $query->fecha_desde);
						$fecha_desde = $dia."-".$mes."-".$ano;
					}
					?>
					<table>
						<tr>
							<td>
								<select name="dia_fecha_desde" class="form-control">
									<?= getDias($dia); ?>
								</select>
							</td>
							<td>
								<select name="mes_fecha_desde" class="form-control">
									<?= getMeses($mes); ?>
								</select>
							</td>
							<td>
								<select name="ano_fecha_desde" class="form-control">
									<?= getAnos($ano); ?>
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
					<?php  
					if($query->fecha_hasta)
					{
						list($ano, $mes, $dia) = explode("-", $query->fecha_hasta);
						$fecha_hasta = $dia."-".$mes."-".$ano;
					}
					?>
					<table>
						<tr>
							<td>
								<select name="dia_fecha_hasta" class="form-control">
									<?= getDias($dia); ?>
								</select>
							</td>
							<td>
								<select name="mes_fecha_hasta" class="form-control">
									<?= getMeses($mes); ?>
								</select>
							</td>
							<td>
								<select name="ano_fecha_hasta" class="form-control">
									<?= getAnos($ano); ?>
								</select>
							</td>
						</tr>
					</table>
						<?php echo form_error('fecha_hasta','<p class="error">', '</p>'); ?>
					</div>
				</div>

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
