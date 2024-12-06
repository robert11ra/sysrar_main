<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Productos Agotados</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-5">
                    <h3 class="m-0">Productos</h3>
                    <p class="text-muted">Lista de Productos Agotados</p>
                </div>
                <div class="col d-flex justify-content-end align-items-start col_img">
                    <div class="dropdown dropstart">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bell"></i>
                        </button>
                        <div class="dropdown-menu p-2">
                            <p class="m-0">Tienes 3 Notificaciones</p>
                        </div>
                    </div>

                    <button class="btn hover">
                        <i class="fa-solid fa-layer-group"></i>
                    </button>

                    <button class="btn">
                        <img class="img-fluid img" src="/tmtnuevo/sistema/public/img/user.png" alt="" srcset="">
                    </button>
                </div>
            </div>
            <div class="row mt-5 justify-content-evenly">
                <div class="col-12">
                    <div class="card shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Productos Agotados</h6>
                            </div>
                            <div class="col-5 d-flex justify-content-end">
                                <button class="btn btn-card hover"><i class="fa-solid fa-plus"></i> Agregar Producto</button>
                            </div>
                        </div>

                        <table id="tabla_producto" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Modelo</th>
                                    <th>Proveedor</th>
                                    <th>Precio</th>
                                    <th>Precio - Costo</th>
                                    <th>Existencia</th>
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

<?php include '../include/scripts.php' ?>
<?php include '../include/footer.php' ?>


</html>