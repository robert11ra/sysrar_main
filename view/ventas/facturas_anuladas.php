<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Facturas Anuladas</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Venta</h3>
                <p class="text-muted">Lista de Facturas Anuladas</p>
            </div>
            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Facturas Anuladas</h6>
                                <p class="text-muted">Tabla de Facturas Anuladas</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                <a href="nueva_factura.php" class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Factura</a>
                            </div>
                        </div>

                        <table id="tabla_facturas_anuladas" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Vendedor</th>
                                    <th>Estado</th>
                                    <th>Total ($)</th>
                                    <th>Total (Bs)</th>
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