<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Clientes</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Clientes</h3>
                <p class="text-muted">Lista de Clientes</p>
            </div>

            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="mb-0">Clientes</h6>
                                <p class="text-muted">Tabla de clientes</p>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="nuevo_cliente.php" class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Cliente</a>
                            </div>
                        </div>

                        <table id="tabla_cliente" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Email</th>
                                    <th>Tipo Cliente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
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