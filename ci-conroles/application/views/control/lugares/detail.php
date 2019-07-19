<!--row -->
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title"><?php echo $title; ?>
				<div class="col-md-2 col-sm-4 col-xs-12 pull-right text-right">
					<a class="btn btn-primary btn-block btn-rounded waves-effect waves-light" href="<?php echo base_url('control/lugares'); ?>">Regresar</a>
				</div>
			</h3>
			<div class="table-responsive">
				<table class="table ">
					
					<?php 
						if($query){ 


							$head = '<thead>
												<tr>
													<th>Nombre</th>
													<th> Dirección </th>
													<th> Teléfono </th>
													<th> Link</th>
													<th> Visible </th>
													<th class="text-right">Opciones</th>
												</tr>
											</thead>';
							print($head);
							$body = "<tbody>";

								$visible = ($query->visible == 1) ? "Si": "No" ;
								$body .= '<tr>';
								$body .= '<td class="txt-oflo"> '.$query->nombre.' </td>';
								$body .= '<td class="txt-oflo"> '.$query->direccion.' </td>';
								$body .= '<td class="txt-oflo"> '.$query->telefono.' </td>';
								$body .= '<td class="txt-oflo"> '.$query->link.' </td>';
								$body .= '<td class="txt-oflo"> '. $visible.' </td>';
								$body .= '<td> 
														<div class="btn-group pull-right">
														<a class="btn btn-small" href="'.base_url('control/lugares/detail/'.$query->id.'').'"><i class="fa fa-chain"></i></a>
														<a class="btn btn-small" href="'.base_url('control/lugares/editar/'.$query->id.'').'"><i class="fa fa-edit"></i></a>
														<a class="btn btn-small" href="'.base_url('control/lugares/imagenes/'.$query->id.'').'"><i class="fa fa-camera-retro"></i></a>	
														<a href="'.base_url('control/lugares/destroy/'.$query->id.'').'" class="delete btn btn-small" data-confirm="Are you sure to delete this item?"><i class="fa fa-trash-o"></i></a>				
														</div>
													</td>';
								$body .= '</tr>';



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

<!-- row -->
<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12" >
		<div class="white-box">
			<h3 class="box-title">Beneficio</h3>
			<div class="row white-box">
				<div class="col-md-8 col-lg-8 col-sm-12">
					<h5><?=  $beneficio->nombre ?></h5> 
					<p >Tel: <?=  $beneficio->telefono ?></p> 
					<p >Dirección:<?=  $beneficio->direccion ?></p> 
					<p >Link: <?=  $beneficio->link ?></p> 
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 pull-right">
					<?php 	
						if(strlen($beneficio->filename) > 3 ){
						echo '<img src="'.base_url('images-beneficios/'.$beneficio->filename).'" width="200" alt="" />';
						}
					?>
				</div>
			</div>
		</div>
	</div>  
</div>
<!-- /.row -->

<!-- row -->
<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12" >
		<div class="white-box">
			<h3 class="box-title">Imagenes</h3>
			<div class="row white-box">
				
					<?php 	
						if($imagenes){
						    $count = 1;
						    foreach ($imagenes as $imagen) {
						        echo '
						        <div id="wrapp_thumb">
						        <div class="thumbnail_delete thumbnail" id="" style="float:left; margin: 1em; padding:.8em; text-align:center;">
						        <div class="container_img"><img src="'.base_url('images-lugares/'.$imagen->filename).'" width="200" alt="" /></div>
						       
						        </div>
						        </div>';
						        

						    }   
						}#fin if
					?>
				</div>
			</div>
		</div>
	</div>  
</div>
<!-- /.row -->


