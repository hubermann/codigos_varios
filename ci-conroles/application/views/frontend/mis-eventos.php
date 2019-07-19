
<!-- Breadcrumb -->
<section class="g-my-30">
	<div class="container">
		<ul class="u-list-inline">
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Home</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Pages</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-color-primary">
				<span>Profile Settings</span>
			</li>
		</ul>
	</div>
</section>
<!-- End Breadcrumb -->

<section class="g-mb-100">
	<div class="container">
		<div class="row">

			<?php include_once('profile-sidebar.php'); ?>


			<!-- Profle Content -->
			<div class="col-lg-9">
				<!-- Nav tabs -->
				<h3>Mis eventos</h3>

<div class="row">
	<?php $datos_user =$this->session->userdata(); ?>
</div>

<?php
    foreach ($eventos_disponibles as $evento_disp) {

			$status_invitacion = $this->usuarios_evento->verificar_asistencia($this->session->userdata('user_id'), $evento_disp->id);
			$boton_evento = "";
			switch ($status_invitacion) {
				case 5: #desconfirmado por demorar el pago
					$boton_evento = '
					<div class="box-notificacion-evento dashed-gray">
						<a href="#">Desconfirmado por demora.</a>
					</div>';
					break;
				case 1: # Solicitud enviada esperando aprobacion
					$boton_evento = '
					<div class="box-notificacion-evento dashed-orange">
						<a href="#" class="btn btn-small">Aguardando aprobacion.</a>
					</div>';
					break;
				case 2: # Solicitud aprobada. esperando El pago
					$boton_evento = '
					<div class="box-notificacion-evento no-border">
						<p>Solicitud de asistencia aprobada!</p>
						<a href="payment" class="button-blue">Pagar asistencia</a>
					</div>';
					break;
				case 3: # Pago demorado
					$boton_evento = '<div class="box-notificacion-evento dashed-sky">
					<a href="volver" class="button-sky">Pago demorado. <br> Contactate con nosotros en el día de hoy para podér asistir al evento.</a>
					</div>';
					break;
				case 4: # Pago procesado ok
					$boton_evento = '
					<div class="box-notificacion-evento dashed-green">
					<a href="#" class="button-green">Pago realizado correctamente</a>
					</div>';
					break;
				default: # Disponible para solicitar asistencia
					$boton_evento = '<div class="box-notificacion-evento no-border">
					<a href="'.base_url('solicitar_asistencia_evento/'.$evento_disp->id).'" class="button-orange">Quiero asistir!</a>
					</div>';
					break;
			}


        $imagen_logo = (strlen($evento_disp->logo_lugar) > 0) ? '<img src="'.base_url('images-lugares/'.$evento_disp->logo_lugar).' " width="100" />' : "[no-image]";

        $precio_usuario = ($datos_user['user_sexo'] == "0") ? $evento_disp->precio :$evento_disp->precio_hombres;
        echo '<div class="row card_wrapper evento_pendiente">
			<div class="card_logo">'.$imagen_logo.' </div>
			<div class="card_descripcion">
				<h3>'.$evento_disp->fecha.' - '.$evento_disp->hora.' '.$precio_usuario.' </h3>
				<p>'.$evento_disp->categoria_nombre.'
				<br><span>'.$evento_disp->evento_direccion.'</span>
				<br><span class="bg-gray">'.$evento_disp->edad_minima.' a '.$evento_disp->edad_maxima.' años.</span>
				<span class="bg-gray">'.$evento_disp->evento_tipo.' </span>
				</p>

			</div>
			<div class="card_button">
				'.$boton_evento.'
			</div>
		</div>';
    }

?>

<h5>poner este</h5>
<ul class="list-unstyled">
<li class="media g-brd-around g-brd-gray-light-v4 g-brd-left-3 g-brd-blue-left rounded g-pa-20 g-mb-10">
  <div class="d-flex g-mt-2 g-mr-15">
    <img class="g-width-40 g-height-40 rounded-circle mCS_img_loaded" src="../../assets/img-temp/100x100/img1.jpg" alt="Image Description">
  </div>
  <div class="media-body">
    <div class="d-flex justify-content-between">
      <h5 class="h6 g-font-weight-600 g-color-black">Unify Template</h5>
      <span class="small text-nowrap g-color-blue">2 min ago</span>
    </div>
    <p>Curabitur hendrerit dolor sit amet consectetur. Adipiscing elitut leosit amet, consectetur eleifend.</p>
    <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">HTML</span>
    <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">AnhularJS</span>
    <span class="u-label u-label--sm g-bg-gray-light-v4 g-color-main g-rounded-20 g-px-10">PHP</span>
  </div>
</li>
</ul>




        </div>
				<!-- End Tab panes -->
			</div>
			<!-- End Profle Content -->
		</div>
	</div>
</section>
