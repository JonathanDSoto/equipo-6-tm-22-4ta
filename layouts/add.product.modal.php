<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>

		    <form enctype="multipart/form-data" method="post" action="../app/ProductsController.php">
			    <div class="modal-body">
			      	<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">@</span>
					    <input id="name" name="name" type="text" class="form-control" placeholder="Product name" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">@</span>
					    <input id="slug" name="slug" type="text" class="form-control" placeholder="Product slug" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">@</span>
					    <input id="description" name="description" type="text" class="form-control" placeholder="Product description" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">@</span>
					    <input id="features" name="features" type="text" class="form-control" placeholder="Product features" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					    <span class="input-group-text" id="basic-addon1">@</span>
					    <select id="brand_id" class="form-control" name="brand_id">
                            <option value="">Escoge una Opcion</option>
                            <option value="">Opcion 1</option>
                            <option value="">Opcion 2</option>
                        </select>
					</div>

					<div class="input-group mb-3">
					  <span class="input-group-text" id="basic-addon1">@</span>
					  <input name="cover" type="file" class="form-control" placeholder="Product features" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>

			      <input id="oculto_input" type="hidden" name="action" value="create">

			      <input type="hidden" id="id" name="id">

		      </form>
		    </div>
		  </div>
		</div>