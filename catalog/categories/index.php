<?php
    include_once "../../app/config.php";
    include "../../app/CategoryController.php";

    $categoryCont = new CategoryController();
    $categories = $categoryCont->getAll();

    $cont = 0;


?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

	<?php include "../../layouts/head.template.php"; ?>

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.css">

    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/gridjs/theme/mermaid.min.css">
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ========== App Menu ========== -->
        <?php include "../../layouts/nav.template.catalog.php"; ?>
        <?php include "../../layouts/sidebar.template.php";?>
        <?php include "../../layouts/add.categorie.modal.php";?>


        <div class="main-content">

            <?php include "../../layouts/bread.template.php"; ?>
            <!-- End Page-content -->
            <!-- Tables Without Borders -->
            <div class="row ms-2">
                <div class="col-xl-12 col-lg-12 mb-5">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-categorie">
                                            Añadir nueva categoria
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($categories) && count($categories)>0): ?>
                                    <?php foreach($categories as $categorie): ?>

                                        <?php $cont++?>

                                    <?php endforeach ?>
                                <?php endif ?>

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                Categorias <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo $cont ?> Categorias</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($categories) && count($categories)>0): ?>
                                        <?php foreach($categories as $categorie): ?>

                                            <tr>
                                            <th scope="row"><?php echo $categorie->id?></th>
                                            <td><?php echo $categorie->name?></td>
                                            <td><?php echo $categorie->description?></td>
                                            <td><?php echo $categorie->slug?></td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-user-edit-categ='<?php echo json_encode($categorie)?>' onclick="editCategory(this)" class="link-secondary" data-bs-toggle="modal" data-bs-target="#edit-categorie"><i class="ri-settings-4-line"></i></a>
                                                    <a href="javascript:void(0);" onclick="remove(<?php echo $categorie->id ?>)" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                </div>
                                            </td>

                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../../layouts/footer.template.php"; ?>
            <?php include "../../layouts/edit.categorie.modal.php"; ?>

        </div>
    </div>

    <script>
        function remove(id)
        {
            swal({
                title: "¿Estás seguro?",
                text: "Una vez borrado, no podras acceder de nuevo a esta categoria",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                swal("¡La categoria se borró con éxito!", {
                    icon: "success",
                });
                    var bodyFormData = new FormData();
                    bodyFormData.append('id', id);
                    console.log(id);
                    bodyFormData.append('action', 'delete');
                    bodyFormData.append('global_token', '<?php echo $_SESSION['global_token']?>');
                    axios.post("<?= BASE_PATH ?>ctg", bodyFormData)
                    .then(function (response){
                        console.log(response);
                    })
                        .catch(function (error){
                            console.log('error')
                        })
                } else {
                swal("No se borró la categoria");
                }
            });
        }

        function editCategory(target)
        {
            let categories = JSON.parse(target.getAttribute("data-user-edit-categ"));


            document.getElementById("idEditNameCateg").value = categories.name;
            document.getElementById("idEditDescriptionCateg").value = categories.description;
            document.getElementById("idEditSlugCateg").value = categories.slug;
            document.getElementById("idCatgEdit").value = categories.id;
        }
    </script>



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <?php include "../../layouts/scripts.template.php"; ?>

    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>

    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>

</body>
</html>
