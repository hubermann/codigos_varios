

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
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="<?php echo base_url('control/admins/form_new'); ?>">Agregar +</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">
					<?php
					if(count($query)){

						$head = '<thead>
						<tr>
							<th> Role </th>
							<th> Email </th>
							<th class="text-right">Opciones</th>
						</tr>
					</thead>';
					print($head);
					$body = "<tbody>";

					foreach ($query as $row):

					$body .= '<tr>';
					$body .= '<td class="txt-oflo">'.$row->nombre.' </td>';
					$body .= '<td class="txt-oflo"> '.$row->admin_email.' </td>';

					$body .= '<td>
					<div class="btn-group pull-right">
						<a class="btn btn-small" href="'.base_url('control/admins/editar/'.$row->admin_id.'').'"><i class="fa fa-edit"></i></a>
						<a href="'.base_url('control/admins/destroy/'.$row->admin_id.'').'" class="delete btn btn-small" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash-o"></i></a>

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
