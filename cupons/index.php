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
        <?php include "../layouts/add.cupon.modal.php";?>
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cupon">
                                            Añadir cupón
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
                                                    Cupones <span class="badge badge-soft-danger align-middle rounded-pill ms-1"># de Cupones</span>
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
                                        <th scope="col">Código</th>
                                        <th scope="col">Porcentaje de descuento</th>
                                        <th scope="col">Monto minimo requerido</th>
                                        <th scope="col">Usos máximos</th>
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Fecha de finalización</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>10% off</td>
                                            <td>10%off</td>
                                            <td>10</td>
                                            <td>$ 200</td>
                                            <td>50</td>
                                            <td>2022-10-04</td>
                                            <td>2022-10-04</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="#" data-user='' class="link-secondary" data-bs-toggle="modal" data-bs-target="#add-cupon"><i class="ri-settings-4-line"></i></a>
                                                    <a href="#" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
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