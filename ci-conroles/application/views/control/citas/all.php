


<!--row -->
<div class="row">

<p>Al hacer un insert positivo se guarda en contactos_usuarios los datos del contacto. (para amboas users) En caso de que alguno elimine esl contacto se bloquea el contrario. es decir en el listado de contactos del otro usuario deberia dejar de aparecer. </p>

	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title"><?php echo $title; ?>
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="<?php echo base_url('control/citas/form_new'); ?>">Agregar +</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					<?php
						if(count($query)){

var_dump($query).die();
							$head = '<thead>
												<tr>

													<th>Evento</th>
													<th>Usuario</th>
													<th>Cita</th>
													<th> Clasificacion </th>
													<th class="text-right">Opciones</th>
												</tr>
											</thead>';
							print($head);
							$body = "<tbody>";

							foreach ($query as $row):

								$body .= '<tr>';
								$body .= '<td class="txt-oflo">'.$row->evento_id.' </td>';
								$body .= '<td class="txt-oflo">'.$row->usuario_id.' </td>';
								$body .= '<td class="txt-oflo"> '.$row->cita.' </td>';
								$body .= '<td class="txt-oflo"> '.$row->clasificacion_id.'  </td>';

								echo '<!-- Modal -->
								<div class="modal fade" id="myModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
								      </div>
								      <div class="modal-body">
								        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button>
								      </div>
								    </div>
								  </div>
								</div>';


								$body .= '<td>
														<div class="btn-group pull-right">
														<a class="btn btn-small" href="'.base_url('control/citas/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a>
														<a class="btn btn-small" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal'.$row->id.'""><i class="fa fa-camera-retro"></i></a>

														<a href="'.base_url('control/citas/destroy/'.$row->id.'').'" class="delete btn btn-small" data-confirm="Are you sure to delete this item?">'.$row->id.'<i class="fa fa-trash-o"></i></a>
														</div>
													</td>';
								$body .= '</tr>';

								endforeach;

								$body .= '</tbody>';
								print($body);

						}else{
							echo 'No hay resultados.';
						}
					?>

				</table>
			</div>

				<div class="table-responsive">
					<ul class="pagination pagination-small pagination-centered">
						<?php echo $pagination_links;  ?>
					</ul>
				</div>
		</div>

	</div>
</div>
<!-- /.row -->
