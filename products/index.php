<?php 

	include "../app/ProductsController.php";
	include "../app/BrandController.php";

	$productController = new ProductsController();

	$brandController = new BrandController();

	// $products = $productController->getProducts();
	// $brands = $brandController->getBrands();

	#echo json_encode($_SESSION);
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
        <?php include "../layouts/sidebar.template.php"; ?>
        <?php include "../layouts/add.product.modal.php";?>

        <div class="main-content">

            <?php include "../layouts/bread.template.php"; ?>
            <!-- End Page-content -->
            <div class="row"> 
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product">
                                            + Añanir Producto
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
                                                    Productos <span class="badge badge-soft-danger align-middle rounded-pill ms-1"># de Productos</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content text-muted row">
                                    <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card border rounded-2" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card border" style="width: 18rem;">
                                                        <img src="../public/images/laptop.png" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Nombre del Producto</h5>
                                                            <p class="card-text">Descripcion del Producto</p>
                                                            <a href="#" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <a href="" class="btn btn-secondary mt-2"><i class="mdi mdi-square-edit-outline"></i> Editar</a>
                                                            <a href="" class="btn btn-danger mt-2"><i class="mdi mdi-delete"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../layouts/footer.template.php"; ?>
        </div>
    </div>



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