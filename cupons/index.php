<?php 
    include_once "../app/config.php";
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
	<?php include "../layouts/head.template.php"; ?>
    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.css">
    <!-- gridjs css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/gridjs/theme/mermaid.min.css">
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
    	<?php include "../layouts/nav.template.php"; ?>
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php";?>
        <?php include "../layouts/add.user.modal.php";?>
        <div class="main-content">
            <?php include "../layouts/bread.template.php"; ?>
            <!-- End Page-content -->
            <!-- Tables Without Borders -->
            <div class="row ms-2"> 
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user">
                                            Añadir Usuario
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                    Usuarios <span class="badge badge-soft-danger align-middle rounded-pill ms-1"># de Usuarios</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <table class="table table-borderless table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Correo electrónico</th>
                                        <th scope="col">No teléfono</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Creado por</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                
                                                    <a href="#" data-user='' class="link-secondary" data-bs-toggle="modal" data-bs-target="#add-user"><i class="ri-settings-4-line"></i></a>
                                                    <a href="#" class="link-danger" id="sa-warning"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a type="button" class="badge badge-soft-primary" href="">
                                                    <i class="mdi mdi-square-edit-outline"></i> Ver Detalles
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../layouts/footer.template.php"; ?>
        </div>
    </div>
    
    <?php

include "../layouts/add.user.modal.php";

?>




    </script>



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->
    <?php include "../layouts/scripts.template.php"; ?>
    <!-- nouisliderribute js -->
    <script src="<?= BASE_PATH ?>public/libs/nouislider/nouislider.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/wnumb/wNumb.min.js"></script>
    <!-- gridjs js -->
    <script src="<?= BASE_PATH ?>public/libs/gridjs/gridjs.umd.js"></script>
    <!-- ecommerce product list -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-list.init.js"></script>
    


</body>


</html>