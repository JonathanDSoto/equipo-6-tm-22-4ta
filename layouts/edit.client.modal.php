<div class="modal fade" id="edit-client" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Editar un Cliente</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form method="post" action="<?php echo BASE_PATH?>cln">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="editName" name="name" pattern="^[a-zA-Z ]+$" type="text" class="form-control" placeholder="Nombre del cliente" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Correo Electrónico</span>
					    <input id="editEmail" name="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" type="text" class="form-control" placeholder="Correo Electronico" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Contraseña</span>
					    <input id="editPassword" name="password" pattern="[\S\s]{10,}" type="text" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">No. Teléfono</span>
					    <input id="editPhone_number" name="phone_number" pattern="^[0-9]{10}$" type="text" class="form-control" placeholder="No. Telefono" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

					<input type="hidden" name="action" value="edit">
					<input type="hidden" name="client_id" id="editId">
					<input type="hidden" name="global_token" value="<?= $_SESSION['global_token']?>">

		    </form>
		</div>
	</div>
</div>
