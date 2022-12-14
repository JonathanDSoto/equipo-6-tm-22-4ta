<div class="modal fade" id="edit-tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Etiqueta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="<?php echo BASE_PATH?>tgs">
                <div class="modal-body">
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                        <input id="idEditNameTag" name="name" pattern="^[a-zA-Z ]+$" type="text" class="form-control" placeholder="Nombre de la categoria" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Descripcion</span>
                        <input id="idEditDescriptionTag" name="description" type="text" class="form-control" placeholder="DescripciÃ³n de la categoria" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Slug</span>
                        <input id="idEditSlugTag" name="slug" pattern="^[a-z0-9]+(?:-[a-z0-9]+)*$" type="text" class="form-control" placeholder="Slug de la categoria" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <input type="hidden" name="action" value="edit" id="oculto_input">
                <input type="hidden" name="id" id="idTagEdit">
                <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">

            </form>
        </div>
    </div>
</div>
