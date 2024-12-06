<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Ingresos</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid cont-desktop ocultar">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-5">
                    <h3 class="m-0">Contabilidad</h3>
                    <h6 class="text-muted">Ingresos</h6>
                </div>

            </div>
            <div class="row mt-3 justify-content-center">
                <div class="row mt-3 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="card shadow-lg p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <form action="" id="ingresos" method="post" class="d-flex justify-content-center">
                                            <div class="form-group col-md-8">
                                                <label>Selecciona fechas:</label>
                                                <div class="input-group align-items-center">
                                                    <div class="input-group-addon">
                                                        <i class="fa-regular fa-calendar" style="font-size: 22px; margin-right: 5px;"></i>
                                                    </div>
                                                    <input type="text" id="daterange" name="daterange" class="form-control input_ganancia">
                                                    <button class="btn btn-ganancia" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-12 col-lg-4 mb-3 text-center">
                        <div class="config-band rounded-top">Efectivo</div>
                        <div class="card shadow-lg p-4">
                            <div>
                                <label>Efectivo (Bs): </label>
                                <p id="bs">0,00 Bs.D</p>
                                <label>Efectivo ($): </label>
                                <p id="dolar">0,00 $</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3 text-center">
                        <div class="config-band rounded-top">Bancos (Bs)</div>
                        <div class="card shadow-lg banks py-4">
                            <label>Pago Movil: </label>
                            <p id="pago_movil">0,00 Bs.D</p>
                            <label>Punto de venta: </label>
                            <p id="punto_venta">0,00 Bs.D</p>

                            <div class="config-band mb-3">Bancos ($)</div>
                            <h4>Proximamente</h4>
                            <!-- <label for="">Zelle: </label>
                        <p>0,00 $</p>
                        <label for="">Banesco Panamá: </label>
                        <p>0,00 $</p> -->
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3 text-center">
                        <div class="config-band rounded-top">Pendientes (Bs)</div>
                        <div class="card shadow-lg banks py-4">
                            <h4>Proximamente</h4>

                            <div class="config-band mb-3">Pendientes ($)</div>
                            <h4>Proximamente</h4>
                            <!-- <label for="">Nota de Crédito: </label>
                        <p>0,00 Bs.D</p>
                        <label for="">Vale: </label>
                        <p>0,00 $</p>
                        <label for="">Pendiente: </label>
                        <p>0,00 Bs.D</p> -->
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>




</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>