
<!-- Breadcrumb -->
<section class="g-my-30">
	<div class="container">
		<ul class="u-list-inline">
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Inicio</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Perfil</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-color-primary">
				<span>Configuración</span>
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
				<ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
					<li class="nav-item">
						<a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--1" role="tab">Editar datos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2" role="tab">Descripción</a>
					</li>
					<li class="nav-item">
						<a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">Busco</a>
					</li>
					<li class="nav-item">
						<a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--4" role="tab">Imágenes</a>
					</li>
				</ul>
				<!-- End Nav tabs -->

				<?php include('tabs_perfil/tab_edit_datos.php'); ?>

				<?php include('tabs_perfil/tab_edit_descripcion.php'); ?>

				<?php include('tabs_perfil/tab_edit_busco.php'); ?>

				<?php include('tabs_perfil/tab_edit_imagenes.php'); ?>

				</div>
				<!-- End Tab panes -->
			</div>
			<!-- End Profle Content -->
		</div>
	</div>
</section>
