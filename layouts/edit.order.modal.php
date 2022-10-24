<div class="modal fade" id="edit-order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modificar orden</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Estado</span>
                        <select id="estado" class="form-control" name="estado">
								<option value='' class="dropdown-item">Cancelada</option>
                                <option value='' class="dropdown-item">Enviada</option>
                                <option value='' class="dropdown-item">Pagada</option>
                                <option value='' class="dropdown-item">Abandonada</option>
                                <option value='' class="dropdown-item">Pendiente de enviar</option>
                                <option value='' class="dropdown-item">Pendiente de pago</option>
                        </select>
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