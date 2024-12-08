<!DOCTYPE html>
<html lang="es">

<head>
    <title>SYSRAR - Mas Vendidos</title>

    <?php include '../include/head.php' ?>


</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Productos mas vendidos</h3>
                <p class="text-muted">Lista de mas vendidos</p>
            </div>
            <div class="row mt-4 justify-content-around">
                <div class="col-11 col-lg-5 card justify-content-center shadow py-4 px-0 mb-4">
                    <div class="mb-4">
                        <h5 class="fw-bold text-center text-decoration-underline">Producto Mas Vendido</h5>
                    </div>
                    <div class="row justify-content-center m-0 gap-4">

                        <div class="col-12 bg-success-subtle">
                            <div class="row text-center py-3 px-2">
                                <div class="fw-bold fs-5 col-12 col-lg-6 p-0 align-content-center">
                                    <p class="mb-0">Carne Guisada</p>
                                </div>
                                <div class="fw-bold fs-5 col-12 col-lg-6 p-0 align-content-center">
                                    <p class="mb-0">Total Vendido: <span class="text-success">1071,53 Bs.D</span></p>
                                </div>
                            </div>

                        </div>
                        <div class="col-11 col-lg-5 bg-secondary-subtle align-content-center rounded" style="min-height: 5rem;">
                            <p class="text-center mb-0">Ha vendido este Mes:
                                <br>
                                <span class="fw-bold text-success">876,33 Bs.D</span>
                            </p>
                        </div>
                        <div class="col-11 col-lg-5 bg-secondary-subtle align-content-center rounded" style="min-height: 5rem;">
                            <p class="text-center mb-0">Ha vendido esta semana:
                                <br>
                                <span class="fw-bold text-success">201,73 Bs.D</span>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-11 col-lg-5 card shadow p-4 mb-4">
                    <div class="mb-2">
                        <h6 class="fw-bold text-center text-decoration-underline">5 Productos Mas Vendidos Este Mes</h6>
                    </div>
                    <table id="tabla" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12</td>
                                <td>Jamon</td>
                                <td>200 Bs.D</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Queso</td>
                                <td>300 Bs.D</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Pan</td>
                                <td>150 Bs.D</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Tunometecabra</td>
                                <td>457 Bs.D</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-4">
                    <div class="card2 rounded shadow-lg p-4">
                        <div class="row">
                            <div class="col-7">
                                <h6 class="mb-0">Productos Mas Vendidos</h6>
                                <p class="text-muted">50 Productos Mas Vendidos</p>
                            </div>
                            <form action="" id="nomina" method="post" class="d-flex justify-content-left col-5 mb-3">
                                <div class="form-group col-11">
                                    <label>Selecciona fechas:</label>
                                    <div class="input-group align-items-center">
                                        <div class="input-group-addon">
                                            <i class="fa-regular fa-calendar pe-2" style="font-size: 22px;"></i>
                                        </div>
                                        <input type="text" name="daterange" value="" class="form-control input-nomina">
                                        <button class="btn btn-ganancia" type="submit" name="submitRangeDates"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
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

<?php include '../include/scripts.php' ?>
<?php include '../include/footer.php' ?>


</html>