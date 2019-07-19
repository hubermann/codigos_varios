
<!-- Breadcrumb -->
<section class="g-my-30">
	<div class="container">
		<ul class="u-list-inline">
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Home</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-mr-7">
				<a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Pages</a>
				<i class="fa fa-angle-right g-ml-7"></i>
			</li>
			<li class="list-inline-item g-color-primary">
				<span>Profile Settings</span>
			</li>
		</ul>
	</div>
</section>
<!-- End Breadcrumb -->

<section class="g-mb-100">
	<div class="container">
		<div class="row">

			<?php include_once('profile-sidebar.php'); ?>


			<!-- Profle Content -->
			<div class="col-lg-9">
				<!-- Nav tabs -->
				<h3>Mis coincidencias</h3>

<div class="row">
	<?php $datos_user =$this->session->userdata();

    ?>
</div>
<?php if($citas){ ?>
<table class="table table-bordered u-table--v2">
                    <thead class="text-uppercase g-letter-spacing-1">
                      <tr>
                        <th class="g-font-weight-300 g-color-black">Cita</th>
                        <th class="g-font-weight-300 g-color-black g-min-width-200">Marque</th>
                        <th class="g-font-weight-300 g-color-black g-min-width-130">Me marcaron</th>
                        <th class="g-font-weight-300 g-color-black">Estado</th>
                        <th class="g-font-weight-300 g-color-black ">Contacto</th>
                      </tr>
                    </thead>

                    <tbody>

											<?php

//evento_direccion, logo_lugar, fecha, hora,categoria_nombre
#var_dump($citas).die();
		foreach ($citas as $cita) {
			$datos_contacto = "";
			if(isset($cita['contacto']['tel_cita'])){
				$datos_contacto = "Tel: ".$cita['contacto']['tel_cita'];
				if(isset($cita['contacto']['email_cita'])){
					$datos_contacto .= "Email: ".$cita['contacto']['email_cita'];
				}
			}

			if(strlen($cita['info_cita']['cita_avatar']) > 6)
			{
				$cita_avatar = '<img width="100" src="images-usuarios/'.$cita['info_cita']['cita_avatar'].'" alt="User image">';
			}else{
				$cita_avatar = '<img width="100" src="'.base_url('public_folder/frontend/no-image-available.jpg').'" alt="User Image">';
			}



			echo '<tr>
				<td class="align-middle text-nowrap text-center">
					'.$cita_avatar.'
					'.$cita['info_cita']['cita_nickname'].'
				</td>
				<td class="align-middle">
					<img src="'.base_url('public_folder/frontend/assets/iconos_clasificaciones_citas/'.$cita['yo_marque'].'.png').'" alt="-" />
				</td>
				<td class="align-middle">
				 <img src="'.base_url('public_folder/frontend/assets/iconos_clasificaciones_citas/'.$cita['me_marcaron'].'.png').'" alt="-" />
				</td>
				<td class="align-middle">
					'.$cita['estado'].'
				</td>
				<td class="align-middle">
					'.$datos_contacto.'
				</td>
			</tr>';
		}
?>



                    </tbody>
                  </table>

<?php }else{ echo 'Sin información.';} ?>


        </div>
				<!-- End Tab panes -->
			</div>
			<!-- End Profle Content -->
		</div>
	</div>
</section>
