<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Nomina</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div class="container-fluid cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Contabilidad</h3>
                <p class="text-muted">Lista de Nomina</p>
            </div>
            <div class="row mt-3 justify-content-evenly">
                <div class="col-12">
                    <div class="card2 rounded-2 shadow-lg p-4">
                        <form action="" id="nomina" method="post" class="d-flex justify-content-left mb-3">
                            <div class="form-group col-12 col-md-6 col-lg-4">
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
                        <table id="tabla_nomina" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Periodo</th>
                                    <th>Monto ($)</th>
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

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalles</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tabla_comisiones" style="width: 100%;" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Venta</th>
                                        <th>Comisión (%)</th>
                                        <th>Comisión Total</th>
                                        <th>Tipo Venta</th>
                                        <th>Estado Comisión</th>
                                        <th>Pago Nómina</th>
                                        <th>Empleado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <h5>Total en salario: $<span id="salary"></span></h5>
                            <h5>Total en comisiones: $<span id="suma"></span></h5>
                            <h5>Total en salario + comisiones: $<span id="total_salary"></span></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="pagar_nomina" class="btn btn-success">Pagar nomina</button>
                </div>
            </div>
        </div>
    </div>


</body>


<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>

</html>