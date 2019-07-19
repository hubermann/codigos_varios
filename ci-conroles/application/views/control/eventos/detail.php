<div class="col-md-12">
	<a class="btn btn-primary pull-left btn-rounded waves-effect waves-light" href="<?php echo base_url('control/eventos'); ?>">Regresar</a>
</div>

<div class="col-md-12">
	<div class="row">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h2><?php echo $title ?></h2>
        </div>
      </div>
      <div class="card-footer">
        <a class="btn btn-small" href="<?= base_url('control/eventos/solicitudes_recibidas/'.$evento->evento_id); ?>">Solicitudes recibidas</a>
        <a class="btn btn-small" href="<?= base_url('control/eventos/solicitudes_aprobadas/'.$evento->evento_id); ?>">Solicitudes aprobadas</a>
        <a class="btn btn-small" href="<?= base_url('control/eventos/solicitudes_confirmadas/'.$evento->evento_id); ?>">Solicitudes confirmadas</a>
        <div class="pull-right">
          <div class="btn-group">
            <a class="btn btn-small" href="<?= base_url('control/eventos/delete_comfirm/'.$evento->evento_id ); ?>">Eliminar</a>
            <a class="btn btn-small" href="<?= base_url('control/eventos/editar/'.$evento->evento_id ); ?>">Editar</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
