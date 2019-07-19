<style>
.card{padding:.8em; margin:.5em 0; border:1px solid #ccc;}
</style>

<p>Invitar usuarios.</p>

<p>Evento: <?= $evento->localidad; $evento->fecha; ?></p>
<p>Edad minima:  <?= $evento->edad_minima;?> | Edad maxima: <?= $evento->edad_maxima; ?></p>
<?php
foreach($usuarios as $usuario)
{
    echo '<div class="card">
        ('.$usuario->nickname.') - '.$usuario->nombre.' '.$usuario->apellido.' | '.$usuario->email.' <br>
        '.$usuario->barrio.' '.$usuario->calle.' '.$usuario->localidad.'
        <div class="status_invitation'.$usuario->id.'"></div>
        <button onclick="invitar_usuario('.$evento->id.', '.$usuario->id.')">Invitar</button>
        </div>';
}
?>
<script type="text/javascript">
function invitar_usuario(idevento, iduser) {
	var result = confirm("Confirma invitar?");
	if (result==true) {
    	//Confirmada la eliminacion de la img
    	$.ajax({
    	    url: "/control/eventos_manager/invitar_ajax/"+idevento+"/"+iduser,
    	    context: document.body,

      
    	    success: function(data){
                if(data.status == 'success'){
                $(".status_invitation"+iduser).html('invitado!');
            }else if(data.status == 'error'){
                $(".status_invitation"+iduser).html('ERROR');
            }
    	    }
    	});	
	}
}
</script>
