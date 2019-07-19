<!-- Profile Sidebar -->
<div class="col-lg-3 g-mb-50 g-mb-0--lg">
  <!-- User Image -->
  <div class="u-block-hover g-pos-rel">

    <figure>
      <?php
      if(strlen($this->avatar_usuario) > 6)
      {
        echo '<img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="/images-usuarios/'.$this->avatar_usuario.'" alt="'.$this->avatar_usuario.'">';
      }else{
        echo '<img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="'.base_url('public_folder/frontend/no-image-available.jpg').'" alt="'.$this->avatar_usuario.'">';
      }
      ?>
    </figure>

    <!-- Figure Caption -->
    <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
      <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
        <!-- Figure Social Icons -->
        <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
          <li class="list-inline-item align-middle g-mx-7">
            <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
              <i class="icon-note u-line-icon-pro"></i>
            </a>
          </li>
          <li class="list-inline-item align-middle g-mx-7">
            <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
              <i class="icon-notebook u-line-icon-pro"></i>
            </a>
          </li>
          <li class="list-inline-item align-middle g-mx-7">
            <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
              <i class="icon-settings u-line-icon-pro"></i>
            </a>
          </li>
        </ul>
        <!-- End Figure Social Icons -->
      </div>
    </figcaption>
    <!-- End Figure Caption -->

    <!-- User Info -->
    <span class="g-pos-abs g-top-20 g-left-0">
      <?php if($query){
        echo '<a class="btn btn-sm u-btn-primary rounded-0" href="#">'.$query->nickname.' </a>';
      } ?>

        <!-- <small class="d-block g-bg-black g-color-white g-pa-5">Developer</small> -->
      </span>
    <!-- End User Info -->
  </div>
  <!-- User Image -->

  <!-- Sidebar Navigation -->
  <div class="list-group list-group-border-0 g-mb-40">
    <!-- Overall -->
    <a href="<?= base_url('perfil-editar');?>" class="list-group-item list-group-item-action justify-content-between">
      <span> Mis datos</span>
    </a>
    <!-- End Overall -->

    <!-- Profile -->
    <a href="<?= base_url('mis-coincidencias');?>" class="list-group-item list-group-item-action justify-content-between">
      <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Mis coincidencias</span>
    </a>
    <!-- End Profile -->

    <!-- Profile -->
    <a href="<?= base_url('mis-eventos') ?>" class="list-group-item list-group-item-action justify-content-between">
      <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Mis eventos</span>
    </a>
    <!-- End Profile -->

    <!-- Users Contacts -->
    <a href="<?= base_url('mis-contactos') ?>" class="list-group-item list-group-item-action justify-content-between">
      <span><i class="icon-notebook g-pos-rel g-top-1 g-mr-8"></i> Mis contactos</span>
    </a>
    <!-- End Users Contacts -->

    <!-- My Projects -->
    <a href="<?= base_url('desconectar'); ?>" class="list-group-item list-group-item-action justify-content-between">
      <span><i class="icon-layers g-pos-rel g-top-1 g-mr-8"></i> Cerrar sesión</span>
    </a>
    <!-- End My Projects -->

  </div>
  <!-- End Sidebar Navigation -->

  <!-- Project Progress -->
  <div class="card border-0 rounded-0 g-mb-50">



  </div>
  <!-- End Project Progress -->
</div>
<!-- End Profile Sidebar -->
