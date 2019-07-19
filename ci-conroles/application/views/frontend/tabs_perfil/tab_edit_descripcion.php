<!-- Security Settings --> <!-- SEGUNDO TAB -->
<div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--2" role="tabpanel">
  <h2 class="h4 g-font-weight-300">Sobre mí...</h2>
  <p class="g-mb-25">Completá tu descripción para poder participar de todas las experiencias.</p>

  <form class="" action="update_tab_descripcion" method="post">

    <!-- Estatura -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Estatura (Aprox)</label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('estatura', $this->config->item('estatura'),[$query->estatura], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Estatura -->

    <!-- Peso -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Peso (Aprox) </label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('peso', $this->config->item('peso'),[$query->peso], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End peso -->

    <!-- Contextura -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Contextura física</label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('contextura_fisica', $this->config->item('contextura_fisica'),[$query->contextura_fisica], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Contextura -->

    <!-- Colo pelo -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Color de pelo</label>
      <div class="col-sm-9">
        <?php
    		  echo form_dropdown('color_pelo', $this->config->item('color_pelo'),[$query->color_pelo], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Colo pelo -->

    <!-- Color ojos -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Color de ojos</label>
      <div class="col-sm-9">
        <?php
    		  echo form_dropdown('color_ojos', $this->config->item('color_ojos'),[$query->color_ojos], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Colo ojos -->

    <!-- Estado civil -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Estado civíl</label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('estado_civil', $this->config->item('options_estado_civil'),[$query->estado_civil], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Estado civil -->

    <!-- Hijos -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Hijos</label>
      <div class="col-sm-9">
        <input type="text"  name="hijos" class="form-control" value="<?= $query->hijos ?>">
      </div>
    </div>
    <!-- End hijos -->

    <!-- Con quien vive -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Con quién vive actualmente?</label>
      <div class="col-sm-9">
        <input type="text"  name="convivencia" class="form-control" value="<?= $query->convivencia; ?>">
      </div>
    </div>
    <!-- End Con quien vive -->

    <!-- Fuma -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Fumas?</label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('fuma', $this->config->item('options_fuma'),[$query->fuma], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Fuma -->

    <!-- Tomas alcohol -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Tomás alcohol?</label>
      <div class="col-sm-9">
        <?php
    		  echo form_dropdown('toma', $this->config->item('toma_alcohol'),[$query->fuma], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End Tomas alcohol -->

    <!-- profesion negocio -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Contanos sobre tu actividad, profesión o negocio.</label>
      <div class="col-sm-9">
        <textarea name="profesion" rows="8" class="form-control"><?= $query->profesion ?></textarea>
      </div>
    </div>
    <!-- End profesion negocio -->

    <!-- sobre persona  -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Contanos sobre tu persona.</label>
      <div class="col-sm-9">
        <textarea name="bio" rows="8" class="form-control"><?= $query->bio ?></textarea>
      </div>
    </div>
    <!-- End sobre persona -->

    <!-- que buscas -->
    <div class="form-group row g-mb-25">
      <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Contanos que buscas.</label>
      <div class="col-sm-9">
        <?php
    		echo form_dropdown('busco', $this->config->item('options_busco'),[$query->busco], ['class' => 'form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0']);
    		?>
      </div>
    </div>
    <!-- End que buscas -->


    <hr class="g-brd-gray-light-v4 g-my-25">

    <div class="text-sm-right">
      <!-- <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a> -->
      <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25">Save Changes</button>
    </div>
  </form>
</div>
<!-- End Security Settings -->
