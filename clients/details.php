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
                                    <a type="button" class="text-light mt-2" data-bs-toggle="modal" data-bs-target="#add-product">
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
                                                                        <th class="ps-0" scope="row">Creado por :</th>
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
                                <table class="table table-borderless table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Método de pago</th> 
                                        <th scope="col">Estado de la orden</th>
                                        <th scope="col">Cupón utilizado</th>
                                        <th scope="col">Productos ordenados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">6546</th>
                                        <td>$1596</td>
                                        <td>Calle 123,Azuqueca de Henares,Guadalajara,19200(codigo postal)</td>
                                        <td>Deposito</td>
                                        <td>Pendiente de pago</td>
                                        <td>10% off</td>
                                        <td>1xColchón Matrimonial Zero --- 2xComedor Miguel con 4 Sillas</td>
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

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
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