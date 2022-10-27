<?php
	include_once "../app/config.php";
    include "../app/ProductsController.php";

    $prd = new ProductsController();
    $getIdProd = $prd->getProduct($_GET['slug']);
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Detalle Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_PATH ?>public/images/favicon.ico">

    <!--Swiper slider css-->
    <link href="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <?php include "../layouts/head.template.php"; ?>

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
    <?php include "../layouts/nav.template.php"; ?>
    <?php include "../layouts/add.presentation.modal.php";?>
        <?php include "../layouts/sidebar.template.php"; ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Product Details</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Productos</a></li>
                                        <li class="breadcrumb-item active">Detalles de producto</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gx-lg-5">
                                        <div class="col-xl-4 col-md-8 mx-auto">
                                            <div class="product-img-slider sticky-side-div">
                                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="<?= BASE_PATH ?>public/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="<?= BASE_PATH ?>public/images/products/img-6.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="<?= BASE_PATH ?>public/images/products/img-1.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="<?= BASE_PATH ?>public/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-xl-8">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>Full Sleeve Sweatshirt for Men (Pink)</h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div><a  class="text-primary d-block">Tommy Hilfiger</a></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Vendedor : <span class="text-body fw-medium">Insertar slug del brand</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Price :</p>
                                                                    <h5 class="mb-0">$120.40</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>

                                                <!-- end row -->

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Descripcion :</h5>
                                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                                </div>
                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Características :</h5>
                                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <h5 class="fs-14">Tags :</h5>
                                                            <ul class="list-unstyled">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full Sleeve</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Cotton</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All Sizes available</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <h5 class="fs-14">Categorias :</h5>
                                                            <ul class="list-unstyled">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full Sleeve</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Cotton</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All Sizes available</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-content -->
                                                <!-- Rating y Reviews -->
                                                <!-- end card body -->
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-presentation">
                                            Añadir presentación
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                    Presentaciones <span class="badge badge-soft-danger align-middle rounded-pill ms-1"># de Presentaciones</span>
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
                                        <th scope="col">Código</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope="row">Codigo123</th>
                                            <td>Codigo de la presentacion</td>
                                            <td>20</td>
                                            <td>1500</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="#" data-user='' class="link-secondary" data-bs-toggle="modal" data-bs-target="#add-presentation"><i class="ri-settings-4-line"></i></a>
                                                    <a href="#" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                            <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-primary">Ódenes donde se encuentra este producto</span>
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
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include "../layouts/footer.template.php"; ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <a href="#" class="btn btn-primary"> <i class="ri-arrow-up-line"></i></a>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="<?= BASE_PATH ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/node-waves/waves.min.js"></script>
    <script src="<?= BASE_PATH ?>public/libs/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_PATH ?>public/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= BASE_PATH ?>public/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="<?= BASE_PATH ?>public/libs/swiper/swiper-bundle.min.js"></script>

    <!-- ecommerce product details init -->
    <script src="<?= BASE_PATH ?>public/js/pages/ecommerce-product-details.init.js"></script>

    <!-- App js -->
    <script src="<?= BASE_PATH ?>public/js/app.js"></script>
</body>


</html>