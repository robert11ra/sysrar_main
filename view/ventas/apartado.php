<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Apartado</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-3">
                    <h3 class="m-0">Facturas</h3>
                </div>

            </div>
            <div class="row mt-5 justify-content-evenly">
                <div class="col-12">
                    <div class="card shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Apartado</h6>
                                <p class="text-muted">Tabla de Apartados</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                <button class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Nueva Factura</button>
                            </div>
                        </div>

                        <table id="tabla_apartado" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vendedor</th>
                                    <th>Cliente</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total Dólares</th>
                                    <th>Total Bolivares</th>
                                    <th>Fecha</th>
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