<div class="modal fade" id="add-photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar nueva foto</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data" method="post" action="<?php echo BASE_PATH?>frm">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nueva foto</span>
					    <input name="avatar" type="file" class="form-control" placeholder="Subir la foto que deseas" aria-label="Username" aria-describedby="basic-addon1">
					</div>	

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

				<input type="hidden" name="action" value="update_img" id="oculto_input">
				<input type="hidden" name="client_id" value="<?php echo $getId->id?>" id="id">
				<input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">

		    </form>
		</div>
	</div>
</div>