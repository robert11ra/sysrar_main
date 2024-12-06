<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Usuarios</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Usuario</h3>
                <p class="text-muted">Lista de Usuarios</p>
            </div>

            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="mb-0">Usuarios</h6>
                                <p class="text-muted">Tabla de usuarios</p>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="nuevo_usuario.php" class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Usuario</a>
                            </div>
                        </div>

                        <table id="tabla_usuario" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estatus</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>




</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>