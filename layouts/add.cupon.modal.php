<div class="modal fade" id="add-cupon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar un nuevo cupón</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form method="" action="">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del cupón" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Código</span>
					    <input id="code" name="code" pattern="^[\w]+$" type="text" class="form-control" placeholder="Código del cupón" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Porcentaje de descuento</span>
					    <input id="password" name="password" pattern="^[0-9]+$" type="text" class="form-control" placeholder="Porcentanje del cupón" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Monto mínimo requerido</span>
					    <input id="phone_number" name="phone_number" pattern="^[0-9]+$" type="text" class="form-control" placeholder="Monto minimo requerido del cupón" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Fecha de finalizacion</span>
					    <input id="phone_number" name="phone_number" pattern="^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$" type="date" class="form-control" placeholder="Fecha de finalizacion del cupón" aria-label="Username" aria-describedby="basic-addon1" required>
					</div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>
		    </form>
		</div>
	</div>
</div>
