<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Proveedores</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Proveedor</h3>
                <p class="text-muted">Lista de Proveedores</p>
            </div>

            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="mb-0">Proveedores</h6>
                                <p class="text-muted">Tabla de proveedores</p>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="nuevo_proveedor.php" class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Proveedor</a>
                            </div>
                        </div>

                        <table id="tabla_proveedores" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Proveedor</th>
                                    <th>RIF</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Direccion</th>
                                    <th>Estado</th>
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