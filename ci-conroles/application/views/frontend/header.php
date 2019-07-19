<!-- Header -->
<header id="js-header" class="u-header u-header--static">
	<div class="u-header__section bg-header u-header__section--light g-transition-0_3 g-py-10">
		<nav class="js-mega-menu navbar navbar-expand-lg">
			<div class="container">
				<!-- Responsive Toggle Button -->
				<button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
					<span class="hamburger hamburger--slider">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
					</span>
					</span>
				</button>
				<!-- End Responsive Toggle Button -->

				<!-- Logo -->
				<a href="/" class="navbar-brand">
					<img src="<?= base_url('public_folder/pixeladmin-lite/plugins/images/pixeladmin-text.png'); ?>" alt="Image Description">
				</a>
				<!-- End Logo -->

				<!-- Navigation -->
				<div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
					<ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">
						<!-- Intro -->
						<li class="nav-item link-header g-mx-10--lg g-mx-15--xl">
							<a href="/" class=" g-py-7 g-px-0">Home</a>
						</li>

						<li class="nav-item link-header g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('como-funciona');?>" class=" g-py-7 g-px-0">Cómo funciona</a>
						</li>

						<!-- <li class="nav-item link-header g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('eventos');?>" class=" g-py-7 g-px-0">Eventos</a>
						</li> -->

						<li class="nav-item link-header g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('quienes-somos');?>" class=" g-py-7 g-px-0">Quíenes somos</a>
						</li>

						<li class="nav-item link-header g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('preguntas-frecuentes');?>" class=" g-py-7 g-px-0">FAQ</a>
						</li>
						<!-- End Intro -->


						<?php if( $this->session->userdata('user_id') ){ ?>

					<!-- logout -->
						<!-- <li class="nav-item  g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('perfil-editar'); ?>" class=" g-py-7 g-px-0">Mi perfil</a>
						</li> -->
						<li class="nav-item  g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('desconectar'); ?>" class=" g-py-7 g-px-0">Finalizar</a>
						</li>
						<!-- End logout -->

					<?php } else { ?>

						<!-- Login -->
						<li class="nav-item  g-mx-10--lg g-mx-15--xl">
							<a href="<?= base_url('ingreso'); ?>" class=" g-py-7 g-px-0">Ingresar</a>
						</li>
						<!-- End Login -->

					<?php } ?>




						<!-- End Demos -->
					</ul>
				</div>
				<!-- End Navigation -->
				<?php if( $this->session->userdata('user_id') ){ ;?>

				<div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
					<a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="<?= base_url('perfil-editar');?>"><?= "Hola ".$this->session->userdata('user_nickname');  ?></a>
				</div>
				<?php }else{ ?>
				<div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg">
					<a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15" href="<?= base_url('registro'); ?>" >Crea tu cuenta!</a>
				</div>

				<?php } ?>
			</div>
		</nav>
	</div>
</header>
<!-- End Header -->
