<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Religion</label>
			<div class="controls">
			<input value="<?php echo $query->religion; ?>" type="text" class="form-control" name="religion" />
			<?php echo form_error('religion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Foto_main</label>
			<div class="controls">
			<input value="<?php echo $query->foto_main; ?>" type="text" class="form-control" name="foto_main" />
			<?php echo form_error('foto_main','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Nacionalidad</label>
			<div class="controls">
			<input value="<?php echo $query->nacionalidad; ?>" type="text" class="form-control" name="nacionalidad" />
			<?php echo form_error('nacionalidad','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Activo</label>
			<div class="controls">
			<?php $options_activo = [0=> "No", 1=>"Si"]; 
			echo  form_dropdown('activo', $options_activo, $query->activo);
			?>
			</div>
			</div>


			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Convivencia</label>
			<div class="controls">
			<input value="<?php echo $query->convivencia; ?>" type="text" class="form-control" name="convivencia" />
			<?php echo form_error('convivencia','<p class="error">', '</p>'); ?>
			</div>
			</div>
			
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Tipo_busuqeda</label>
			<div class="controls">
			<input value="<?php echo $query->tipo_busuqeda; ?>" type="text" class="form-control" name="tipo_busuqeda" />
			<?php echo form_error('tipo_busuqeda','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Validado</label>
			<div class="controls">
			<input value="<?php echo $query->validado; ?>" type="text" class="form-control" name="validado" />
			<?php echo form_error('validado','<p class="error">', '</p>'); ?>
			</div>
			</div>
			
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Codigo_verificacion</label>
			<div class="controls">
			<input value="<?php echo $query->codigo_verificacion; ?>" type="text" class="form-control" name="codigo_verificacion" />
			<?php echo form_error('codigo_verificacion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Negocios</label>
			<div class="controls">
			<input value="<?php echo $query->negocios; ?>" type="text" class="form-control" name="negocios" />
			<?php echo form_error('negocios','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Completa_signin</label>
			<div class="controls">
			<input value="<?php echo $query->completa_signin; ?>" type="text" class="form-control" name="completa_signin" />
			<?php echo form_error('completa_signin','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Claves_erroneas</label>
			<div class="controls">
			<input value="<?php echo $query->claves_erroneas; ?>" type="text" class="form-control" name="claves_erroneas" />
			<?php echo form_error('claves_erroneas','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Id_paises</label>
			<div class="controls">
			<input value="<?php echo $query->id_paises; ?>" type="text" class="form-control" name="id_paises" />
			<?php echo form_error('id_paises','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Score</label>
			<div class="controls">
			<input value="<?php echo $query->score; ?>" type="text" class="form-control" name="score" />
			<?php echo form_error('score','<p class="error">', '</p>'); ?>
			</div>
			</div>
