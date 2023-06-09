<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include('layouts/config.php');?>
<head>
    
    <title>User Grid | Minia - Admin & Dashboard Template</title>
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
                            <h4 class="mb-sm-0 font-size-18">Lista de Usuarios</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                                    <li class="breadcrumb-item active">Lista de Usuarios</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <!--<h5 class="card-title">Contact List <span class="text-muted fw-normal ms-2">(834)</span></h5>-->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../apps-contacts-list.php" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="apps-contacts-grid.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- VIEW ONLY ADMIN USER-->
                            <div>
                                <a href="../apps-contacts-register.php" class="btn btn-light"><i class="bx bx-plus me-1"></i> Nuevo Usuario</a>
                            </div>
                            

                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <?php
                    $query ="SELECT * FROM users U
                            JOIN user_category UC
                            on U.category = UC.id_Cat";
                    $result_task = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_Array($result_task))  {

                    ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="dropdown text-end">
                                    <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                      <i class="bx bx-dots-horizontal-rounded"></i>
                                    </a>
                                  
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="../admin/apps-contacts-profile.php?id=<?php echo $row['id'] ?>">Editar</a></li>
                                        <li><a class="dropdown-item" href="../admin/controller/usuarios-grid.php?id=<?php echo $row['id'] ?>">Eliminar</a></li>
                                    </div>
                                </div>
                                
                                <div class="mx-auto mb-4">
                                    <img src="../assets/images/users/avatar-2.jpg" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                </div>
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-body"><?php echo $row['name'] ?> <?php echo $row['lastname'] ?></a></h5>
                                <p class="text-muted mb-2"><?php echo $row['cat_Nombre'] ?></p>
                                <p><a href="mailto:<?php echo $row['useremail'] ?>"><?php echo $row['useremail'] ?></a></p>
                            </div>

                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                        <?php
                    }
                    ?>
                    
                </div>
                <!-- end row -->

                <!--<div class="row g-0 align-items-center mb-4">
                    <div class="col-sm-6">
                        <div>
                            <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-end">
                            <ul class="pagination mb-sm-0">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">4</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">5</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
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

<script src="../assets/js/app.js"></script>

</body>

</html>