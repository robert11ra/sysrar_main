<!DOCTYPE html>
<html lang="es">

<head>
    <title>SYSRAR - Mas Vendidos</title>

    <?php include '../include/head.php' ?>


</head>

<body>
    <?php include '../include/nav.php' ?>

    <div class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-5">
                    <h3 class="m-0">Productos mas vendidos</h3>
                    <p class="text-muted">Lista de mas vendidos</p>
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
                <div class="col-12">
                    <div class="card shadow-lg p-4">
                        <div class="row">
                            <div class="col-12 col-lg-8 col-xxl-9">
                                <h6 class="mb-0">Productos mas vendidos</h6>
                                <p class="text-muted">Tabla de mas vendidos</p>
                            </div>

                            <div class="col-12 col-lg-4 col-xxl-3">
                                <div class="row">
                                    <form action="buscar_ganancias.php" method="post" class="d-flex justify-content-end">
                                            <div class="input-group align-items-center">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-calendar" style="font-size: 22px;"></i></span>
                                                <input type="text" name="daterange" value="" class="form-control input_ganancia"/>
                                                <button class="btn btn-ganancia" type="submit" name="submitRangeDates"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table id="tabla" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12</td>
                                    <td>Pedro</td>
                                    <td>pedro@example.com</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Pedro</td>
                                    <td>pedro@example.com</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Pedro</td>
                                    <td>pedro@example.com</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Pedro</td>
                                    <td>pedro@example.com</td>
                                </tr>

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