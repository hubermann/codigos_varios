<!--row -->
<div class="row">
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
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="<?php echo base_url('control/roles/form_new'); ?>">Agregar +</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					<?php
						if(count($query)){
							$head = '<thead>
												<tr>
													<th>Nombre</th>
													<th class="text-right">Opciones</th>
												</tr>
											</thead>';
							print($head);
							$body = "<tbody>";

							foreach ($query as $row):

								$body .= '<tr>';
								$body .= '<td class="txt-oflo"> '.$row->nombre.' </td>';
								$body .= '<td>
														<div class="btn-group pull-right">
														<a class="btn btn-small" href="'.base_url('control/permisos/'.$row->id.'').'"><i class="fa fa-chain"></i></a>';


								$body .=  '</div>
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
