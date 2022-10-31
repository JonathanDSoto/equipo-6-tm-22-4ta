<div class="modal fade" id="edit-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Editar una direccion</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form method="post" action="<?php echo BASE_PATH?>adrs">
			    <div class="modal-body">
                <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre(s)</span>
					    <input id="idEditName" name="first_name" type="text" class="form-control" placeholder="Nombre del residente" aria-label="Username" aria-describedby="basic-addon1">
					</div>
                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Apellidos</span>
					    <input id="idEditLastName" name="last_name" type="text" class="form-control" placeholder="Apellidos del residente" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Calle y No.</span>
					    <input id="EditStreet" name="street_and_use_number" type="text" class="form-control" placeholder="Calle y número" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Código postal</span>
					    <input id="EditCP" name="postal_code" type="text" class="form-control" placeholder="Código postal" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Ciudad</span>
					    <input id="EditCity" name="city" type="text" class="form-control" placeholder="Ciudad" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Estado</span>
					    <input id="EditProvince" name="province" type="text" class="form-control" placeholder="Estado" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">No. Teléfono</span>
					    <input id="idEditPhone" name="phone_number" type="text" class="form-control" placeholder="Número de teléfono" aria-label="Username" aria-describedby="basic-addon1">
					</div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

					<input type="hidden" name="action" value="update" id="oculto_input">
					<input type="hidden" name="address_id" value="" id="idEditId">
					<input type="hidden" name="is_billing_address" value="1" id="oculto_bAddress">
					<input type="hidden" name="client_id" value="<?php echo $getId->id ?>" id="oculto_cId">
					<input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">

		    </form>
		</div>
	</div>
</div>
