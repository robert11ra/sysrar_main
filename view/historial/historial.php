<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Historial</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Historial</h3>
                <p class="text-muted">Historial</p>
            </div>

            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="mb-0">Historial</h6>
                                <p class="text-muted">Historial</p>
                            </div>
                        </div>

                        <table id="tabla_historial" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Usuario</th>
                                    <th>Campo modificado</th>
                                    <th>Movimiento</th>
                                    <th>Valor anterior</th>
                                    <th>Valor posterior</th>
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