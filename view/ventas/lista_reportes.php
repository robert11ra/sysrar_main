<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Reportes</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-3">
                    <h3 class="m-0">Reportes</h3>
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
                        <img class="img-fluid img" src="../../public/img/user.png" alt="" srcset="">
                    </button>
                </div>
            </div>
            <div class="row mt-5 justify-content-evenly">
                <div class="col-12 mb-3">
                    <div class="card col-12 col-lg-4 col-xxl-3 px-2 py-1">
                        <form action="" method="post" class="d-flex">
                            <div class="form-group w-100">
                                <label>Selecciona fechas:</label>
                                <div class="input-group align-items-center">
                                    <div class="input-group-addon">
                                        <i class="fa-regular fa-calendar" style="font-size: 22px; margin-right: 5px;"></i>
                                    </div>
                                    <input type="text" name="daterange" value="" class="form-control input_ganancia" />
                                    <button class="btn btn-ganancia" type="submit" name="submitRangeDates"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="card col-12 col-lg-4 col-xxl-3 px-2 py-1">
                        <form action="" method="post" class="d-flex">
                            <div class="form-group w-100">
                                <label>Imprimir Reporte Mensual:</label>
                                <div class="input-group align-items-center">
                                    <input type="month" name="month" value="" class="form-control input_ganancia"/>
                                    <button class="btn btn-ganancia" type="submit" name="submitRangeDates"><i class="fa-solid fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow-lg p-4">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-0">Reportes</h6>
                                <p class="text-muted">Tabla de Reportes</p>
                            </div>
                        </div>
                        <table id="tabla" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha/Hora</th>
                                    <th>Total</th>
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