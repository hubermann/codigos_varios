<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_evento');
echo form_open(base_url('control/eventos/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Categoria_id: <?php echo $query->categoria_id; ?></p>
 <p>Fecha: <?php echo $query->fecha; ?></p>
 <p>Hora: <?php echo $query->hora; ?></p>
 <p>Lugar: <?php echo $query->lugar; ?></p>
 <p>Precio: <?php echo $query->precio; ?></p>
 <p>Precio_hombres: <?php echo $query->precio_hombres; ?></p>
 <p>Edad_minima: <?php echo $query->edad_minima; ?></p>
 <p>Edad_maxima: <?php echo $query->edad_maxima; ?></p>
 <p>Edad_minina_hombre: <?php echo $query->edad_minina_hombre; ?></p>
 <p>Edad_maxima_hombre: <?php echo $query->edad_maxima_hombre; ?></p>
 <p>Estado_hombres: <?php echo $query->estado_hombres; ?></p>
 <p>Estado_mujeres: <?php echo $query->estado_mujeres; ?></p>
 <p>Coincidencias_habilitadas: <?php echo $query->coincidencias_habilitadas; ?></p>
 <p>Tipo_evento: <?php echo $query->tipo_evento; ?></p>
 <p>Localidad: <?php echo $query->localidad; ?></p>
 <p>Duracion_session: <?php echo $query->duracion_session; ?></p>
 <p>Created_at: <?php echo $query->created_at; ?></p>
 <p>Updated_at: <?php echo $query->updated_at; ?></p>

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