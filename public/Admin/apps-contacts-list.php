<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php');?>

<head>

    <title><?php echo $titulo ?> | Listado de Hermanos</title>

    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                            <h4 class="mb-sm-0 font-size-18">Lista de Hermanos que conforman Caleuche</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hermanos</a></li>
                                    <li class="breadcrumb-item active">Listado de hermanos</li>
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
                                        <a class="nav-link active" href="apps-contacts-list.php" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link" href="apps-contacts-grid.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid"><i class="bx bx-grid-alt"></i></a>
                                    </li>-->
                                </ul>
                            </div>

                            <!-- VIEW ONLY ADMIN USER-->
                            <?php
                                if ($_SESSION['category'] == 2 || $_SESSION['username'] == 'eruotolo'){
                            ?>
                            <div>
                                <a href="apps-contacts-register.php" class="btn btn-light"><i class="bx bx-plus me-1"></i> Nuevo Usuario</a>
                            </div>
                            <?php
                            } else{
                            ?>
                            <div>
                                <a href="apps-contacts-register.php" class="btn btn-light disabled" =""><i class="bx bx-plus me-1"></i> Nuevo Usuario</a>
                            </div>
                            <?php
                                }
                            ?>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="table-responsive mb-4">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre Completo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grado</th>
                                <th style="width: 80px; min-width: 80px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query ="SELECT *,U.id as 'uid' FROM users U
                            JOIN user_category UC
                            on U.category = UC.id_Cat
                            JOIN grado G 
                            on U.grado = G.id WHERE estado = 1";
                            $result_task = mysqli_query($link, $query);
                            while ($row = mysqli_fetch_Array($result_task))  {

                                ?>
                            <tr>
                                <th scope="row">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                        <label class="form-check-label" for="contacusercheck1"></label>
                                    </div>
                                </th>
                                <td>
                                    <img src="uploads/usuarios/<?php echo $row['image']?>" alt="" class="avatar-sm rounded-circle me-2">

                                    <a href="../admin/apps-contacts-profile-view.php?id=<?php echo $row['uid'] ?>" class="text-body"><?php echo $row['username'] ?></a>
                                </td>
                                <td><?php echo $row['name'] ?> <?php echo $row['lastname'] ?></td>
                                <td><?php echo $row['useremail'] ?></td>
                                <td><p><?php echo $row['grado_nombre'] ?></p></td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="../admin/apps-contacts-profile-view.php?id=<?php echo $row['uid'] ?>">Ver</a></li>

                                            <?php
                                                if ($_SESSION['category'] == 2 || $_SESSION['username'] == 'eruotolo'){
                                            ?>
                                            <li><a class="dropdown-item" href="../admin/apps-contacts-profile-edit.php?id=<?php echo $row['uid'] ?>">Editar</a></li>
                                            <li><a class="dropdown-item" href="controller/usuario-down.php?id_user=<?php echo $row['uid'] ?>">Inactivar</a></li>
                                            <li><a class="dropdown-item" href="controller/usuario-passdefault.php?id_user=<?php echo $row['uid'] ?>">Reset Password</a></li>
                                            <?php
                                                }else{
                                            ?>
                                            <li><a class="dropdown-item disabled" href="">Editar</a></li>
                                            <li><a class="dropdown-item disabled" href="">Inactivar</a></li>
                                            <li><a class="dropdown-item disabled" href="">Reset Password</a></li>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if ($_SESSION['username'] == 'eruotolo'){
                                            ?>
                                            <li><a class="dropdown-item cat-admin" href="controller/usuario-setadmin.php?id_user=<?php echo $row['uid'] ?>" style="color: #5156be">Set Admin</a></li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
                <!-- end table responsive -->

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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/datatable-pages.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>