<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_registro');
echo form_open(base_url('control/registros/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Usuario_id: <?php echo $query->usuario_id; ?></p>
 <p>Evento_id: <?php echo $query->evento_id; ?></p>
 <p>Pago: <?php echo $query->pago; ?></p>
 <p>Neto: <?php echo $query->neto; ?></p>
 <p>Comision: <?php echo $query->comision; ?></p>
 <p>Asistio: <?php echo $query->asistio; ?></p>
 <p>Confirmado: <?php echo $query->confirmado; ?></p>
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