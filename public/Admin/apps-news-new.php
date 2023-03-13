<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php'; ?>

<head>

    <title>Listado de Noticias | Nueva Noticia</title>

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
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Registro de Nueva Noticia</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="apps-news-list.php">Noticias</a></li>
                                <li class="breadcrumb-item active">Registro de Nueva Noticia</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formulario de Registro de Nueva Noticia</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                        </div>
                        <div class="card-body">
                            <!-- ACA COMIENZA EL FORM-->
                            <form class="needs-validation mt-4 pt-2" action="controller/noticias.php" method="post" enctype="multipart/form-data">
                                <div class="row mb-4">
                                    <label for="titulo_Noticia" class="col-sm-3 col-form-label">Título Noticia</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="titulo_Noticia" id="titulo_Noticia" required>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="img_Noticia" class="col-sm-3 col-form-label">Imagen Principal</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" name="img_Noticia" id="img_Noticia" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="ext_Noticia" class="col-sm-3 col-form-label">Resumen</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="ext_Noticia" name="ext_Noticia" rows="3" cols="33" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="ext_Noticia" class="col-sm-3 col-form-label">Categoría</label>
                                    <div class="col-sm-5">
                                        <select name="id_Categoria" id="id_Categoria" class="form-select">
                                            <?php try {
                                                $sql = 'SELECT id_Categoria, name_Categoria FROM noticias_category';
                                                foreach ($link->query($sql) as $rowc) {
                                                    if ($row['name_Categoria']) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    ?>
                                                    <option <?= $selected ?> value="<?= $rowc['id_Categoria'] ?>"><?= $rowc['name_Categoria'] ?></option>
                                                    <?php
                                                }
                                            } catch (PDOException  $e) {
                                                echo "Error: " . $e;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="id_User" class="col-sm-3 col-form-label">Autor</label>
                                    <div class="col-sm-5">
                                        <select name="id_User" id="id_user" class="form-select">
                                            <?php try {
                                                $sql = 'SELECT id, username FROM users';
                                                foreach ($link->query($sql) as $rowc) {
                                                    if ($row['username']) {
                                                        $selected = 'selected="selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    ?>
                                                    <option <?= $selected ?> value="<?= $rowc['id'] ?>"><?= $rowc['username'] ?></option>
                                                    <?php
                                                }
                                            } catch (PDOException  $e) {
                                                echo "Error: " . $e;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="des_Noticia" class="col-sm-3 col-form-label">Desarrollo</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" id="des_Noticia" name="des_Noticia" rows="7" cols="33" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="gallery" class="col-sm-3 col-form-label">Galería</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" name="gallery[]" id="gallery" multiple>
                                    </div>
                                </div>
                                <div class="row mb-4 justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary w-md" type="submit" name="crear">Crear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- ACA TERMINA EL FORM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
<!-- validation init -->
<script src="assets/js/pages/validation.init.js"></script>

<script src="assets/js/app.js"></script>


</body>