<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php');?>

<head>

    <title><?php echo $titulo ?> | Biblioteca</title>

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
                            <h4 class="mb-sm-0 font-size-18">Biblioteca de los QQ:.HH:. Compañeros</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Biblioteca</a></li>
                                    <li class="breadcrumb-item active">Listado de Libros</li>
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
                                        <a class="nav-link active" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="List"><i class="bx bx-list-ul"></i></a>
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
                                    <a href="apps-biblioteca-new.php" class="btn btn-light"><i class="bx bx-plus me-1"></i> Nuevo Libro</a>
                                </div>
                                <?php
                            } else{
                                ?>
                                <div>
                                    <a href="" class="btn btn-light disabled" =""><i class="bx bx-plus me-1"></i> Nuevo Libro</a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <!-- LISTADO DE TABLA -->
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
                                <th scope="col">Titulo</th>
                                <th scope="col">Autor</th>
                                <th style="width: 80px; min-width: 80px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query ="SELECT * FROM biblioteca B
                                            JOIN grado G on B.grado_Libro = G.id
                                            WHERE grado_Libro = 2";
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
                                <td><b><?php echo $row['nombre_Libro'] ?></b></td>
                                <td><?php echo $row['autor_Libro'] ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="apps-biblioteca-view.php?id_Libro=<?php echo $row['id_Libro'] ?>">Ver</a></li>

                                            <?php
                                            if ($_SESSION['category'] == 2 || $_SESSION['username'] == 'eruotolo'){
                                                ?>
                                                <li><a class="dropdown-item" href="../Admin/controller/libro-remove.php?id_Libro=<?php echo $row['id_Libro'] ?>">Eliminar</a></li>
                                                <?php
                                            } else{
                                                ?>
                                                <li><a class="dropdown-item disabled" href="#">Eliminar</a></li>
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
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End right Content here -->
    <!-- ============================================================== -->

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
