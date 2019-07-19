<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_usuario');
echo form_open(base_url('control/usuarios/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Nickname: <?php echo $query->nickname; ?></p>
 <p>Password: <?php echo $query->password; ?></p>
 <p>Salt: <?php echo $query->salt; ?></p>
 <p>Email: <?php echo $query->email; ?></p>
 <p>Apellido: <?php echo $query->apellido; ?></p>
 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Dni: <?php echo $query->dni; ?></p>
 <p>Sexo: <?php echo $query->sexo; ?></p>
 <p>Nacimiento: <?php echo $query->nacimiento; ?></p>
 <p>Edad: <?php echo $query->edad; ?></p>
 <p>Telcontacto: <?php echo $query->telcontacto; ?></p>
 <p>Barrio: <?php echo $query->barrio; ?></p>
 <p>Calle: <?php echo $query->calle; ?></p>
 <p>Numero: <?php echo $query->numero; ?></p>
 <p>Piso: <?php echo $query->piso; ?></p>
 <p>Depto: <?php echo $query->depto; ?></p>
 <p>Conocio: <?php echo $query->conocio; ?></p>
 <p>Profesion: <?php echo $query->profesion; ?></p>
 <p>Localidad: <?php echo $query->localidad; ?></p>
 <p>Fuma: <?php echo $query->fuma; ?></p>
 <p>Toma: <?php echo $query->toma; ?></p>
 <p>Descripcion: <?php echo $query->descripcion; ?></p>
 <p>Telcelular: <?php echo $query->telcelular; ?></p>
 <p>Estado_civil: <?php echo $query->estado_civil; ?></p>
 <p>Educacion: <?php echo $query->educacion; ?></p>
 <p>Provincia: <?php echo $query->provincia; ?></p>
 <p>Zodiaco: <?php echo $query->zodiaco; ?></p>
 <p>Busco: <?php echo $query->busco; ?></p>
 <p>Ocupacion: <?php echo $query->ocupacion; ?></p>
 <p>Celular_cia: <?php echo $query->celular_cia; ?></p>
 <p>Tel_citas: <?php echo $query->tel_citas; ?></p>
 <p>Validado: <?php echo $query->validado; ?></p>
 <p>Hijos: <?php echo $query->hijos; ?></p>
 <p>Codigo_verificacion: <?php echo $query->codigo_verificacion; ?></p>
 <p>Negocios: <?php echo $query->negocios; ?></p>
 <p>Cod_postal: <?php echo $query->cod_postal; ?></p>
 <p>Religion: <?php echo $query->religion; ?></p>
 <p>Foto_main: <?php echo $query->foto_main; ?></p>
 <p>Nacionalidad: <?php echo $query->nacionalidad; ?></p>
 <p>Activo: <?php echo $query->activo; ?></p>
 <p>Estatura: <?php echo $query->estatura; ?></p>
 <p>Peso: <?php echo $query->peso; ?></p>
 <p>Contextura_fisica: <?php echo $query->contextura_fisica; ?></p>
 <p>Color_pelo: <?php echo $query->color_pelo; ?></p>
 <p>Color_ojos: <?php echo $query->color_ojos; ?></p>
 <p>Convivencia: <?php echo $query->convivencia; ?></p>
 <p>Facebook: <?php echo $query->facebook; ?></p>
 <p>Twitter: <?php echo $query->twitter; ?></p>
 <p>Linkedin: <?php echo $query->linkedin; ?></p>
 <p>Youtube: <?php echo $query->youtube; ?></p>
 <p>Myspace: <?php echo $query->myspace; ?></p>
 <p>Badoo: <?php echo $query->badoo; ?></p>
 <p>Msn: <?php echo $query->msn; ?></p>
 <p>Skype: <?php echo $query->skype; ?></p>
 <p>Whatsapp: <?php echo $query->whatsapp; ?></p>
 <p>Google: <?php echo $query->google; ?></p>
 <p>Tipo_busuqeda: <?php echo $query->tipo_busuqeda; ?></p>
 <p>Completa_signin: <?php echo $query->completa_signin; ?></p>
 <p>Claves_erroneas: <?php echo $query->claves_erroneas; ?></p>
 <p>Id_paises: <?php echo $query->id_paises; ?></p>
 <p>Score: <?php echo $query->score; ?></p>

<!--  -->
<div class="control-group">

<label class="checkbox inline">


<p style="margin-left:1.3em"><input type="checkbox" name="comfirm" id="comfirm" /> Confirma eliminar?</p>
<?php echo form_error('comfirm','<p class="error">', '</p>'); ?>
 </label>
</div>
<!--  -->
<div class="control-group">
<button class="btn btn-danger" type="submit"><i class="icon-trash icon-large"></i> Eliminar</button>
</div>


</fieldset>

<?php echo form_close(); ?>