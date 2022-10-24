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
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                    Órdenes <span class="badge badge-soft-danger align-middle rounded-pill ms-1"># de Ódenes</span>
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