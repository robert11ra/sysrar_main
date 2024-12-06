<!DOCTYPE html>
<html lang="es">

<head>
    <title>SYSRAR - Permisos</title>
    <?php include '../include/head.php' ?>
</head>

<body>
    <?php include '../include/nav.php' ?>
    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Usuario</h3>
                <p class="">Permisos de: <span class="fw-bold">Robert Rincon</span> </p>
            </div>
            <div class="container-fluid my-3">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Usuarios</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verUsuario">
                                <label class="form-check-label ps-3" for="verUsuario">Ver Usuarios</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="crearUsuario">
                                <label class="form-check-label ps-3" for="crearUsuario">Crear Usuarios</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="editarUsuario">
                                <label class="form-check-label ps-3" for="editarUsuario">Editar Usuarios</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="eliminarUsuario">
                                <label class="form-check-label ps-3" for="eliminarUsuario">Eliminar Usuarios</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Clientes</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verCliente">
                                <label class="form-check-label ps-3" for="verCliente">Ver Clientes</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="crearCliente">
                                <label class="form-check-label ps-3" for="crearCliente">Crear Clientes</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="editarCliente">
                                <label class="form-check-label ps-3" for="editarCliente">Editar Clientes</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="eliminarCliente">
                                <label class="form-check-label ps-3" for="eliminarCliente">Eliminar Clientes</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Productos</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verProducto">
                                <label class="form-check-label ps-3" for="verProducto">Ver Productos</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="crearProducto">
                                <label class="form-check-label ps-3" for="crearProducto">Crear Productos</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="editarProducto">
                                <label class="form-check-label ps-3" for="editarProducto">Editar Productos</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="eliminarProducto">
                                <label class="form-check-label ps-3" for="eliminarProducto">Eliminar Productos</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Ventas</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verVenta">
                                <label class="form-check-label ps-3" for="verVenta">Ver Ventas</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="crearVenta">
                                <label class="form-check-label ps-3" for="crearVenta">Crear Ventas</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="editarVenta">
                                <label class="form-check-label ps-3" for="editarVenta">Editar Ventas</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="eliminarVenta">
                                <label class="form-check-label ps-3" for="eliminarVenta">Eliminar Ventas</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Contabilidad</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verContabilidad">
                                <label class="form-check-label ps-3" for="verContabilidad">Acceso a Ingresos</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="crearContabilidad">
                                <label class="form-check-label ps-3" for="crearContabilidad">Acceso a Asistencia</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="editarContabilidad">
                                <label class="form-check-label ps-3" for="editarContabilidad">Acceso a Cuentas por Pagar</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="eliminarContabilidad">
                                <label class="form-check-label ps-3" for="eliminarContabilidad">Acceso a Cuentas por Cobrar</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="Contabilidad">
                                <label class="form-check-label ps-3" for="Contabilidad">Acceso a Nomina</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 permission mb-5">
                        <div class="shadow rounded card-permission p-3">
                            <p class="fs-5">Modulo de Configuracion e Historial</p>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verConfig">
                                <label class="form-check-label ps-3" for="verConfig">Acceso a Configuracion</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" id="verHistorial">
                                <label class="form-check-label ps-3" for="verHistorial">Acceso a Historial</label>
                            </div>
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