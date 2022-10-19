<div class="modal fade" id="add-tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar una Nueva Etiqueta</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Nombre de la etiqueta" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Descripcion</span>
					    <input id="description" name="description" type="text" class="form-control" placeholder="Descripción de la etiqueta" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Slug</span>
					    <input id="slug" name="slug" type="text" class="form-control" placeholder="Slug de la etiqueta" aria-label="Username" aria-describedby="basic-addon1">
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