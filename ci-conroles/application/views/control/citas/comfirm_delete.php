<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_cita');
echo form_open(base_url('control/citas/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Evento_id: <?php echo $query->evento_id; ?></p>
 <p>Usuario_id: <?php echo $query->usuario_id; ?></p>
 <p>Cita: <?php echo $query->cita; ?></p>
 <p>Clasificacion_id: <?php echo $query->clasificacion_id; ?></p>

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