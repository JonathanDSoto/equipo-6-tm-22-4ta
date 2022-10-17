<div class="modal fade" id="add-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar un Nuevo Usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data" method="post" action="<?php echo BASE_PATH?>frm">

				

			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del cliente" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Apellido</span>
					    <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Apellido" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Correo electrónico</span>
					    <input id="email" name="email" type="text" class="form-control" placeholder="Correo electronico" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					
					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Contraseña</span>
					    <input id="password" name="password" type="text" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">No. Teléfono</span>
					    <input id="phone_number" name="phone_number" type="text" class="form-control" placeholder="No. Telefono" aria-label="Username" aria-describedby="basic-addon1">
					</div>		

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Rol</span>
					    <input id="rol" value="Administrador" name="role" type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1">
					</div>	
                    
                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Imagen</span>
					    <input name="avatar" type="file" class="form-control" placeholder="Product features" aria-label="Username" aria-describedby="basic-addon1">
					</div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

				<input type="hidden" name="action" value="register" id="oculto_input">
				<input id="id" type="hidden" name="id" value="edit">
				<input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">

		    </form>
		</div>
	</div>
</div>