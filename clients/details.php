<?php
	include_once "../app/config.php";
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Mi Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_PATH ?>public/images/favicon.ico">

    <!-- swiper css -->
    <link rel="stylesheet" href="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.css">

    <!-- Layout config Js -->
    <script src="<?= BASE_PATH ?>public/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= BASE_PATH ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= BASE_PATH ?>public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= BASE_PATH ?>public/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= BASE_PATH ?>public/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include "../layouts/nav.template.php"; ?>
        <?php include "../layouts/sidebar.template.php"; ?>
        <?php include "../layouts/add.address.modal.php";?>
        <?php include "../layouts/add.photo.modal.php";?>
        <!-- ========== App Menu ========== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="<?= BASE_PATH ?>public/images/profile-bg.jpg" alt="" class="profile-wid-img" />

                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="<?= BASE_PATH ?>public/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                                    <a type="button" class="text-light mt-2" data-bs-toggle="modal" data-bs-target="#add-photo">
                                        <i class="mdi mdi-square-edit-outline "></i><a class="text-light" href="#"> Editar foto</a>
                                    </a>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1">Nombre</h3>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Detalles</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Información</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nombre :</th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Correo Electrónico :</th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Número de Teléfono :</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nivel de suscripcion :</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end tab-pane-->
                                </div>

                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-dark">Ódenes Realizadas</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Direccion enviada</th>
                                        <th scope="col">Estado de la orden</th>
                                        <th scope="col">Cupón utilizado</th>
                                        <th scope="col">Productos comprados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row">1419</th>
                                            <td>$ 5900</td>
                                            <td>Calle articulo 743, 123, La Paz, Baja California Sur</td>
                                            <td>Pediente de pago</td>
                                            <td>10% off</td>
                                            <td><ul>
                                                <li>
                                                    Colchón Matrimonial Zero
                                                </li>
                                                <li>
                                                    Comedor Miguel con 4 Sillas
                                                </li>
                                                <li>
                                                    Fitband Huawei Watch Fit 2 Rosa
                                                </li>
                                            </ul></td>
                                        </tr>
                                </tbody>
                            </table>
                            <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Compras con tarjeta:</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                    <th class="ps-0" scope="row">4 Compras --- $5000</th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
																						<div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Compras con efectivo:</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                    <th class="ps-0" scope="row">4 Compras --- $5000</th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
																						<div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Cupones utilizados:</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                    <th class="ps-0" scope="row">4 Compras --- $5000</th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end tab-pane-->
                                </div>

                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-address">
                                            Añadir direccion
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Direcciones -->
                            <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-dark">Direcciones registradas</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Calle y No.</th>
                                        <th scope="col">Código postal</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">No. teléfono</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Calle ejemplo #123</th>
                                        <td>23088</td>
                                        <td>La paz</td>
                                        <td>Baja California Sur</td>
                                        <td>61200000</td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a href="javascript:void(0);" class="link-secondary" data-bs-toggle="modal" data-bs-target="#add-address"><i class="ri-settings-4-line"></i></a>
                                                <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->
            <?php include "../layouts/footer.template.php"; ?>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <a href="#" class="btn btn-primary">Eliminar</a>
    <!--end back-to-top-->



    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>

    <!-- swiper js -->
    <script src="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="<?= BASE_PATH ?>public/js/pages/profile.init.js"></script>

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>
</body>


</html>
