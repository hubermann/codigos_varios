<div class="row">
  <div class="col-sm-12">
    <div class="white-box">
      <h3 class="box-title"><?= $title; ?></h3>
    <?php


        // USuario
        // Taer de usuario citas las citas qu con su id y join de uuario para traer sus datos (nombre apellio nick)
        echo '
        <div class="card">
          <div class="card-body">
            <div class="row">
            <p>hacer un form que envie todos los users y su etado. {borrar previos para ese evento y actualizar con nuevos}</p>
            <h4>'.$usuario_owner->nickname.' - '.$usuario_owner->nombre.' '.$usuario_owner->apellido.'</h4>
              <div class="col-md-12">
                <form class="nada" action="'.base_url('control/citas/citas_evento_update').'" method="post">
                  <input type="hidden" name="evento_id" value="'.$evento_id.'">
                  <input type="hidden" name="usuario_id" value="'.$usuario_owner->id.'">
                  ';
                foreach ($usuarios as $cita) {

                  if($cita['user_id'] != $usuario_owner->id){
	                  echo '
	                    <div class="col-md-6">
	                      <br>
	                      '.$cita['nombre'].' '.$cita['apellido'].' '.$cita['user_id'].'
	                      <input type="hidden" name="cita_id[]" value="'.$cita['user_id'].'" />
	                    </div>
	                    <div class="col-md-6">
	                      <!-- Text input-->
	                      <div class="control-group">
	                        <label class="control-label"></label>
	                        <div class="controls">
	                          '.form_dropdown('clasificacion_id[]', $this->config->item('clasificaciones_citas'), $cita['cita_status'],['class' =>'form-control'] ).'
	                        </div>
	                      </div>
	                  </div>
	                  ';
                  }
                }
            echo '

            </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="pull-right">
              <button type="submit" name="button">Actualizar</button>
            </div>

          </div>
          </form>
        </div>';




    ?>
    </div>
  </div>
</div>
