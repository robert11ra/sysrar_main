<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Productos</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Productos</h3>
                <p class="text-muted">Lista de Productos</p>
            </div>


            <div class="row mt-5 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Productos</h6>
                                <p class="text-muted">Tabla de Productos</p>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                <a href="nuevo_producto.php" class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Producto</a>
                            </div>
                        </div>

                        <table id="tabla_producto" class="table table-hover">
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