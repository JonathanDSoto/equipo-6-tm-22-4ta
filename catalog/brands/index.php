<?php
    include_once "../../app/config.php";

    include "../../app/BrandController.php";

    $brandsCont = new BrandController();
    $brands = $brandsCont->getBrands();
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
        <?php include "../../layouts/add.brands.modal.php";?>


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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-brand">
                                            Añadir nueva marca
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (isset($brands) && count($brands)>0): ?>
                                    <?php foreach($brands as $brand): ?>

                                        <?php $cont++?>

                                    <?php endforeach ?>
                                <?php endif ?>

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                    Marcas <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo $cont ?> Marcas</span>
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
                                    <?php if (isset($brands) && count($brands)>0): ?>
                                        <?php foreach($brands as $brand): ?>

                                            <tr>
                                            <th scope="row"><?php echo $brand->id?></th>
                                            <td><?php echo $brand->name?></td>
                                            <td><?php echo $brand->description?></td>
                                            <td><?php echo $brand->slug?></td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-user-edit-brand='<?php echo json_encode($brand)?>' onclick="editBrand(this)" class="link-secondary" data-bs-toggle="modal" data-bs-target="#edit-brand"><i class="ri-settings-4-line"></i></a>
                                                    <a- href="javascript:void(0);" onclick="remove(<?php echo $brand->id ?>)" class="link-danger"><i class="ri-delete-bin-5-line"></i></a->
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
            <?php include "../../layouts/edit.brand.modal.php"; ?>
        </div>
    </div>

    <script>
        function remove(id)
        {
            swal({
                title: "¿Estás seguro?",
                text: "Una vez borrado, no podras acceder de nuevo a esta marca",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                swal("¡La marca se borró con éxito!", {
                    icon: "success",
                });
                    var bodyFormData = new FormData();
                    bodyFormData.append('brand_id', id);
                    console.log(id);
                    bodyFormData.append('action', 'delete');
                    bodyFormData.append('global_token', '<?php echo $_SESSION['global_token']?>');
                    axios.post("<?= BASE_PATH ?>brds", bodyFormData)
                    .then(function (response){
                        console.log(response);
                    })
                        .catch(function (error){
                            console.log('error')
                        })
                } else {
                swal("No se borró la marca");
                }
            });
        }

        function editBrand(target)
        {
            let brands = JSON.parse(target.getAttribute("data-user-edit-brand"));


            document.getElementById("idEditNameBrand").value = brands.name;
            document.getElementById("idEditDescriptionBrand").value = brands.description;
            document.getElementById("idEditSlugBrand").value = brands.slug;
            document.getElementById("idBrandEdit").value = brands.id;
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
