<div class="modal fade" id="add-presentation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar una Nueva presentacion</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Descripcion</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Descripción de la presentacion" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Código</span>
					    <input id="description" name="description" type="text" class="form-control" placeholder="Código de la presentacion" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Peso en gramos</span>
					    <input id="slug" name="slug" type="text" class="form-control" placeholder="Peso en gramos de la presentacion" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Stock</span>
					    <input id="slug" name="slug" type="text" class="form-control" placeholder="Stock de la presentacion" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Stock mínimo</span>
                        <input id="slug" name="slug" type="text" class="form-control" placeholder="Stock mínimo de la presentacion" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Imagen</span>
					    <input name="cover" type="file" class="form-control" placeholder="Product features" aria-label="Username" aria-describedby="basic-addon1">
					</div>

                    <!-- Status ponerlo como active -->
                    <!-- En el postman pide un id de producto, asignale el del producto que se estan viendo los detalles -->
					
			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>

		    </form>
		</div>
	</div>
</div>