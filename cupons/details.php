<?php
	include_once "../app/config.php";
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>  

    <meta charset="utf-8" />
    <title>Detalle-Cupon</title>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-dark">Informacion del cupón</span>
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
                                                                        <th class="ps-0" scope="row">Nombre: 15% off</th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Código: 15off</th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Porcentaje de descuento: 15%</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Monto mínimo requerido: $500</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Cantidad de productos mínimos requeridos: 5</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Fecha de inicio: 2022-08-15</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Fecha de finalización: 2022-09-28</th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Descuentos hechos por el cupón</h5>
                                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <h5 class="card-title mb-3">Orden #3</h5>
                                                                <h4 class="mb-3 text-dark px-5">$ 500</h4>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <h5 class="card-title mb-3">Orden #2</h5>
                                                                <h4 class="mb-3 text-dark px-5">$ 100</h4>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <h5 class="card-title mb-3">Orden #5</h5>
                                                                <h4 class="mb-3 text-dark px-5">$ 750</h4>
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
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
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-primary">Ódenes en las que se ha usado</span>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">6546</th>
                                            <td>$1596</td>
                                            <td>Calle 123,Azuqueca de Henares,Guadalajara,19200(codigo postal)</td>
                                            <td>Deposito</td>
                                            <td>Pendiente de pago</td>
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