<section id="home" class="g-bg-img-hero g-pos-rel u-bg-overlay g-bg-white-gradient-opacity-v2--after g-pt-150" style="background-image: url(<?= base_url('public_folder/frontend/assets/img/bg/full_images/10en8-img1.jpg'); ?>); ">
  <div class="container g-max-width-750 u-bg-overlay__inner g-color-white g-mb-60">
    <!-- Countdown v4 -->
    <div class="js-countdown text-center text-uppercase u-countdown-v4 g-mb-40 g-mb-70--md" data-end-date="2018/01/01" data-month-format="%m" data-days-format="%D" data-hours-format="%H" data-minutes-format="%M" data-seconds-format="%S">
      <div class="d-inline-block g-font-size-12 g-px-10 g-px-50--md g-py-15">
        <div class="js-cd-days g-font-size-20 g-font-size-40--md g-font-weight-700 g-line-height-1 g-mb-5">22</div>
        <span>Days</span>
      </div>

      <div class="d-inline-block g-font-size-12 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-60--md g-py-15">
        <div class="js-cd-hours g-font-size-20 g-font-size-40--md g-font-weight-700 g-line-height-1 g-mb-5">30</div>
        <span>Hours</span>
      </div>

      <div class="d-inline-block g-font-size-12 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-60--md g-py-15">
        <div class="js-cd-minutes g-font-size-20 g-font-size-40--md g-font-weight-700 g-line-height-1 g-mb-5">28</div>
        <span>Minutes</span>
      </div>

      <div class="d-inline-block g-font-size-12 g-brd-left g-brd-white-opacity-0_4 g-px-10 g-px-50--md g-py-15">
        <div class="js-cd-seconds g-font-size-20 g-font-size-40--md g-font-weight-700 g-line-height-1 g-mb-5">10</div>
        <span>Seconds</span>
      </div>
    </div>
    <!-- End Countdown v4 -->

    <h2 class="text-center text-uppercase h2 g-font-weight-700 g-font-size-40 g-font-size-60--md g-color-white g-mb-30 g-mb-70--md">Dejate encontrar</h2>

    <div class="row g-mx-minus-5">
      <div class="col-md-4 g-px-5 g-mb-20 g-mb-0--md">
        <div class="media">
          <div class="media-left d-flex align-self-center g-mr-20">
            <i class="fa fa-calendar g-font-size-27 g-color-white-opacity-0_5"></i>
          </div>

          <div class="media-body text-uppercase">
            <p class="g-mb-5"><strong class="g-font-size-14 g-color-white-opacity-0_5">When</strong></p>
            <?php if($ultimo_evento) {
              list($ano,$mes,$dia) = explode("-", $ultimo_evento[0]->fecha);
              ?>
              <h3 class="h3 text-uppercase g-font-size-15 g-color-white mb-0"><?= $ultimo_evento[0]->hora; ?>, <?= $dia." ".$mes." ".$ano ?></h3>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-md-5 g-px-5 g-mb-20 g-mb-0--md">
        <div class="media">
          <div class="media-left d-flex align-self-center g-mr-20">
            <i class="fa fa-map-marker g-font-size-27 g-color-white-opacity-0_5"></i>
          </div>

          <div class="media-body text-uppercase">
            <p class="g-mb-5"><strong class="g-font-size-14 g-color-white-opacity-0_5">Where</strong></p>
            <?php if($ultimo_evento) {?>
              <h3 class="h3 text-uppercase g-font-size-15 g-color-white mb-0"><?= $ultimo_evento[0]->nombre_lugar?>, <?= $ultimo_evento[0]->localidad?></h3>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-md-3 text-md-right g-px-5">
        <a class="btn btn-lg text-uppercase u-btn-white g-font-weight-700 g-font-size-11 g-color-white--hover g-bg-primary--hover g-brd-none rounded-0 g-py-18" href="#">Register Now</a>
      </div>
    </div>
  </div>


  <div class="container u-bg-overlay__inner g-bottom-minus-70 px-0">
    <div class="row u-shadow-v23 g-theme-bg-blue-dark-v2 mx-0">
      <div class="col-md-6 px-0">
        <div class="js-carousel text-center u-carousel-v5 g-overflow-hidden h-100 g-max-height-50vh slick-initialized slick-slider" data-infinite="true" data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-40 g-height-40 g-font-size-20 g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-transition-0_2 g-transition--ease-in" data-arrow-left-classes="fa fa-angle-left g-left-0" data-arrow-right-classes="fa fa-angle-right g-right-0"><div class="js-prev u-arrow-v1 g-absolute-centered--y g-width-40 g-height-40 g-font-size-20 g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-transition-0_2 g-transition--ease-in fa fa-angle-left g-left-0 slick-arrow" style="display: block;"></div>
          <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 2280px; left: -570px;"><div class="js-slide g-bg-img-hero g-min-height-50vh slick-slide slick-cloned" style="background-image: url(<?= base_url('public_folder/frontend/assets/img/bg/full_images/slider_small1.jpg'); ?>); width: 570px;" data-slick-index="-1" aria-hidden="true" tabindex="-1"></div><div class="js-slide g-bg-img-hero g-min-height-50vh slick-slide slick-current slick-active" style="background-image: url(<?= base_url('public_folder/frontend/assets/img/bg/full_images/slider_small2.jpg'); ?>); width: 570px; height: auto;" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00"></div><div class="js-slide g-bg-img-hero g-min-height-50vh slick-slide" style="background-image: url(<?= base_url('public_folder/frontend/assets/img/bg/full_images/slider_small2.jpg'); ?>); width: 570px; height: auto;" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01"></div><div class="js-slide g-bg-img-hero g-min-height-50vh slick-slide slick-cloned" style="background-image: url(<?= base_url('public_folder/frontend/assets/img/bg/full_images/slider_small2.jpg'); ?>); width: 570px;" data-slick-index="2" aria-hidden="true" tabindex="-1"></div></div></div>


        <div class="js-next u-arrow-v1 g-absolute-centered--y g-width-40 g-height-40 g-font-size-20 g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-transition-0_2 g-transition--ease-in fa fa-angle-right g-right-0 slick-arrow" style="display: block;"></div></div>
      </div>

      <div class="col-md-6 d-flex g-min-height-50vh g-theme-color-gray-dark-v1 g-py-80 g-py-20--md g-px-50 bg-blue">
        <div class="align-self-center w-100">
          <h2 class="text-uppercase g-font-weight-700 g-font-size-30 g-color-primary g-mb-10">About The Event</h2>
          <h3 class="text-uppercase g-font-weight-500 g-font-size-13 g-color-white g-mb-20">Fusce pretium augue quis sem consectetur</h3>
          <p class="g-font-size-14" style="color: #f2f2f2">Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante.</p>
          <p class="g-font-size-14 mb-0" style="color: #f2f2f2">Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio. In rutrum tellus vitae blandit lacinia. Phasellus eget sapien odio. Phasellus eget sapien odio. Vivamus at risus quis leo tincidunt. </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once('eventos_principales.php'); ?>

<!-- VIDEO -->
<section id="about" class="u-bg-overlay g-bg-img-hero g-bg-darkblue-opacity-0_7--after g-py-100" style="background-image: url(<?= base_url('public_folder/frontend/assets/img-temp/1920x1080/10en8-img1.jpg'); ?>);">
  <div class="container u-bg-overlay__inner">
    <div class="text-center g-mb-70">
      <h2 class="text-uppercase g-line-height-1 g-font-weight-700 g-font-size-30 g-color-white g-mb-30">10en8
        <span class="g-font-weight-400 g-font-size-40">|</span>
        <span class="g-color-primary">EN LOS MEDIOS</span></h2>

      <p class="g-color-white">Nam sed erat aliquet libero aliquet commodo. Donec euismod augue non quam finibus, nec iaculis tellus gravida. Integer
        <br> efficitur eros ut dui laoreet, ut blandit turpis tincidunt.</p>
    </div>

    <div class="embed-responsive embed-responsive-16by9 event-video-effect">
      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/HpoOOflRS5g" width="530" height="300"></iframe>
    </div>
  </div>
</section>


<!-- Section posts -->

<?php include_once('ultimas_novedades.php'); ?>

<?php include_once('eventos_home.php') ?>

<?php #include('gallery.php'); ?>
