<!-- Payment Options -->
<div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--3" role="tabpanel">

<div class="col-md-12"><!-- row tipo relacion -->
  <h2 class="h4 g-font-weight-300">Que tipo de relación?</h2>

    <form class="" action="update_tab_busco" method="post">
      <div class="row">
        <div class="col-md-6">
          <?php
            //take just ids
            $user_tipos_relacion = [];
            foreach ($tipos_relacion_user as $value) {
                array_push($user_tipos_relacion, $value->tipo_relacion_id);
            }

            $count = 1;
            $mitad = round(count($this->config->item('relaciones_tipo')) / 2);
            foreach ($this->config->item('relaciones_tipo') as $key => $value) {
                if (in_array($key, $user_tipos_relacion)) {
                    $checked="checked";
                } else {
                    $checked ="";
                }
                echo '
              <div class="row">
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="relaciones_tipo['.$key.']" value="'.$key.'" '.$checked.'>
                  <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  '.$value.'
                </label>

              </div>';
                if ($count == $mitad) {
                    echo '</div><div class="col-md-6">';
                }
                $count++;
            }
          ?>
        </div>
      </div>

</div> <!-- end row tipo relacion -->


<div class="col-md-12"><!-- row tipo relacion -->
  <br>
  <h2 class="h4 g-font-weight-300">En que tipo de eventos te gustaria participar?</h2>

    <div class="row">
      <div class="col-md-6">
        <?php
        $user_eventos_preferidos = [];
        foreach ($usuario_eventos_preferidos as $value) {
            array_push($user_eventos_preferidos, $value->evento_id);
        }

          $count = 1;
          $mitad = round(count($categorias_eventos) / 2);
          foreach ($categorias_eventos as $cat_evento) {
              if (in_array($cat_evento->id, $user_eventos_preferidos)) {
                  $checked="checked";
              } else {
                  $checked ="";
              }
              echo '
            <div class="row">
              <label class="form-check-inline u-check g-pl-25">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="tipos_eventos['.$cat_evento->id.']" value="'.$cat_evento->id.'" '.$checked.'>
                <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                  <i class="fa" data-check-icon=""></i>
                </div>
                '.$cat_evento->nombre.'
              </label>

            </div>';
              if ($count == $mitad) {
                  echo '</div><div class="col-md-6">';
              }
              $count++;
          }
        ?>
      </div>
    </div>

</div> <!-- end row tipo relacion -->








      <hr class="g-brd-gray-light-v4 g-my-25">

      <div class="text-sm-right">
      <!-- <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a> -->
      <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25">Save Changes</a>
    </div>
  </form>
</div>
<!-- End Payment Options -->
