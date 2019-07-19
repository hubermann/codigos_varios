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
				<h3>Mis coincidencias</h3>

<div class="row">
	<?php $datos_user =$this->session->userdata(); ?>
</div>

<?php if($eventos_usuario){ ?>
<table class="table table-bordered u-table--v2">
  <thead class="text-uppercase g-letter-spacing-1">
    <tr>
      <th class="g-font-weight-300 g-color-black">Cita</th>
      <th class="g-font-weight-300 g-color-black g-min-width-200">Yo marque</th>
      <th class="g-font-weight-300 g-color-black g-min-width-130">Me marcaron</th>
      <th class="g-font-weight-300 g-color-black">Estado</th>
      <th class="g-font-weight-300 g-color-black ">Datos</th>
    </tr>
  </thead>

  <tbody>
<?php

//evento_direccion, logo_lugar, fecha, hora,categoria_nombre
		foreach ($eventos_usuario as $evento) {

			$imagen_logo = (strlen($evento->logo_lugar) > 0) ? '<img class="g-brd-around g-brd-gray-light-v4 g-pa-2 g-width-50 g-height-50 rounded-circle" src="'.base_url('images-lugares/'.$evento->logo_lugar).'" data-toggle="tooltip" data-placement="top" data-original-title="'.$evento->evento_direccion.'" alt="'.$evento->evento_direccion.'">' : "[no-image]";

			echo '<tr>
				<td class="align-middle text-nowrap text-center">
					'.$imagen_logo.'
				</td>
				<td class="align-middle">'.$evento->fecha.'</td>
				<td class="align-middle">
					'.$evento->hora.'
				</td>
				<td class="align-middle">
					'.$evento->categoria_nombre.'
				</td>
				<td class="align-middle">
					<div class="align-self-center">
							<a class="btn u-btn-orange g-rounded-50" href="'.base_url('detalle-coincidencias/'.$evento->id).'">VER</a>
					</div>
				</td>
			</tr>';
		}
?>



                    </tbody>
                  </table>

<?php }else{ echo 'No hay eventos a los que hayas asistido aún.';} ?>


        </div>
				<!-- End Tab panes -->
			</div>
			<!-- End Profle Content -->
		</div>
	</div>
</section>
