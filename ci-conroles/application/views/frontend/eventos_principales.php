<section id="schedule" class="g-pt-150 g-pb-90 g-pb-170--md">
  <div class="container">
    <div class="text-center g-mb-70">
      <h2 class="text-uppercase g-line-height-1 g-font-weight-700 g-font-size-30 g-mb-30">Event
        <span class="g-font-weight-400 g-font-size-40">|</span>
        <span class="g-color-primary">schedule</span></h2>

      <p>Nam sed erat aliquet libero aliquet commodo. Donec euismod augue non quam finibus, nec iaculis tellus gravida. Integer
        <br> efficitur eros ut dui laoreet, ut blandit turpis tincidunt.</p>
    </div>

    <!-- Nav tabs -->
    <!--
    <ul class="nav justify-content-center text-uppercase u-nav-v5-3 u-nav-primary g-line-height-1_4 g-font-weight-700 g-font-size-14 g-brd-bottom--md g-brd-gray-light-v4 g-mb-80--md" role="tablist" data-target="days" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block text-uppercase g-font-weight-700 u-btn-outline-primary">
      <li class="nav-item g-mx-10--md">
        <a class="nav-link g-theme-color-gray-dark-v1 g-color-primary--hover g-pb-15--md active" data-toggle="tab" href="#day-1" role="tab">Day 1</a>
      </li>
      <li class="nav-item g-mx-10--md">
        <a class="nav-link g-theme-color-gray-dark-v1 g-color-primary--hover g-pb-15--md" data-toggle="tab" href="#day-2" role="tab">Day 2</a>
      </li>
      <li class="nav-item g-mx-10--md">
        <a class="nav-link g-theme-color-gray-dark-v1 g-color-primary--hover g-pb-15--md" data-toggle="tab" href="#day-3" role="tab">Day 3</a>
      </li>
    </ul>
    -->
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="days" class="tab-content g-pt-20">
      <div class="tab-pane fade show active" id="day-1" role="tabpanel">
        <div class="u-timeline-v3-wrap">
          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <?php foreach ( $eventos as $evento):
              if( $evento->logo_lugar != "" )
              {
                $logo_lugar = base_url('images-lugares/'.$evento->logo_lugar);
              } else {
                $logo_lugar = base_url('images-lugares/no-image.jpg');
              }
            ?>



              <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
                <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
                  <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
                </div>

                <div class="row mx-0">
                  <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                    <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                      <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in"><?= $evento->fecha; ?> - <?= $evento->hora; ?></span>
                    </div>
                  </div>

                  <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                    <div class="media d-block d-md-flex">
                      <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                        <img class="img-fluid g-rounded-50x" src="<?= $logo_lugar; ?>" alt="Image description">
                      </div>

                      <div class="media-body align-self-center">
                        <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5"><?= $evento->categoria_nombre; ?></h4>
                        <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10"><?= $evento->localidad.', '.$evento->nombre_lugar; ?></h3>
                        <p class="g-color-gray-dark-v5 mb-0"><!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet --></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>




            <?php endforeach; ?>


<?php
/*



          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">19:00 - 21:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img1.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Digital Marketing</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Sara Woodman, Google</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">21:15 - 22:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img4.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Photoshop vs Sketch</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Mark Rayman, Invision</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="tab-pane fade" id="day-2" role="tabpanel">
        <div class="u-timeline-v3-wrap">
          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">17:45 - 18:45</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img1.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Photoshop vs Sketch</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Mark Rayman, Invision</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">19:00 - 21:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img2.jpg')?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Digital Marketing</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Sara Woodman, Google</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">15:30 - 17:30</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img1.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Intro to UI/UX Design</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">John Doe, Dribbble</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">21:15 - 22:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img4.jpg');?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Design Trands of 2017</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Kate Watson, Airbnb</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="tab-pane fade" id="day-3" role="tabpanel">
        <div class="u-timeline-v3-wrap">
          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">21:15 - 22:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img1.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Pop and Indie</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">The elly and friends</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">15:30 - 17:30</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img2.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Rock and Roll</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Metamorphoses band</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5 g-mb-50" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">17:45 - 18:45</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img1.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Alternative, Rock and Roll</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Amber Smith band</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a class="u-timeline-v3 d-block text-center text-md-left g-parent u-link-v5" href="#">
            <div class="g-hidden-sm-down u-timeline-v3__icon g-absolute-centered--y g-z-index-3 g-line-height-0 g-width-16 g-height-16 g-ml-minus-8">
              <i class="d-inline-block g-width-16 g-height-16 g-bg-white g-brd-5 g-brd-style-solid g-brd-gray-light-v4 g-rounded-50"></i>
            </div>

            <div class="row mx-0">
              <div class="col-md-3 g-order-2 g-order-1--sm d-flex align-self-center px-0">
                <div class="u-heading-v1-4 g-brd-gray-light-v2 w-100">
                  <span class="text-center g-pos-rel d-block g-width-110 g-line-height-1_6 g-font-weight-600 g-color-white g-font-size-14 g-bg-gray-dark-v1 g-bg-primary--parent-hover g-py-5 g-px-10 mx-auto g-ml-0--md g-transition-0_2 g-transition--ease-in">19:00 - 21:00</span>
                </div>
              </div>

              <div class="col-md-9 g-order-1 g-order-2--sm px-0 g-mb-15 g-mb-0--md">
                <div class="media d-block d-md-flex">
                  <div class="d-md-flex u-bg-overlay g-width-120 g-width-170--md g-height-120 g-height-170--md g-bg-darkblue-opacity-0_7--after g-bg-white-opacity-0--after--parent-hover g-overflow-hidden g-rounded-50x g-mr-30--md mx-auto g-mb-15 g-mb-0--md g-transition-0_2 g-transition--ease-in">
                    <img class="img-fluid g-rounded-50x" src="<?= base_url('public_folder/frontend/assets/img-temp/200x200/img4.jpg'); ?>" alt="Image description">
                  </div>

                  <div class="media-body align-self-center">
                    <h4 class="text-uppercase g-font-weight-700 g-font-size-12 g-color-primary g-mb-5">Rock</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-23 g-mb-10">Green day</h3>
                    <p class="g-color-gray-dark-v5 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut scelerisque odio, a viverra arcu. Nulla ut suscipit velit, non dictum quam. Proin hendrerit vulputate mauris a imperdiet</p>
                  </div>
                </div>
              </div>
            </div>
          </a>


*/

 ?>



        </div>
      </div>
    </div>
    <!-- End Tab panes -->
  </div>
</section>
