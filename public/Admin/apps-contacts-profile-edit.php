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
    while ($row  = mysqli_fetch_array($query_run)) {
    //    $usuario = $row;
?>


<?php

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $category = $_POST['category'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);


    if(isset($_FILES['file']) && $_FILES["file"]["error"] == 0){
        #file name with a random number so that similar dont get replaced
        $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];

        #temporary file name to store file
        $tname = $_FILES["file"]["tmp_name"];

        #upload directory path
        $uploads_dir = 'uploads/';

        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir . '/' . $pname);

        $query = "UPDATE users SET name='$name',lastname='$lastname',username='$username',useremail='$useremail',category='$category',password='$hash',image='$pname' WHERE id = $id";

    }else{
        $query = "UPDATE users SET name='$name',lastname='$lastname',username='$username',useremail='$useremail',category='$category',password='$hash'  WHERE id = $id";
    }

    $result = mysqli_query($link, $query);

    echo '<script> alert ("Actualizado")</script>';
    header('Location: apps-contacts-list.php');
}
?>

<head>

    <title>Editar Perfil de usuario |  Admin & Dashboard Template</title>
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
                            <h4 class="mb-sm-0 font-size-18">Perfil</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="apps-contacts-list.php">Usuarios</a></li>
                                    <li class="breadcrumb-item active">Perfil</li>
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
                                <h4 class="card-title">ACTUALIZACIÓN INFORMACIÓN USUARIO</h4>
                                <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                    textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                            </div>
                            <div class="card-body">
                                <!-- ACA COMIENZA EL FORM-->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?> ">
                                        <div class="col-2 justify-content-center align-items-center">
                                            <div class="avatar-xl me-3">
                                                <img src="uploads/<?php echo $row['image']?>" alt="Imagen de Perfil" class="img-fluid rounded-circle d-block">
                                                <input type="file" class="form-control" id="file" name="file" style="width: 148px; margin-top: 10px">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="mb-3">
                                                <label for="name">Nombre</label>
                                                <input type="text" class="form-control" id="name" required name="name" value="<?php echo $row['name'] ?>">

                                            </div>
                                            <div class="mb-3">
                                                <label for="username">Usuario</label>
                                                <input type="text" class="form-control" id="username" required name="username" value="<?php echo $row['username']  ?>">

                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Tipo de Usuario</label>
                                                <select id="category" class="form-select"  name="category">
                                                    <?php try {
                                                        $sql = 'SELECT id_Cat, cat_Nombre FROM user_category';
                                                        foreach ($link->query($sql) as $rowc) {
                                                            if ($row['cat_Nombre']) {
                                                                $selected = 'selected="selected"';
                                                            } else {
                                                                $selected = '';
                                                            }
                                                            ?>
                                                            <option <?= $selected ?> value="<?= $rowc['id_Cat'] ?>"><?= $rowc['cat_Nombre'] ?></option>
                                                            <?php
                                                        }
                                                    } catch (PDOException  $e) {
                                                        echo "Error: " . $e;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="mb-3">
                                                <label for="lastname">Apellido</label>
                                                <input type="text" class="form-control" id="lastname" required name="lastname" value="<?php echo $row['lastname']  ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="useremail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">@</div>
                                                    <input type="text" class="form-control" id="useremail" required name="useremail" value="<?php echo $row['useremail']  ?>">

                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" required name="password" value="<?php echo $row['password'] ?>" aria-describedby="password-addon">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="update" class="btn btn-primary w-md">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- FINALIZA EL FORM-->
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

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

<?php
    }
} else {
    echo '<script> alert ("No se a guardado")</script>';
    header('Location: apps-contacts-list.php');
}
?>




