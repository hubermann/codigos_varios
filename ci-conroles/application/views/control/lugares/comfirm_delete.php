<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_lugar');
echo form_open(base_url('control/lugares/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Direccion: <?php echo $query->direccion; ?></p>
 <p>Telefono: <?php echo $query->telefono; ?></p>
 <p>Link: <?php echo $query->link; ?></p>
 <p>Visible: <?php echo $query->visible; ?></p>
 <p>Beneficio: <?php echo $query->beneficio; ?></p>

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