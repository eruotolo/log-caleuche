<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php
include('layouts/config.php');
session_start();

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$query_run = mysqli_query($link, $query);

if ($query_run) {
//$usuario = array();
    while ($row = mysqli_fetch_array($query_run)) {
//$usuario = $row;
        ?>

        <head>

            <title><?php echo $titulo ?> | Ver Perfil de hermano</title>

            <?php include 'layouts/head.php'; ?>

            <!-- DataTables -->
            <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
                  type="text/css"/>

            <!-- Responsive datatable examples -->
            <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
                  type="text/css"/>

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
                                    <h4 class="mb-sm-0 font-size-18">Ver Información del Q:.H:.</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="apps-contacts-list.php">Hermanos</a>
                                            </li>
                                            <li class="breadcrumb-item active">Información</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">INFORMACIÓN del Q:. H:.</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- ACA COMIENZA LA INFORMACIÓN DEL Q:. H:.-->
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="uploads/usuarios/<?php echo $row['image'] ?>"
                                                     alt="Imagen de Perfil" class="img-fluid rounded-circle d-block">
                                            </div>
                                            <div class="col-5 info-personal">
                                                <h3>Información Personal</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="name">Nombre del Q:.H:.</label>
                                                            <input type="name" class="form-control"
                                                                   value="<?php echo $row['name'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="lastname">Apellido del Q:.H:.</label>
                                                            <input type="lastname" class="form-control"
                                                                   value="<?php echo $row['lastname'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="birthday">Fecha de cumpleaños</label>
                                                            <input type="date" class="form-control"
                                                                   value="<?php echo $row['date_birthday'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="phone">Teléfono</label>
                                                            <input type="phone" class="form-control"
                                                                   value="+56<?php echo $row['phone'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control"
                                                           value="<?php echo $row['useremail'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city">Ciudad</label>
                                                    <input type="address" class="form-control"
                                                           value="<?php echo $row['city'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address">Dirección</label>
                                                    <input type="address" class="form-control"
                                                           value="<?php echo $row['address'] ?>" disabled>
                                                </div>

                                            </div>
                                            <div class="col-5 info-personal">
                                                <h3>Datos Masonicos</h3>
                                                <div class="mb-3">
                                                    <label for="grado">Grado</label>
                                                    <?php
                                                    if ($row['grado'] == 1) {
                                                        ?>
                                                        <input type="grado" class="form-control" value="Aprendiz"
                                                               disabled>
                                                        <?php
                                                    } elseif ($row['grado'] == 2) {
                                                        ?>
                                                        <input type="grado" class="form-control" value="Compañero"
                                                               disabled>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="grado" class="form-control" value="Maestro"
                                                               disabled>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="oficial">Cargo en la Oficialidad</label>
                                                    <?php
                                                    if ($row['oficialidad'] == 1) {
                                                        ?>
                                                        <input type="oficial" class="form-control" value="Ninguno"
                                                               disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 2) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Venerable Maestro" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 3) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Primer Vigilante" disabled>

                                                        <?php
                                                    } elseif ($row['oficialidad'] == 4) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Segundo Vigilante" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 5) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Orador" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 6) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Secretario" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 7) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Tesorero" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 8) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Hospitalario" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 9) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Maestro de Ceremonia" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 10) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Maestro Experto" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 11) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Guarda Templo" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 12) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Maestro de Banquetes" disabled>
                                                        <?php
                                                    } elseif ($row['oficialidad'] == 13) {
                                                        ?>
                                                        <input type="oficial" class="form-control"
                                                               value="Maestro de Armonía" disabled>
                                                        <?php
                                                    }
                                                    ?>


                                                </div>
                                                <div class="mb-3">
                                                    <label for="initiation">Fecha de Iniciación</label>
                                                    <input type="date" class="form-control"
                                                           value="<?php echo $row['date_initiation'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="salario">Fecha de Aumento de Salario</label>
                                                    <input type="date" class="form-control"
                                                           value="<?php echo $row['date_salary'] ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="salario">Fecha de Exaltación</label>
                                                    <input type="date" class="form-control"
                                                           value="<?php echo $row['date_exalted'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'layouts/footer.php'; ?>
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


        <?php
    }
} else {
    echo '<script> alert ("No se a guardado")</script>';
    header('Location: apps-contacts-list.php');
}
?>
