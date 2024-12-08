<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Productos Agotados</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Productos</h3>
                <p class="text-muted">Lista de Productos Agotados</p>
            </div>
            <div class="row mt-5 justify-content-evenly">
                <div class="col-12">
                    <div class="rounded shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Productos Agotados</h6>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                <button class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Producto</button>
                            </div>
                        </div>

                        <table id="tabla_productos_agotados" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Tipo</th>
                                    <th>Costo</th>
                                    <th>Precio (D)</th>
                                    <th>Precio (M)</th>
                                    <th>Stock</th>
                                    <th>Stock (G)</th>
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