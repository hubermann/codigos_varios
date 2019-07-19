<!-- Tab panes --> <!-- PRIMER TAB -->
<div id="nav-1-1-default-hor-left-underline" class="tab-content">
  <!-- Edit Profile -->
  <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
    <h2 class="h4 g-font-weight-300">Tab de edicion de datos</h2>
    <p>Below are name, email addresse, contacts and more on file for your account.</p>


    <form class="" action="update_tab_datos" method="post">
      <input type="hidden" name="id" value="<?= $query->id; ?>">

    <!-- Current Nombre -->
      <div class="form-group row g-mb-25">
        <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Nickname</label>
        <div class="col-sm-9">
          <div class="input-group g-brd-primary--focus">
            <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" name="nickname" value="<?php echo $query->nickname; ?>" placeholder="Nickname">

            <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
              <i class="icon-lock"></i>
            </div>
          </div>
          <p><?= form_error('nickname','<p class="error">', '</p>'); ?></p>
        </div>
      </div>
      <!-- End Current Nombre-->


      <!-- Current Nombre -->
      <div class="form-group row g-mb-25">
        <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Nombre</label>
        <div class="col-sm-9">
          <div class="input-group g-brd-primary--focus">
            <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="text" name="nombre" value="<?php echo $query->nombre; ?>" placeholder="Nombre">

            <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
              <i class="icon-lock"></i>
            </div>
          </div>
          <p><?= form_error('nombre','<p class="error">', '</p>'); ?></p>
        </div>
      </div>
      <!-- End Current Nombre-->

      <!-- Current Nombre -->
      <div class="form-group row g-mb-25">
        <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Apellido</label>
        <div class="col-sm-9">
          <div class="input-group g-brd-primary--focus">
            <input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" name="apellido" type="text" value="<?php echo $query->apellido; ?>" placeholder="Apellido">

            <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
              <i class="icon-lock"></i>
            </div>
          </div>
          <p><?= form_error('apellido','<p class="error">', '</p>'); ?></p>
        </div>
      </div>
      <!-- End Current Nombre-->


      <hr class="g-brd-gray-light-v4 g-my-25">

      <div class="text-sm-right">
        <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25">Save Changes</button>
      </div>
    </form>
  </div>
  <!-- End Edit Profile -->
