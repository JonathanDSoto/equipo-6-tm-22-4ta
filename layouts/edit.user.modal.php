<div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form method="post" action="">

			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="editName" name="name" type="text" class="form-control" placeholder="Nombre del cliente" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Apellido</span>
					    <input id="editLastname" name="lastname" type="text" class="form-control" placeholder="Apellido" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Correo electrónico</span>
					    <input id="editEmail" name="email" type="text" class="form-control" placeholder="Correo electronico" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">No. Teléfono</span>
					    <input id="editPhone_number" name="phone_number" type="text" class="form-control" placeholder="No. Telefono" aria-label="Username" aria-describedby="basic-addon1">
					</div>		

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Rol</span>
					    <input id="editRol" value="Administrador" name="role" type="text" class="form-control" placeholder="Rol" aria-label="Username" aria-describedby="basic-addon1">
					</div>	
                    
                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Contraseña</span>
					    <input id="editPassword" name="password" type="text" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
					</div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

                <input type="hidden" name="action" value="edit">
                <input type="hidden" value="user_id" name="user_id" id="editId">
                <input type="hidden" name="global_token" value="">

		    </form>
		</div>
	</div>
</div>