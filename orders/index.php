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
        <?php include "../layouts/edit.order.modal.php";?>
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
                                                <div class="d-flex">
                                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block text-dark">Filtrar por fechas: 
                                                                <input type="date" class="border border-primary p-2 border-opacity-20 rounded-4">
                                                                <input type="date" value="2022-10-22" class="border border-primary p-2 border-opacity-20 rounded-4"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Folio</th>
                                        <th scope="col">Monto Total</th>
                                        <th scope="col">Información del cliente</th>
                                        <th scope="col">Direccion enviada</th>
                                        <th scope="col">Estado de la orden</th>
                                        <th scope="col">Método de pago</th>
                                        <th scope="col">Cupón utilizado</th>
                                        <th scope="col">Productos comprados</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                            <th scope="row">1419</th>
                                            <td>$ 15000</td>
                                            <td><ul>
                                                <li>
                                                    Marshall Parker
                                                </li>
                                                <li>
                                                    mapa_46@gmail.com
                                                </li>
                                                <li>
                                                    6127384765
                                                </li>
                                            </ul></td>
                                            <td>Calle articulo 743, 123, La Paz, Baja California Sur</td>
                                            <td>Pediente de pago</td>
                                            <td>Tarjeta de crédito</td>
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
                                            <td>
                                            <div class="hstack gap-3 fs-15">
                                                    <a href="#" data-user='' class="link-secondary" data-bs-toggle="modal" data-bs-target="#edit-order"><i class="ri-settings-4-line"></i></a>
                                                    <a href="#" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a type="button" class="badge badge-soft-primary" href="">
                                                    <i class="mdi mdi-square-edit-outline"></i> Ver Detalles
                                                </a>
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1419</th>
                                            <td>$ 15000</td>
                                            <td><ul>
                                                <li>
                                                    Marshall Parker
                                                </li>
                                                <li>
                                                    mapa_46@gmail.com
                                                </li>
                                                <li>
                                                    6127384765
                                                </li>
                                            </ul></td>
                                            <td>Calle articulo 743, 123, La Paz, Baja California Sur</td>
                                            <td>Pediente de pago</td>
                                            <td>Tarjeta de crédito</td>
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
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="#" data-user='' class="link-secondary" data-bs-toggle="modal" data-bs-target="#edit-order"><i class="ri-settings-4-line"></i></a>
                                                    <a href="#" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a type="button" class="badge badge-soft-primary" href="">
                                                    <i class="mdi mdi-square-edit-outline"></i> Ver Detalles
                                                </a>
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