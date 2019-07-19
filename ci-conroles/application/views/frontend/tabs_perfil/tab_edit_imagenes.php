<!-- Tab imagenes -->
<div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--4" role="tabpanel">
  <h2 class="h4 g-font-weight-300">Mis imagenes</h2>
  <p class="g-mb-25">Puedes quitar o agregar nuevas imagenes.</p>


  <script type="text/javascript">
  function confirma_eliminar(idvar, urldel) {
  	var result = confirm("Confirma eliminar esta imagen?");
  	if (result==true) {
      	$.ajax({
      	    url: "/perfil-delete-image/"+idvar,
      	    context: document.body,
      	    success: function(data)
            {
      	      //wrapper del thumbnail
                $(".wrapp_thumb"+idvar).remove();
                $("#"+idvar).remove();

      	    }
      	});
  	}
  }
  </script>


  <style>
      .container_img{height: 140px;  overflow: hidden;}
      .container_img img{padding: .8em;}
      .thumbnail .options{padding: .5em; bottom: .5em; }
      .box-img{border: 1px solid #f2f2f2; float: left;}
      .avatar{border:1px solid red; background: pink;}

      .btn-perfil{ font-size: 90%;background: #f2f2f2; border: 1px solid #ccc; border-radius: .3em;}
  </style>



  <div class="panel panel-default">
      <div class="panel-body">
      <?php
      $atts = array('id' => 'form_imagenes', 'class' => "navbar-form navbar-left", 'role'=> 'search');
      echo form_open_multipart(base_url('perfil-cargar-imagen'), $atts);
      echo '<input type="file" class="form-control" name="adjunto" id="adjunto" />
      <br />
      <button onclick="validateImage();" class="btn btn-perfil"><span class="glyphicon glyphicon-camera"></span> Agregar Imagen</button>
      ';
      echo form_close();
      ?>
      </div>
  </div>



<div class="row">
  <br>
  <div class="col-md-12">
  <?php
  if ($imagenes_usuario->result()!="") {
      $count = 1;
      foreach ($imagenes_usuario->result() as $imagen) {
        if($imagen->avatar == 1){ $class_avatar = "avatar";}else{$class_avatar = "";}
          echo '
          <div class="box-img col-md-4" id="wrapp_thumb'.$imagen->id.'">

          <div class="thumbnail" id="'.$imagen->id.'">
          <div class="container_img '.$class_avatar.'"><img src="'.base_url('images-usuarios/'.$imagen->filename).'" width="100%" alt="" /></div>
            <div class="options">
              <button onclick="confirma_eliminar('.$imagen->id.')" class="btn btn-perfil">
                <i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> Quitar imagen
              </button>
              <form  action="'.base_url('actualizar_avatar').'" method="post">
                <input type="hidden" name="imagen_id" value="'.$imagen->id.'">
                <button type="submit" class="btn btn-perfil">Hacer principal</button>
              </form>
            </div>
          </div>
          </div>';
      }
  }#fin if

  ?>
  </div>
</div>





<?php
/*

  <form>
    <!-- Email Notification -->
    <div class="form-group">
      <label class="d-flex align-items-center justify-content-between">
        <span>Email notification</span>
        <div class="u-check">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="emailNotification" type="checkbox" checked>
          <div class="u-check-icon-radio-v7">
            <i class="d-inline-block"></i>
          </div>
        </div>
      </label>
    </div>
    <!-- End Email Notification -->

    <hr class="g-brd-gray-light-v4 g-my-20">

    <!-- Comments Notification -->
    <div class="form-group">
      <label class="d-flex align-items-center justify-content-between">
        <span>Send me email notification when a user comments on my blog</span>
        <div class="u-check">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="commentNotification" type="checkbox">
          <div class="u-check-icon-radio-v7">
            <i class="d-inline-block"></i>
          </div>
        </div>
      </label>
    </div>
    <!-- End Comments Notification -->

    <hr class="g-brd-gray-light-v4 g-my-20">

    <!-- Update Notification -->
    <div class="form-group">
      <label class="d-flex align-items-center justify-content-between">
        <span>Send me email notification for the latest update</span>
        <div class="u-check">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="updateNotification" type="checkbox" checked>
          <div class="u-check-icon-radio-v7">
            <i class="d-inline-block"></i>
          </div>
        </div>
      </label>
    </div>
    <!-- End Update Notification -->

    <hr class="g-brd-gray-light-v4 g-my-25">

    <!-- Message Notification -->
    <div class="form-group">
      <label class="d-flex align-items-center justify-content-between">
        <span>Send me email notification when a user sends me message</span>
        <div class="u-check">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="messageNotification" type="checkbox" checked>
          <div class="u-check-icon-radio-v7">
            <i class="d-inline-block"></i>
          </div>
        </div>
      </label>
    </div>
    <!-- End Message Notification -->

    <hr class="g-brd-gray-light-v4 g-my-25">

    <!-- Newsletter Notification -->
    <div class="form-group">
      <label class="d-flex align-items-center justify-content-between">
        <span>Receive our monthly newsletter</span>
        <div class="u-check">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="newsletterNotification" type="checkbox">
          <div class="u-check-icon-radio-v7">
            <i class="d-inline-block"></i>
          </div>
        </div>
      </label>
    </div>
    <!-- End Newsletter Notification -->

    <hr class="g-brd-gray-light-v4 g-my-25">

    <div class="text-sm-right">
      <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
      <a class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#">Save Changes</a>
    </div>
  </form>
*/
  ?>
</div>
<!-- End Tab imagenes -->
