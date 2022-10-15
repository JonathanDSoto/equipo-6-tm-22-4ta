<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= BASE_PATH ?>public/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= BASE_PATH ?>public/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= BASE_PATH ?>public/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo BASE_PATH?>users">
                                <i class=" bx bx-user-circle"></i> <span data-key="t-widgets">Usuarios</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo BASE_PATH?>client">
                                <i class="bx bxs-user-rectangle"></i> <span data-key="t-widgets">Cliente</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo BASE_PATH?>products">
                                <i class=" bx bxs-shopping-bag-alt"></i> <span data-key="t-widgets">Productos</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="bx bxs-cart"></i> <span data-key="t-dashboards">Catálogos</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Categorías </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> Marcas </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-key="t-ecommerce"> Tags </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="widgets.html">
                                <i class=" ri-ticket-2-fill"></i> <span data-key="t-widgets">Cupones</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="widgets.html">
                                <i class="bx bxs-shopping-bag"></i> <span data-key="t-widgets">Órdenes</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
