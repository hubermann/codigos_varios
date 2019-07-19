<?php

$attributes = array('class' => 'form-horizontal', 'id' => 'new_usuario');
echo form_open_multipart(base_url('control/usuarios/create/'),$attributes);

echo form_hidden('usuario[id]');

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
<div class="row">
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Nickname</label>
			<div class="controls">
				<input value="<?php echo set_value('nickname'); ?>" class="form-control" type="text" name="nickname" />
				<?php echo form_error('nickname','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Password</label>
			<div class="controls">
				<input value="<?php echo set_value('password'); ?>" class="form-control" type="text" name="password" />
				<?php echo form_error('password','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Email</label>
			<div class="controls">
				<input value="<?php echo set_value('email'); ?>" class="form-control" type="text" name="email" />
				<?php echo form_error('email','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="colmd-6">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Apellido</label>
			<div class="controls">
				<input value="<?php echo set_value('apellido'); ?>" class="form-control" type="text" name="apellido" />
				<?php echo form_error('apellido','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="colmd-6">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
				<input value="<?php echo set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
				<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Dni</label>
			<div class="controls">
				<input value="<?php echo set_value('dni'); ?>" class="form-control" type="text" name="dni" />
				<?php echo form_error('dni','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Sexo</label>
			<div class="controls">
				<?php $options_sexo = [0=> "Hombre", 1=>"Mujer"];
				echo form_dropdown('sexo', $options_sexo);
				?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Edad</label>
			<div class="controls">
				<input value="<?php echo set_value('edad'); ?>" class="form-control" type="text" name="edad" />
				<?php echo form_error('edad','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-3">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Barrio</label>
			<div class="controls">
				<input value="<?php echo set_value('barrio'); ?>" class="form-control" type="text" name="barrio" />
				<?php echo form_error('barrio','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Calle</label>
			<div class="controls">
				<input value="<?php echo set_value('calle'); ?>" class="form-control" type="text" name="calle" />
				<?php echo form_error('calle','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2"><!-- Text input-->
		<div class="control-group">
			<label class="control-label">Numero</label>
			<div class="controls">
				<input value="<?php echo set_value('numero'); ?>" class="form-control" type="text" name="numero" />
				<?php echo form_error('numero','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Piso</label>
			<div class="controls">
				<input value="<?php echo set_value('piso'); ?>" class="form-control" type="text" name="piso" />
				<?php echo form_error('piso','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Depto</label>
			<div class="controls">
				<input value="<?php echo set_value('depto'); ?>" class="form-control" type="text" name="depto" />
				<?php echo form_error('depto','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>


<!-- Text input-->
<div class="control-group">
	<label class="control-label">Cod_postal</label>
	<div class="controls">
		<input value="<?php echo set_value('cod_postal'); ?>" class="form-control" type="text" name="cod_postal" />
		<?php echo form_error('cod_postal','<p class="error">', '</p>'); ?>
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Nacimiento - YYYY-MM-DD</label>
	<div class="controls">
		<input value="<?php echo set_value('nacimiento'); ?>" class="form-control" type="text" name="nacimiento" />
		<?php echo form_error('nacimiento','<p class="error">', '</p>'); ?>
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Telcontacto</label>
	<div class="controls">
		<input value="<?php echo set_value('telcontacto'); ?>" class="form-control" type="text" name="telcontacto" />
		<?php echo form_error('telcontacto','<p class="error">', '</p>'); ?>
	</div>
</div>




<!-- Text input-->
<div class="control-group">
	<label class="control-label">Conocio</label>
	<div class="controls">
		<input value="<?php echo set_value('conocio'); ?>" class="form-control" type="text" name="conocio" />
		<?php echo form_error('conocio','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Profesion</label>
	<div class="controls">
		<input value="<?php echo set_value('profesion'); ?>" class="form-control" type="text" name="profesion" />
		<?php echo form_error('profesion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Localidad</label>
	<div class="controls">
		<input value="<?php echo set_value('localidad'); ?>" class="form-control" type="text" name="localidad" />
		<?php echo form_error('localidad','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Fuma</label>
	<div class="controls">
		<?php $options_fuma = [0=> "No", 1=>"Si"];
		echo  form_dropdown('fuma', $options_fuma);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Toma</label>
	<div class="controls">
		<?php $options_toma = [0=> "No", 1=>"Si"];
		echo form_dropdown('toma', $options_toma);
		?>
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
	<label class="control-label">Telcelular</label>
	<div class="controls">
		<input value="<?php echo set_value('telcelular'); ?>" class="form-control" type="text" name="telcelular" />
		<?php echo form_error('telcelular','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Estado_civil</label>
	<div class="controls">
		<?php
		echo form_dropdown('estado_civil', $this->config->item('options_estado_civil'),[set_value('estado_civil')]);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Educacion</label>
	<div class="controls">
		<input value="<?php echo set_value('educacion'); ?>" class="form-control" type="text" name="educacion" />
		<?php echo form_error('educacion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Provincia</label>
	<div class="controls">
		<?php echo form_dropdown('provincia', $this->config->item('options_provincia'), []); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Zodiaco</label>
	<div class="controls">
		<?php
		echo form_dropdown('zodiaco', $this->config->item('options_zodiaco'), [set_value('zodiaco')]);
		?>
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Tipo busqueda</label>
	<div class="controls">
		<?php
		echo form_dropdown('busco', $this->config->item('options_busco'),[set_value('busco')]);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Ocupacion</label>
	<div class="controls">
		<input value="<?php echo set_value('ocupacion'); ?>" class="form-control" type="text" name="ocupacion" />
		<?php echo form_error('ocupacion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Celular_cia</label>
	<div class="controls">
		<?php echo form_dropdown('celular_cia', $this->config->item('celular_cia'), [set_value('celular_cia')]); ?>
		<?php echo form_error('celular_cia','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Tel_citas</label>
	<div class="controls">
		<input value="<?php echo set_value('tel_citas'); ?>" class="form-control" type="text" name="tel_citas" />
		<?php echo form_error('tel_citas','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Validado</label>
	<div class="controls">
		<input value="<?php echo set_value('validado'); ?>" class="form-control" type="text" name="validado" />
		<?php echo form_error('validado','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Hijos</label>
	<div class="controls">
		<input value="<?php echo set_value('hijos'); ?>" class="form-control" type="text" name="hijos" />
		<?php echo form_error('hijos','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Codigo_verificacion</label>
	<div class="controls">
		<input value="<?php echo set_value('codigo_verificacion'); ?>" class="form-control" type="text" name="codigo_verificacion" />
		<?php echo form_error('codigo_verificacion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Negocios</label>
	<div class="controls">
		<input value="<?php echo set_value('negocios'); ?>" class="form-control" type="text" name="negocios" />
		<?php echo form_error('negocios','<p class="error">', '</p>'); ?>
	</div>
</div>

<!-- Text input-->
<div class="control-group">
	<label class="control-label">Religion</label>
	<div class="controls">
		<?php echo form_dropdown('religion', $this->config->item('religion'), [set_value('religion')]); ?>
		<?php echo form_error('religion','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Foto_main</label>
	<div class="controls">
		<input value="<?php echo set_value('foto_main'); ?>" class="form-control" type="text" name="foto_main" />
		<?php echo form_error('foto_main','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Nacionalidad</label>
	<div class="controls">
		<input value="<?php echo set_value('nacionalidad'); ?>" class="form-control" type="text" name="nacionalidad" />
		<?php echo form_error('nacionalidad','<p class="error">', '</p>'); ?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Activo</label>
	<div class="controls">
		<?php $options_activo = [0=> "No", 1=>"Si"];
		echo form_dropdown('activo', $options_activo);
		?>
	</div>
</div>


<div class="row">
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Estatura</label>
			<div class="controls">
				<?php echo form_dropdown('estatura', $this->config->item('estatura'), [set_value('estatura')]); ?>
				<?php echo form_error('estatura','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Peso</label>
			<div class="controls">
				<?php echo form_dropdown('peso', $this->config->item('peso'), [set_value('peso')]); ?>
				<?php echo form_error('peso','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Contextura_fisica</label>
			<div class="controls">
				<?php echo form_dropdown('contextura_fisica', $this->config->item('contextura_fisica'), [set_value('contextura_fisica')]); ?>
				<?php echo form_error('contextura_fisica','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Color_pelo</label>
			<div class="controls">
				<?php echo form_dropdown('color_pelo', $this->config->item('color_pelo'), [set_value('color_pelo')]); ?>
				<?php echo form_error('color_pelo','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Color_ojos</label>
			<div class="controls">
				<?php echo form_dropdown('color_ojos', $this->config->item('color_ojos'), [set_value('color_ojos')]); ?>
				<?php echo form_error('color_ojos','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Convivencia</label>
			<div class="controls">
				<input value="<?php echo set_value('convivencia'); ?>" class="form-control" type="text" name="convivencia" />
				<?php echo form_error('convivencia','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>




<!-- redes -->
<div class="row">
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Facebook</label>
			<div class="controls">
				<input value="<?php echo set_value('facebook'); ?>" class="form-control" type="text" name="facebook" />
				<?php echo form_error('facebook','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Twitter</label>
			<div class="controls">
				<input value="<?php echo set_value('twitter'); ?>" class="form-control" type="text" name="twitter" />
				<?php echo form_error('twitter','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Linkedin</label>
			<div class="controls">
				<input value="<?php echo set_value('linkedin'); ?>" class="form-control" type="text" name="linkedin" />
				<?php echo form_error('linkedin','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Youtube</label>
			<div class="controls">
				<input value="<?php echo set_value('youtube'); ?>" class="form-control" type="text" name="youtube" />
				<?php echo form_error('youtube','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Myspace</label>
			<div class="controls">
				<input value="<?php echo set_value('myspace'); ?>" class="form-control" type="text" name="myspace" />
				<?php echo form_error('myspace','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Google</label>
			<div class="controls">
				<input value="<?php echo set_value('google'); ?>" class="form-control" type="text" name="google" />
				<?php echo form_error('google','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Badoo</label>
			<div class="controls">
				<input value="<?php echo set_value('badoo'); ?>" class="form-control" type="text" name="badoo" />
				<?php echo form_error('badoo','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Msn</label>
			<div class="controls">
				<input value="<?php echo set_value('msn'); ?>" class="form-control" type="text" name="msn" />
				<?php echo form_error('msn','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Skype</label>
			<div class="controls">
				<input value="<?php echo set_value('skype'); ?>" class="form-control" type="text" name="skype" />
				<?php echo form_error('skype','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label">Whatsapp</label>
			<div class="controls">
				<input value="<?php echo set_value('whatsapp'); ?>" class="form-control" type="text" name="whatsapp" />
				<?php echo form_error('whatsapp','<p class="error">', '</p>'); ?>
			</div>
		</div>
	</div>
</div>
<!-- /redes -->







<!-- Text input-->
<!-- <div class="control-group">
	<label class="control-label">Tipo_busuqeda</label>
	<div class="controls">
		<input value="<?php echo set_value('tipo_busuqeda'); ?>" class="form-control" type="text" name="tipo_busuqeda" />
		<?php echo form_error('tipo_busuqeda','<p class="error">', '</p>'); ?>
	</div>
</div> -->
<!-- Text input-->
<!-- <div class="control-group">
	<label class="control-label">Completa_signin</label>
	<div class="controls">
		<input value="<?php echo set_value('completa_signin'); ?>" class="form-control" type="text" name="completa_signin" />
		<?php echo form_error('completa_signin','<p class="error">', '</p>'); ?>
	</div>
</div> -->
<!-- Text input-->
<!-- <div class="control-group">
	<label class="control-label">Claves_erroneas</label>
	<div class="controls">
		<input value="<?php echo set_value('claves_erroneas'); ?>" class="form-control" type="text" name="claves_erroneas" />
		<?php echo form_error('claves_erroneas','<p class="error">', '</p>'); ?>
	</div>
</div> -->
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Pais</label>
	<div class="controls">
		<?php
		echo form_dropdown('id_paises', $this->config->item('paises_list'),[set_value('id_paises')]);
		?>
	</div>
</div>
<!-- Text input-->
<div class="control-group">
	<label class="control-label">Score</label>
	<div class="controls">
		<input value="<?php echo set_value('score'); ?>" class="form-control" type="text" name="score" />
		<?php echo form_error('score','<p class="error">', '</p>'); ?>
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
