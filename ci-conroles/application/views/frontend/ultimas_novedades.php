<section id="latestPosts" class="g-theme-bg-gray-light-v1 g-py-100">
  <div class="container">
    <div class="text-center g-mb-70">
      <h2 class="text-uppercase g-line-height-1 g-font-weight-700 g-font-size-30 g-mb-30">Ultimas
        <span class="g-font-weight-400 g-font-size-40">|</span>
        <span class="g-color-primary">Novedades </span></h2>

      <p>Nam sed erat aliquet libero aliquet commodo. Donec euismod augue non quam finibus, nec iaculis tellus gravida. Integer
        <br> efficitur eros ut dui laoreet, ut blandit turpis tincidunt.</p>
    </div>

<div class="row">
<?php
foreach ($notas as $nota) {
    $imagen_nota = $this->imagenes_nota->view_main($nota->id);
    ($imagen_nota) ?  $imagen_n = base_url('/images-notas/'.$imagen_nota) : $imagen_n =  base_url('/images-notas/no-image.jpg');
    echo '
    <div class="col-md-4 masonry-grid-item">
    <article class="g-bg-white">
      <img class="img-fluid" src="'.$imagen_n.'" alt="Image description">

      <div class="u-shadow-v24 g-pa-30">
        <header class="g-mb-20">
          <h4 class="g-font-weight-700 g-font-size-10 g-color-primary g-mb-5">'.$nota->fecha_desde.'</h4>
          <h3 class="text-uppercase g-font-weight-700 g-font-size-14 mb-0">
            <a class="g-theme-color-blue-dark-v2 g-color-primary--hover" href="#">'.$nota->titulo.'</a>
          </h3>
        </header>

        <p class="g-mb-30">'.substr($nota->descripcion, 0, 120).'...</p>

        <div class="media g-font-weight-600 g-font-size-10 g-theme-color-gray-dark-v1">
          <div class="d-flex rounded-circle u-bg-overlay g-overflow-hidden g-bg-primary-opacity-0_3--after g-width-40 g-height-40 g-mr-10">
            <img class="img-fluid rounded-circle" src="'.base_url('/public_folder/frontend/assets/img-temp/700x800/img1.png').'" alt="Image description">
          </div>

          <div class="media-body align-self-center text-uppercase">by Dorian Gray</div>
        </div>
      </div>
    </article>
</div>
';
}
?>
</div> <!--  fin row  -->


  </div>
</section>
