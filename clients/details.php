<?php
	include "../app/ClientController.php";
	include "../app/AddressController.php";

	$cl = new ClientController();
	$getId = $cl->getClient($_GET['id']);
	$totalEfectivo = 0;
	$totalTarjeta = 0;
	$totalCupones = 0;
	$contEfec = 0;
	$contTar = 0;
	$contCup = 0;
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
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?php echo $getId->name?></h3>
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
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Información</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nombre : <?php echo $getId->name?></th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Correo Electrónico : <?php echo $getId->email?></th>
                                                                        <td class="text-muted"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Número de Teléfono : <?php echo $getId->phone_number?></th>
                                                                        <td class="text-muted">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nivel de suscripcion : <?php echo $getId->level->name?></th>
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
																	<?php if (isset($getId->orders)): ?>
	                                    <?php foreach($getId->orders as $order): ?>
                                        <tr>
                                            <th scope="row"><?php echo $order->folio?></th>
                                            <td>$<?php echo $order->total?></td>
                                            <td><?= isset($order->address->street_and_use_number)?$order->address->street_and_use_number:'Sin calle' ?>,
																							<?= isset($order->address->postal_code)?$order->address->postal_code:'Sin CP' ?>,
																							<?= isset($order->address->city)?$order->address->city:'Ciudad no especificada' ?>,
																							<?= isset($order->address->province)?$order->address->province:'Provincia no especificada' ?>
																						</td>
                                            <td><?php echo $order->order_status->name?></td>
                                            <td><?= isset($order->coupon->name)?$order->coupon->name:'No aplica' ?></td>
                                            <td><ul>
																							<?php if (isset($order->presentations)): ?>
							                                    <?php foreach($order->presentations as $presentation):
																										$subtotal = $presentation->current_price->amount * $presentation->pivot->quantity;
																										?>
                                                <li>
																									<?php echo $presentation->pivot->quantity?> -
                                                  <?php echo $presentation->description?> -
																									$<?php echo $subtotal?>
                                                </li>
																								<br>
																								<?php endforeach ?>
																							<?php endif ?>
                                            </ul></td>
                                        </tr>
																				<!--Se calculan el total de ventas según el tipo de pago-->
																				<?php
																				if (isset($order->coupon->name)):
																					$descuento = ($order->total * ($order->coupon->percentage_discount / 100) - $order->coupon->amount_discount);
																					$contCup++;
																					$totalCupones = $totalCupones + $descuento;
																				endif;
																					if ($order->payment_type->id == 1):
																						$contEfec++;
																						$totalEfectivo +=  $order->total;
																					elseif ($order->payment_type->id == 2):
																						$contTar++;
																						$totalTarjeta +=  $order->total;
																					endif?>
																				<!--Fin del calculo-->
																			<?php endforeach ?>
																	<?php endif ?>
                                </tbody>
                            </table>
                            <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Compras con tarjeta:</h5>
                                                        <p class="card-text h4">
																													<?= $contTar > 0?$contTar > 1?$contTar.' Compras ---- $'.$totalTarjeta:
																													$contTar.' Compra ---- $'.$totalTarjeta:'No se han registrado compras con este método.' ?>
																												</p>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
																						<div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Compras con efectivo:</h5>
																													<p class="card-text h4">
																														<?= $contEfec > 0?$contEfec > 1?$contEfec.' Compras ---- $'.$totalEfectivo:
																																$contEfec.' Compra ---- $'.$totalEfectivo:'No se han registrado compras con este método.' ?>
																													</p>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->
                                                <!--end card-->
                                            </div>
																						<div class="col-4">
                                                <div class="card text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Cupones utilizados:</h5>
																													<p class="card-text h4">
																														<?= $contCup > 0?$contCup > 1?$contCup.' Cupones utilizados ---- $'.$totalCupones:
																																$contCup.' Cupón utilizado ---- $'.$totalCupones:'No se han utilizado cupones en las compras.' ?>
																													</p>
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
                                            Añadir dirección
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
																	<?php if (isset($getId->addresses)): ?>
	                                    <?php foreach($getId->addresses as $address): ?>
                                    <tr>
                                        <th scope="row"><?php echo $address->street_and_use_number ?></th>
                                        <td><?php echo $address->postal_code?></td>
                                        <td><?php echo $address->city?></td>
                                        <td><?php echo $address->province?></td>
                                        <td><?php echo $address->phone_number?></td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a href="javascript:void(0);" data-user-edit-address='<?php echo json_encode($address)?>' onclick="editAddress(this)" class="link-secondary" data-bs-toggle="modal" data-bs-target="#edit-address"><i class="ri-settings-4-line"></i></a>
                                                <a href="javascript:void(0);" onclick="remove(<?php echo $address->id?>)" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
																	<?php endforeach ?>
															<?php endif ?>
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
		<?php include "../layouts/edit.address.modal.php";?>

		<script>
        function remove(id)
        {
            swal({
                title: "¿Estás seguro?",
                text: "Una vez borrado, no podras acceder de nuevo a esta marca",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                swal("¡La marca se borró con éxito!", {
                    icon: "success",
                });
                    var bodyFormData = new FormData();
                    bodyFormData.append('address_id', id);
                    console.log(id);
                    bodyFormData.append('action', 'delete');
                    bodyFormData.append('global_token', '<?php echo $_SESSION['global_token']?>');
                    axios.post("<?= BASE_PATH ?>adrs", bodyFormData)
                    .then(function (response){
                        console.log(response);
                    })
                        .catch(function (error){
                            console.log('error')
                        })
                } else {
                swal("No se borró la marca");
                }
            });
        }

				function editAddress(target)
        {
            let address = JSON.parse(target.getAttribute("data-user-edit-address"));

						document.getElementById("idEditName").value = address.first_name;
						document.getElementById("idEditLastName").value = address.last_name;
            document.getElementById("EditStreet").value = address.street_and_use_number;
            document.getElementById("EditCP").value = address.postal_code;
            document.getElementById("EditCity").value = address.city;
						document.getElementById("EditProvince").value = address.province;
						document.getElementById("idEditPhone").value = address.phone_number;
						document.getElementById("idEditId").value = address.id;
        }
    </script>



    <!--start back-to-top-->
    <a href="#" class="btn btn-primary">Eliminar</a>
    <!--end back-to-top-->

		<?php include "./../layouts/scripts.template.php"; ?>

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
