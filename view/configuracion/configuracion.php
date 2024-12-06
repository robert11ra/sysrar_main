<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Configuracion</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>


    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-5">
                <h3 class="m-0">Configuracion</h3>
                <p class="text-muted">Panel de Control</p>
                <button id="internet" style="display: none;"></button>
            </div>
            
            <div class="row mt-3 justify-content-center">
                <div class="col-12 col-md-6 col-lg-6 col-xl-4 d-flex justify-content-center mb-5">
                    <div class="col-12 col-lg-11">
                        <div class="card-2 shadow p-3">
                            <div class="text-center">
                                <img src="../../public/img/logoConfig.png" class="p-0 img-config">
                            </div>
                            <div class="text-center rounded config-band mb-3">Configuracion del Sistema</div>
                            <form class="border rounded p-3" action="" enctype="multipart/form-data">
                                <input type="hidden" id="id_user" name="id_user" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">
                                <div class="mb-3">
                                    <label for="tickera" class="form-label">Modelo Tickera:</label>
                                    <input type="text" class="form-control" id="tickera" name="tickera">
                                </div>
                                <div class="mb-3">
                                    <label for="comission_detal" class="form-label">Comision detal (%):</label>
                                    <input type="number" step="0.01" min='0' class="form-control" id="comission_detal" name="comission_detal" onkeydown="return restrictInput(this, event)">
                                </div>
                                <div class="mb-3">
                                    <label for="comission_mayor" class="form-label">Comision mayor (%):</label>
                                    <input type="number" step="0.01" min='0' class="form-control" id="comission_mayor" name="comission_mayor" onkeydown="return restrictInput(this, event)">
                                </div>
                                <div class="mb-3">
                                    <label for="type_comission" class="form-label">Llevar comisiones:</label>
                                    <select name="type_comission" class="form-select" id="type_comission">
                                        <option value="1">No llevar comisiones</option>
                                        <option value="2">Por monto total de la venta</option>
                                        <option value="3">Por cantidad de unidades de la venta</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tasa_bcv" class="form-label">Tasa del $ (BCV):</label>
                                    <input type="number" step="0.01" min="0.01" class="form-control" id="tasa_bcv" name="tasa_bcv" onkeydown="return restrictInput(this, event)">
                                </div>
                                <div class="mb-3">
                                    <label for="tasa_paralelo" class="form-label">Tasa del $ (Paralelo):</label>
                                    <input type="number" step="0.01" min="0.01" class="form-control" id="tasa_paralelo" name="tasa_paralelo" onkeydown="return restrictInput(this, event)">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="editar_configuracion" class="btn btn-panel"><i class="fa-solid fa-floppy-disk"></i> Guardar Datos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-4 d-flex justify-content-center mb-5">
                    <div class="col-12 col-lg-11">

                        <div class="card-2 shadow p-3">
                            <div class="text-center">
                                <img src="../../public/img/logoEmpresa.png" class="img-config">
                            </div>
                            <div class="text-center rounded config-band mb-3">Datos de la Empresa</div>
                            <form class="border rounded p-3" action="" enctype="multipart/form-data">
                                <input type="hidden" id="id_user" name="id_user" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">
                                <div class="mb-3">
                                    <label for="rif" class="form-label">RIF:</label>
                                    <input type="text" class="form-control" id="rif" name="rif">
                                </div>
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Empresa:</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name">
                                </div>
                                <div class="mb-3">
                                    <label for="company_email" class="form-label">Correo electronico:</label>
                                    <input type="text" class="form-control" id="company_email" name="company_email">
                                </div>
                                <div class="mb-3">
                                    <label for="company_address" class="form-label">Direccion:</label>
                                    <input type="text" class="form-control" id="company_address" name="company_address">
                                </div>
                                <div class="mb-3">
                                    <label for="company_phone" class="form-label">Telefono:</label>
                                    <input type="text" class="form-control" id="company_phone" name="company_phone">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="editar_configuracion_empresa" class="btn btn-panel"><i class="fa-solid fa-floppy-disk"></i> Guardar Datos</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-10 col-xl-4 d-flex justify-content-center mb-5">
                    <div class="col-12 col-lg-11">
                        <div class="card-2 shadow p-3">
                            <div class="text-center">
                                <img src="../../public/img/logoUser.png" class="img-config">
                            </div>
                            <div class="text-center rounded config-band">Información Personal</div>
                            <div class="d-flex flex-wrap py-3">
                                <label class="pe-3 pe-sm-5" for="">Nombre:</label>
                                <p class="m-0 fw-bold" id="name"></p>
                            </div>
                            <div class="d-flex flex-wrap py-3">
                                <label class="pe-3 pe-sm-5" for="">Correo:</label>
                                <p class="m-0 fw-bold" id="email"></p>
                            </div>

                            <div class="text-center rounded config-band">Datos de Usuario</div>
                            <div class="d-flex flex-wrap py-3">
                                <label class="pe-3 pe-sm-5" for="">Rol:</label>
                                <p class="m-0 fw-bold" id="rol"></p>
                            </div>

                            <div class="d-flex flex-wrap py-3">
                                <label class="pe-3 pe-sm-3" for="">Usuario:</label>
                                <p class="m-0 fw-bold" id="user"></p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- <script>
        // Check if the browser supports the Network Information API
        if (navigator.connection) {
            // Get the network connection object
            const connection = navigator.connection;

            // Check if there is an internet connection
            if (connection.type !== "none") {
                // Create a green circular button
                const button = document.getElementById('internet');
                button.style.cssText = `
                                        display: block;
                                        width: 50px;
                                        height: 50px;
                                        border-radius: 50%;
                                        background-color: green;
                                        cursor: pointer;
                                        `;


                // Add a click event listener to the button
                button.addEventListener('click', () => {
                    Swal.fire({
                        title: "Exito!",
                        text: 'Tienes conexion a internet!',
                        icon: "success",
                    });
                });
            } else {
                // Display an error message
                console.error('No internet connection');

                button.addEventListener('click', () => {
                    Swal.fire({
                        title: "Error!",
                        text: 'No tienes conexion a internet!',
                        icon: "error",
                    });
                });

            }
        } else {
            // Display an error message

            console.error('Network Information API not supported');
        }
    </script> -->
</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>