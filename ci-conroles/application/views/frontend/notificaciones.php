<!-- Notifications -->
		<div class="container">
		  <div class="row">
		    <div id="avisos" class="col-lg-12">
			    <?php 

			      if($this->session->flashdata('success')): 
			      echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
			      '.$this->session->flashdata('success').'</div>';
			      endif;

			      if($this->session->flashdata('warning')): 
			      echo '<div class="alert alert-warning"  role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
			      '.$this->session->flashdata('warning').'</div>';
			      endif;

			      if($this->session->flashdata('error')): 
			      echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
			      '.$this->session->flashdata('error').'</div>';
			      endif;
			    ?>
		    </div>
		  </div>
		</div>