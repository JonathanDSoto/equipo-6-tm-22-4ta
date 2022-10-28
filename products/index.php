<?php 

	include "../app/ProductsController.php";
	include "../app/BrandController.php";
    include "../app/TagController.php";


	$productController = new ProductsController();
    $product = $productController->getProducts();

	$brandController = new BrandController();
    $brands = $brandController->getBrands();

    $tagController = new TagController();
    $tags = $tagController->getAll();

    $contProd=0;

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
                                        <button type="button" onclick="addProduct()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product">
                                             Añadir Producto
                                        </button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (isset($product) && count($product)>0): ?>
                                    <?php foreach($product as $prd): ?>

                                        <?php $contProd++?>

                                    <?php endforeach ?>
                                <?php endif ?>

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                    Productos <span class="badge badge-soft-danger align-middle rounded-pill ms-1"><?php echo $contProd?> Productos</span>
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
                                            <?php if (isset($product) && count($product)>0): ?>
                                                <?php foreach($product as $productAct): ?>

                                                    <div class="col">
                                                    <div class="card border rounded-2" style="width: 18rem;">
                                                        <img src="<?php echo $productAct->cover?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $productAct->name?></h5>
                                                            <p class="card-text"><?php echo $productAct->description?></p>
                                                            <a href="<?= BASE_PATH."products/details/".$productAct->slug ?>/" class="btn btn-primary"><i class="bx bxs-comment-detail"></i> Detalles del Producto</a>
                                                            <button type="button" class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#add-product">
                                                                <i class="mdi mdi-square-edit-outline"></i><a data-product='<?php echo json_encode($productAct)?>' onclick="editProduct(this)"> Editar</a>
                                                            </button>
                                                            <button type="button" onclick="remove(<?php echo $productAct->id ?>)" class="btn btn-danger mt-2" id="sa-warning"><i class="mdi mdi-square-edit-outline"></i><a>  Eliminar</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach ?> 
                                            <?php endif ?>
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

    <script>

function remove(id)
        {
            swal({
                title: "¿Estás seguro?",
                text: "Una vez borrado, no podras acceder de nuevo a este cliente!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                swal("¡El cliente se borró con éxito!", {
                    icon: "success",
                });
                    var bodyFormData = new FormData();
                    bodyFormData.append('id', id);
                    console.log(id);
                    bodyFormData.append('action', 'delete');
                    bodyFormData.append('global_token', '<?php echo $_SESSION['global_token']?>');
                    axios.post("<?= BASE_PATH ?>products", bodyFormData)
                    .then(function (response){
                        console.log(response);
                    })
                        .catch(function (error){
                            console.log('error')
                        })
                } else {
                swal("No se borró el cliente");
                }
            });
        }
        function addProduct(){

            document.getElementById("oculto_input").value = "create";

        }

        function editProduct(target){

            let products = JSON.parse(target.getAttribute("data-product"));


            document.getElementById("name").value = products.name;
            document.getElementById("slug").value = products.slug;
            document.getElementById("description").value = products.description;
            document.getElementById("features").value = products.features;
            document.getElementById("brand_id").value = products.brand_id;
            document.getElementById("id").value = products.id;

        }
    </script>



    <!--start back-to-top-->
    <a href="#" class="btn btn-primary"> <i class="ri-arrow-up-line"></i></a>
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