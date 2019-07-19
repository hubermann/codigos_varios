
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
				<h3>Mis contactos</h3>

<div class="row">
	<?php $datos_user =$this->session->userdata(); ?>
</div>

<!-- User Contacts -->
<div class="row g-mb-40"> <!-- container -->
<?php foreach ($contactos_usuario as $contacto) : ?>

<?php
$avatar_contacto = $this->imagenes_usuario->usuario_avatar($contacto->id);

if(strlen($avatar_contacto) > 6)
{
	$avatar_contacto_img = '<img class="g-width-100 g-height-100 rounded-circle g-mb-20" src="/images-usuarios/'.$avatar_contacto.'" alt="'.$contacto->nickname.'">';
}else{
	$avatar_contacto_img = '<img class="g-width-100 g-height-100 rounded-circle g-mb-20" src="'.base_url('public_folder/frontend/no-image-available.jpg').'" alt="'.$contacto->nickname.'">';
}
?>
		<div class="col-md-4 g-mb-30 g-mb-0--md border_red">
	    <!-- Figure -->
	    <figure class="g-bg-white g-brd-around g-brd-gray-light-v4 g-brd-cyan--hover g-transition-0_2 text-center">
	      <div class="g-py-40 g-px-20">
	        <!-- Figure Image -->
					<?= $avatar_contacto_img ?>

	        <!-- Figure Image -->

	        <!-- Figure Info -->
	        <h4 class="h5 g-mb-5"><?= $contacto->nickname  ?></h4>
	        <div class="d-block">
	          <span class="g-color-cyan g-font-size-default g-mr-3">
	            <i class="icon-user"></i>
	          </span>
	          <em class="g-color-gray-dark-v4 g-font-style-normal g-font-size-default bor"></em>
	        </div>
					<p class="small"><?= $contacto->email ?></p>
					<p class="small"><?= $contacto->telefono ?></p>
	        <!-- End Figure Info -->
	      </div>

	      <hr class="g-brd-gray-light-v4 g-my-0">

	      <!-- Figure List -->
	      <!-- <ul class="row list-inline g-py-20 g-ma-0">
	        <li class="col g-brd-right g-brd-gray-light-v4">
	          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-cyan--hover" href="#">
	            <i class="icon-speech"></i>
	          </a>
	        </li>
	        <li class="col g-brd-right g-brd-gray-light-v4">
	          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-red--hover" href="#">
	            <i class="icon-envelope-letter"></i>
	          </a>
	        </li>
	        <li class="col">
	          <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-bg-transparent g-color-purple--hover" href="#">
	            <i class="icon-screen-smartphone"></i>
	          </a>
	        </li>
	      </ul> -->
	      <!-- End Figure List -->
	    </figure>
	    <!-- End Figure -->
	  </div> <!-- end user_contact -->


	<?php endforeach; ?>

</div>
<!-- End User Contacts -->


<!-- Pagination
<nav class="text-center" aria-label="Page Navigation">
  <ul class="list-inline">
    <li class="list-inline-item float-sm-left">
      <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-16" href="#" aria-label="Previous">
        <span aria-hidden="true">
          <i class="fa fa-angle-left g-mr-5"></i> Previous
        </span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="list-inline-item g-hidden-sm-down">
      <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-14" href="#">1</a>
    </li>
    <li class="list-inline-item g-hidden-sm-down">
      <a class="u-pagination-v1__item u-pagination-v1-4 u-pagination-v1-4--active g-rounded-50 g-pa-7-14" href="#">2</a>
    </li>
    <li class="list-inline-item g-hidden-sm-down">
      <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-14" href="#">3</a>
    </li>
    <li class="list-inline-item g-hidden-sm-down">
      <a class="g-pa-7-14">...</a>
    </li>
    <li class="list-inline-item g-hidden-sm-down">
      <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-14" href="#">80</a>
    </li>
    <li class="list-inline-item float-sm-right">
      <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-16" href="#" aria-label="Next">
        <span aria-hidden="true">
          Next <i class="fa fa-angle-right g-ml-5"></i>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
 End Pagination -->



        </div>
				<!-- End Tab panes -->
			</div>
			<!-- End Profle Content -->
		</div>
	</div>
</section>
