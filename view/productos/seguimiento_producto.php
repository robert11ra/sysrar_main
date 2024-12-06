<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Seguimiento de Productos</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div class="container-fluid cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-5">
                    <h3 class="m-0">Productos</h3>
                    <p class="text-muted">Seguimiento de Productos</p>
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
            <div class="row mt-5">
                <div class="col-12 col-lg-6 mb-5">
                    <div class="col-12">
                        <div class="card shadow-lg p-4">
                            <label for="seguimiento" class="form-label">Seleccione un Producto</label>
                            <select class="form-select js-example-basic-single w-100" name="state">
                                <option></option>
                                <option value="a">Cargador Redmi 10</option>
                                <option value="a">Forro Redmi 10</option>
                            </select>
                            <div class="mt-3">
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
                <div class="col-12 col-lg-6">
                    <div class="col-12">
                        <div class="card shadow-lg p-4">
                            <p class="text-center">
                                Proveedor: N/A
                                Ultima vez añadido: 2022-03-31 12:30:12
                                Descripcion: adaptador europeo blanco
                                Cantidad Añadida Ult: 30 / Cantidad actual: 0
                                Precio Costo: 0.30
                                Precio Inicial Mayor: 0.45 / Precio Act Mayor: 0.45
                                Precio Inicial Detal: 2.00 / Precio Act Detal: 2.00
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="card shadow-lg p-4">
                            <p class="text-center">
                                Cantidad vendida hoy: No hay ventas
                                Cantidad vendida semanal actual: No hay ventas
                                Cantidad vendida de hace 7 dias: No hay ventas
                                Cantidad vendida mes actual: No hay ventas
                                Cantidad vendida mes pasado: No hay ventas
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="card shadow-lg p-4">
                            <p class="text-center">
                                Ganancia del dia de hoy: $No hay ventas
                                Ganancia de la semana actual: $No hay ventas
                                Ganancia de hace 7 dias: $No hay ventas
                                Ganancia del mes actual: $No hay ventas
                                Ganancia del mes pasado: $No hay ventas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Seleccione un Producto",
                allowClear: true
            });
        });
    </script>

</body>

<?php include '../include/scripts.php' ?>
<?php include '../include/footer.php' ?>


</html>