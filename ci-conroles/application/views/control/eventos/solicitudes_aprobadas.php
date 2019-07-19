
  <div class="col-md-12">
    <p>Total de invitaciones recibidas: <?= count($usuarios); ?></p>
    <p>Solicitudes de asistencia al evento que han sido aprobadas y se encuentran esperando el pago por parte del cliente. </p>
    <p><?= $evento->lugar ?></p>
    <?php foreach ($usuarios as $usuario): ?>
      <div class="card">
        <div class="card-body">
          <h4> <?= $usuario->nickname ?> - <?= $usuario->nombre ?> <?= $usuario->apellido ?> (<span class="italic"><?= $usuario->email ?></span>)</h4>
          <p><?= ($usuario->sexo == 1)? "Hombre" : "Mujer" ?> | <?= $usuario->localidad ?> - <?= $usuario->provincia ?> <?= $usuario->apellido ?></p>
        </div>
        <div class="card-footer">
          <form class="" action="aceptar_invitacion" method="post">
            <input type="hidden" name="id_evento" value="<?=$evento->id;?>">
            <input type="hidden" name="id_evento" value="<?=$evento->id;?>">
            <button type="submit" class="btn btn-primary pull-right">Revertir aprobación</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
