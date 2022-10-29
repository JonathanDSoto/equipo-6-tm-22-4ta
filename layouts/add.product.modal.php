-<link href="<?= BASE_PATH ?>public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Ingresar un Nuevo Producto</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data" method="post" action="<?php BASE_PATH?>">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Nombre</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Slug</span>
					    <input id="slug" name="slug" type="text" class="form-control" placeholder="Product slug" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Descripcion</span>
					    <input id="description" name="description" type="text" class="form-control" placeholder="Product description" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Caracteristicas </span>
					    <input id="features" name="features" type="text" class="form-control" placeholder="Caracteristicas del Producto" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Categorias</span>
						<div class="w-100 pt-2"></div>
					    <div class="form-check form-check-inline">
							<?php foreach ($brands as $brand){?>
								<input class="form-check-input" type="checkbox" id="<?php echo $tags->id?>" value="<?php echo $tags->id?>" name="categories[]">
								<label class="form-check-label" for="inlineCheckbox1"><?php echo $brand->name?></label>
								<br>
							<?php } ?>

						</div>
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Etiquetas</span>
						<div class="w-100 pt-2"></div>
					    <div class="form-check form-check-inline">
							<?php foreach ($tags as $tag){?>
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="tags[]">
								<label class="form-check-label" for="inlineCheckbox1"><?php echo $tag->name?> </label>
								<br>
							<?php } ?>

						</div>
						
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">Id de la Marca</span>
					    <select id="brand_id" class="form-control" name="brand_id">
                            <?php foreach ($brands as $brand){?>
								<option value='<?php echo $brand->id;?>' class="dropdown-item"><?php echo $brand->name;?></option>
							<?php } ?>
                        </select>
					</div>

					<div class="input-group mb-3">
					  <span class="input-group-text" id="basic-addon1">Imagen</span>
					  <input name="cover" type="file" class="form-control" placeholder="Product features" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Guardar</button>
			      </div>
			      
				<input id="oculto_input" type="hidden" name="action" value="create">
				<input id="id" type="hidden" name="id" value="update">
				<input type="hidden" value="global_token" name="<?php echo $_SESSION['global_token'] ?>">

		      </form>
		    </div>
		  </div>
		</div>