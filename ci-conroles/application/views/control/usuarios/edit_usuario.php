<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_usuario');
echo form_open_multipart(base_url('control/usuarios/update/'),$attributes);

echo form_hidden('id', $query->id);
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

<!--  menu tabs -->
<div class="row">
	<ul class="nav nav-tabs" role="tablist">
	  <li role="presentation" class="active"><a href="#datos_personales" aria-controls="datos_personales" role="tab" data-toggle="tab">Datos personales</a></li>
	  <li role="presentation"><a href="#caracteristicas" aria-controls="caracteristicas" role="tab" data-toggle="tab">Caracteristicas</a></li>
	  <li role="presentation"><a href="#contacto-redes" aria-controls="contacto-redes" role="tab" data-toggle="tab">Contacto redes sociales</a></li>
	  <li role="presentation"><a href="#otros" aria-controls="otros" role="tab" data-toggle="tab">Otros</a></li>
	</ul>
</div>

<!-- info de los tabs -->
<div class="row">
	<!-- Tab panes -->
	<div class="tab-content">

		<!-- tab datos personales -->
		<div role="tabpanel" class="tab-pane active" id="datos_personales">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php include_once('tab_new_datospersonales.php'); ?>
			</div> <!-- /col-md-8 -->
			<div class="col-md-2"></div>
		</div>
		<!-- /tab datos personales -->

		<div role="tabpanel" class="tab-pane" id="caracteristicas">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php include_once('tab_new_caracteristicas.php'); ?>
			</div> <!-- /col-md-8 -->
			<div class="col-md-2"></div>
		</div><!-- /tab home -->

		<div role="tabpanel" class="tab-pane" id="contacto-redes">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php include_once('tab_new_contacto-redes.php'); ?>
			</div> <!-- /col-md-8 -->
			<div class="col-md-2"></div>
		</div><!-- /tab contacto-redes -->

		<div role="tabpanel" class="tab-pane" id="otros">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php include_once('tab_new_otros.php'); ?>
			</div> <!-- /col-md-8 -->
			<div class="col-md-2"></div>
		</div><!-- /tab otros -->

	</div><!-- /Tab panes -->

</div>

<div class="row">
	<div class="col-md-2"></div>
			<div class="col-md-8">
				<!-- boton enviar -->
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button class="btn" type="submit">Actualizar</button>
					</div>
				</div>
			</div> <!-- /col-md-8 -->
			<div class="col-md-2"></div>
</div>

</div>





<?php echo form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</div>
