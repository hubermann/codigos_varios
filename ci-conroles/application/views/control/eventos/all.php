
<div class="col-md-12">
	<div class="col-md-8"><h3 class="pull-left"><?= ucfirst($title); ?></h3></div>
	<div class="col-md-4"><a class="btn btn-primary pull-right btn-rounded waves-effect waves-light" href="<?php echo base_url('control/eventos/form_new'); ?>">Agregar +</a></div>
</div>
<div class="col-md-12">
	<div class="row">
		<?php if(count($query)){ foreach ($query as $row): ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<h4> <?= $row->nombre_lugar ?> - <?= $row->fecha ?> <?= $row->hora ?></h4>
						<p>Localidad: <?= $row->localidad ?> - Creado: <?= $row->created_at ?> Duracion sesion: <?= $row->duracion_session; ?></p>
					</div>

				</div>
				<div class="card-footer">
					<div class="pull-right">
						<a class="btn btn-small" href="<?= base_url('control/eventos/detail/'.$row->evento_id); ?>"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Solicitudes"></i></a>
						<a class="btn btn-small" href="<?= base_url('control/eventos/citas/'.$row->evento_id); ?>"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="Citas"></i></a>
						<a class="btn btn-small" href="<?= base_url('control/eventos/editar/'.$row->evento_id); ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i></a>
						<a href="<?= base_url('control/eventos/destroy/'.$row->evento_id); ?>" class="delete btn btn-small" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
						<a class="btn btn-small" data-toggle="modal" data-target="#ModalEvento<?=$row->evento_id?>"><i class="fa fa-chain" data-toggle="tooltip" data-placement="top" title="Detalle"></i></a>
					</div>
				</div>
			</div>
		<?php

		echo '<!-- Modal -->
			<div id="ModalEvento'.$row->evento_id.'" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Detalle evento</h4>
						</div>
						<div class="modal-body">
							<table class=\"table \">
								<tbody>

									<tr>
										<td class="txt-oflo">Categoria: <br><strong>'.$row->categoria_nombre.'</strong></td>
										<td class="txt-oflo">Fecha: <br><strong>'.$row->fecha.'</strong></td>
										<td class="txt-oflo">Hora: <br><strong>'.$row->hora.'</strong></td>
										<td class="txt-oflo">Lugar: <br><strong>'.$row->nombre_lugar.'</strong></td>
										<td class="txt-oflo">Precio: <br>$'.$row->precio.'</strong></td>
										<td class="txt-oflo">Creado: <br><strong>'.$row->created_at.'</strong></td>
										</tr><tr>
										<td class="txt-oflo"> Precio Hombres: <br>$'.$row->precio_hombres.'</strong></td>
										<td class="txt-oflo">Edad minima: <br><strong>'.$row->edad_minima.'</strong></td>
										<td class="txt-oflo"> Edad Maxima: <br><strong>'.$row->edad_maxima.'</strong></td>
										<td class="txt-oflo">Edad minima Hombre:<br><strong>'.$row->edad_minina_hombre.'</strong></td>
										<td class="txt-oflo"> Edad maxima Hombre: <br><strong>'.$row->edad_maxima_hombre.'</strong></td>
										<td class="txt-oflo"> Estado hombres: <br><strong>'.$row->estado_hombres.'</strong></td>
										<td class="txt-oflo"> Estado mujeres: <br><strong>'.$row->estado_mujeres.'</strong></td>
										</tr><tr>
										<td class="txt-oflo">Concidencias: <br><strong>'.$row->coincidencias_habilitadas.'</strong></td>
										<td class="txt-oflo">Tipo evento: <br><strong>'.$row->tipo_evento.'</strong></td>
										<td class="txt-oflo">Localidad: <br><strong>'.$row->localidad.'</strong></td>
										<td class="txt-oflo"> Duracion session: <br><strong>'.$row->duracion_session.'</strong></td>
										<td class="txt-oflo"> </td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>

				</div>
			</div>';
					endforeach;
					}else{
						echo 'No hay resultados.';
					}
		?>
	</div>
</div>
