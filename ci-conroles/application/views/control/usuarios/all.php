
<style>
	.border-abajo{border-bottom: 1px solid #f2f2f2;}
	.infobg{background: #f1f1f1;}
	.column25{width: 240px; float: left; }
</style>
<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title"><?php echo $title; ?>
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="<?php echo base_url('control/usuarios/form_new'); ?>">Agregar +</a>
				</div>
			</h3>
			<?php
			if(count($query)){
				foreach ($query as $row):



			$header = '<div class="row border-abajo">
			<div class="row">
				<div class="table-responsive">
						<table class="table ">
							<tbody>
								<tr>
									<td class="column25">
										<a data-toggle="collapse" href="#info-user'.$row->id.'" aria-expanded="false" aria-controls="info-user'.$row->id.'">'.$row->nombre.' '.$row->apellido.' </a>
									</td>
									<td class=" column25"> '.$row->nickname.' - Edad:'.$row->edad.'</td>
									<td class=" column25">'.$row->email.'</td>
									<td class="text-right">
										<div class="btn-group">
											<a class="btn btn-small" href="'.base_url('control/usuarios/delete_comfirm/'.$row->id.'').'"><i class="fa fa-trash-o"></i></a>
											<a class="btn btn-small" href="'.base_url('control/usuarios/editar/'.$row->id.'').'"><i class="fa fa-edit"></i></a><a class="btn btn-small" href="'.base_url('control/usuarios/imagenes/'.$row->id.'').'"><i class="fa fa-camera-retro"></i></a>
											<!--<a class="btn btn-small" href="'.base_url('control/usuarios/detail/'.$row->id.'').'"><i class="fa fa-chain"></i></a>-->
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>';

			print($header);


			$body = '<!-- elhide -->
				<div class="row">
				  <div class="col">
				    <div class="collapse" id="info-user'.$row->id.'">
				      <div class="infobg">

								<div class="table-responsive">
									<table class="table ">
										<tbody>

											<tr>';
											$body .= '<td>'.$row->nickname.' </td>';
											$body .= '<td>'.$row->password.' </td>';
											$body .= '<td>'.$row->dni.' </td>';
											$body .= '<td>'.$row->nacimiento.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->calle.' </td>';
											$body .= '<td>'.$row->numero.' </td>';
											$body .= '<td>'.$row->piso.' </td>';
											$body .= '<td>'.$row->depto.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->barrio.' </td>';
											$body .= '<td>'.$row->telcontacto.' </td>';
											$body .= '<td>'.$row->profesion.' </td>';
											$body .= '<td>'.$row->localidad.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->telcelular.' </td>';
											$body .= '<td>'.$row->ocupacion.' </td>';
											$body .= '<td>'.$row->celular_cia.' </td>';
											$body .= '<td>'.$row->tel_citas.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->provincia.' </td>';
											$body .= '<td>'.$row->cod_postal.' </td>';
											$body .= '<td>'.$row->estado_civil.' </td>';
											$body .= '<td>'.$row->educacion.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->zodiaco.' </td>';
											$body .= '<td>'.$row->negocios.' </td>';
											$body .= '<td>'.$row->busco.' </td>';
											$body .= '<td>'.$row->hijos.' </td>';
											$body .= '</tr><tr>';
											$fuma = ($row->fuma==1) ? "Fuma:Si": "Fuma:no";
											$toma = ($row->toma==1) ? "Toma:Si": "Toma:no";
											$body .= '<td>'.$row->conocio.' </td>';
											$body .= '<td>'.$fuma.' </td>';
											$body .= '<td>'.$toma.' </td>';

											$body .= '</tr><tr>';

											$body .= '<td>'.$row->validado.' </td>';
											$body .= '<td>'.$row->codigo_verificacion.'</td>';
											$body .= '<td>'.$row->activo.' </td>';
											$body .= '<td>'.$row->score.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->tipo_busuqeda.' </td>';
											$body .= '<td>'.$row->religion.' </td>';
											$body .= '<td>'.$row->foto_main.' </td>';
											$body .= '<td>'.$row->nacionalidad.' </td>';
											$body .= '</tr><tr>';


											$body .= '<td>'.$row->estatura.' </td>';
											$body .= '<td>'.$row->peso.' </td>';
											$body .= '<td>'.$row->contextura_fisica.' </td>';
											$body .= '<td>'.$row->color_pelo.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->color_ojos.' </td>';
											$body .= '<td>'.$row->convivencia.' </td>';
											$body .= '<td>'.$row->facebook.' </td>';
											$body .= '<td>'.$row->twitter.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->linkedin.' </td>';
											$body .= '<td>'.$row->youtube.' </td>';
											$body .= '<td>'.$row->myspace.' </td>';
											$body .= '<td>'.$row->badoo.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->msn.' </td>';
											$body .= '<td>'.$row->skype.' </td>';
											$body .= '<td>'.$row->whatsapp.' </td>';
											$body .= '<td>'.$row->google.' </td>';
											$body .= '</tr><tr>';

											$body .= '<td>'.$row->completa_signin.' </td>';
											$body .= '<td>'.$row->claves_erroneas.' </td>';
											$body .= '<td>'.$row->id_paises.' </td>';
											$body .= '<td>'.$row->descripcion.' </td>';
											$body .= '</tr><tr>';

					$body .= '</tbody>
									</table>
								</div>


				      </div>
				    </div>
				  </div>
				</div>
			<!-- /elhide -->

			</div> <!-- /border abajo -->';
			print($body);
			endforeach;
		}else{
			echo 'No hay resultados.';
		}
			?>

			<div class="table-responsive">
					<ul class="pagination pagination-small pagination-centered">
						<?php echo $pagination_links;  ?>
					</ul>
				</div>

		</div>
	</div>
</div>
