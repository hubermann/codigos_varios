<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title">Permisos
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<!-- <select class="form-control pull-right row b-none">
						<option>March 2016</option>
						<option>April 2016</option>
						<option>May 2016</option>
						<option>June 2016</option>
						<option>July 2016</option>
					</select> -->

				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">

					<?php
					$this->output->enable_profiler(true);
					function boolean_status($value)
					{
						return ($value == 1 ) ? TRUE : FALSE;
					}

						if(count($query)){


							$head = '<thead>
												<tr>
													<th>Nombre</th>
													<th> view</th>
													<th> build</th>
													<th> modify</th>
													<th> destroy</th>
													<th class="text-right">Opciones</th>
												</tr>
											</thead>';
							print($head);
							$body = "<tbody>";

							foreach ($query as $row):

								$body .= '<tr><form method="post" action="update">
							<input type="hidden" name="modulo_id" value="'.$row->id.'">
							<input type="hidden" name="role_id" value="'.$row->role_id.'">';
								$body .= '<td class="txt-oflo"> '.$row->nombre.' </td>';
								$body .= '<td class="txt-oflo"> '.form_checkbox("view", 'accept', boolean_status($row->view)).'</td>';
								$body .= '<td class="txt-oflo"> '.form_checkbox("build", 'accept', boolean_status($row->build)).'</td>';
								$body .= '<td class="txt-oflo"> '.form_checkbox("modify", 'accept', boolean_status($row->modify)).'</td>';
								$body .= '<td class="txt-oflo"> '.form_checkbox("destroy", 'accept', boolean_status($row->destroy)).'</td>';
								$body .= '<td>
														<div class="btn-group pull-right">
														<button type="submit"> Modificar</button>
														</form>
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

		</div>

	</div>
</div>
<!-- /.row -->
