<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    
    <title><?php echo $titulo ?> | Perfil</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>

</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Perfil del Q:. H:. Logueado</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="apps-contacts-list.php">Perfil Personal</a></li>
                                    <li class="breadcrumb-item active">Editar información Personal</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <img src="uploads/usuarios/<?php echo $_SESSION['image']; ?>" alt="" class="img-fluid rounded-circle d-block">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?php echo $_SESSION['name']; ?> <?php echo $_SESSION['lastname']; ?></h5>
                                                    <?php
                                                        if ($_SESSION['grado'] == 1){
                                                    ?>
                                                        <p class="text-muted font-size-13">Aprendiz</p>
                                                    <?php
                                                        }elseif ($_SESSION['grado'] == 2){
                                                    ?>
                                                        <p class="text-muted font-size-13">Compañero</p>
                                                    <?php
                                                        }else{
                                                    ?>
                                                        <p class="text-muted font-size-13">Maestro</p>
                                                    <?php
                                                        }
                                                    ?>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-2 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>F. Nacimiento: <b><?php echo date("d/m/Y", strtotime($_SESSION['date_birthday'])); ?></b></div>

                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Teléfono: <b><?php echo $_SESSION['phone']; ?></b></div>

                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Email: <b><?php echo $_SESSION['useremail']; ?></b></div>

                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Ciudad: <b><?php echo $_SESSION['city']; ?></b></div>

                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Dirección: <b><?php echo $_SESSION['address']; ?></b></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="apps-perfile-edit.php" class="btn btn-soft-light"><i class="me-1"></i> Editar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Trazados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Publicaciones</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Trazados</h5>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="about" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Publicaciones</h5>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->


                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include 'layouts/vendor-scripts.php'; ?>

<script src="assets/js/app.js"></script>

</body>

</html>