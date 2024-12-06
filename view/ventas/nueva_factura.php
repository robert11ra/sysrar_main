<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Agregar Factura</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>
    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="col ps-5" id="ventas">
                <h3 class="m-0">Venta</h3>
                <p class="text-muted">Nueva Factura</p>

                <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
            </div>
            <div class="row mt-3 justify-content-around align-items-start">
                <div class="card2 shadow-lg rounded col-12 col-lg-8 col-xl-8 mb-3">
                    <div class="p-3">
                        <div class="mb-3 d-flex flex-column">
                            <label for="client" class="form-label">Clientes</label>
                            <select class="form-select select_client" id="client" name="client" required>
                                <option></option>
                            </select>
                            <div class="row justify-content-evenly mt-3" id="client_dinamic">
                                <div class="card-client p-3 col-12 col-lg-6 fs-5">
                                    <span class="fw-bold" id="name"></span>
                                    <span class="" id="ced"></span>
                                    <span class="" id="address"></span>
                                </div>
                                <div class="card-client p-3 col-12 col-lg-5 fs-5">
                                    <input type="hidden" id="id_type" name="id_type">
                                    <span class="fw-bold" id="type"></span>
                                    <span class="" id="phone"></span>
                                    <span class="" id="email"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 d-flex flex-column col-12 col-lg-6">
                                <label for="product" class="form-label">Productos (*)</label>
                                <select class="form-select select_product" id="product" name="product" disabled required>
                                    <option></option>
                                </select>
                            </div>

                            <div class="mb-3 col-6 col-lg-3">
                                <label for="price_product" class="form-label">Precio Unitario ($)</label>
                                <input class="form-control" type="number" tabindex="-1" readonly step="0.01" min="0.01" id="price_product" name="price_product">
                            </div>
                            <div class="mb-3 col-6 col-lg-3">
                                <label for="price_product_bs" class="form-label">Precio Unitario (Bs)</label>
                                <input class="form-control" type="number" tabindex="-1" readonly step="0.01" min="0.01" id="price_product_bs" name="price_product_bs">
                            </div>
                            <div class="mb-3 col-12 col-lg-3">
                                <label for="stock" class="form-label">Stock (Und)</label>
                                <input class="form-control" type="number" id="stock" name="stock" disabled required oninput="if (this.value < 0) this.value = 0;">
                            </div>
                            <div class="mb-3 col-12 col-lg-3">
                                <label for="quantity_product" class="form-label">Cantidad (Und)</label>
                                <input class="form-control" type="number" step="0" min="1" id="quantity_product" name="quantity_product" disabled required oninput="if (this.value < 0) this.value = 0;">
                            </div>
                            <div class="mb-3 col-6 col-lg-3">
                                <label for="total_product" class="form-label">Total ($)</label>
                                <input class="form-control" type="number" tabindex="-1" readonly step="0.01" min="0.01" id="total_product" name="total_product">
                            </div>
                            <div class="mb-3 col-6 col-lg-3">
                                <label for="total_product_bs" class="form-label">Total (Bs)</label>
                                <input class="form-control" type="number" tabindex="-1" readonly step="0.01" min="0.01" id="total_product_bs" name="total_product_bs">
                            </div>
                        </div>

                        <div class="">
                            <button type="button" class="btn btn-primary mb-1" id="agregar_producto"><i class="fa-solid fa-plus"></i> Agregar Producto</button>
                            <button type="button" class="btn btn-danger mb-1" id="vaciar_factura"><i class="fa-solid fa-trash"></i> Vaciar Factura</button>
                        </div>

                        <table id="tabla_producto_venta" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Cantidad (Und)</th>
                                    <th>Precio ($)</th>
                                    <th>Precio (Bs)</th>
                                    <th>Total ($)</th>
                                    <th>Total (Bs)</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-11 col-lg-4 col-xl-3 factura-md shadow rounded mb-3 p-0">
                    <div class="total rounded-top py-1">Total Venta: <span id="totalventa">0.00</span>$</div>
                    <input type="hidden" id="tasa_bcv" name="tasa_bcv">
                    <input type="hidden" id="tasa_paralelo" name="tasa_paralelo">
                    <input type="hidden" id="tasa_protegida" name="tasa_protegida">
                    <div class="p-3">
                        <form action="">

                            <div class="mb-3 d-flex flex-column">
                                <label for="select_documento" class="form-label"><i class="fa-solid fa-file-lines"></i> Tipo de Documento</label>
                                <select class="form-select select_documento" id="select_documento" name="select_documento" aria-label="doc">
                                    <option value="1">Ticket</option>
                                    <option value="2" selected>PDF</option>
                                </select>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="select_retiro" class="form-label"><i class="fa-solid fa-motorcycle"></i> Tipo de Retiro</label>
                                <select class="form-select select_retiro" id="select_retiro" name="select_retiro" aria-label="doc">
                                    <option value="1">En Tienda</option>
                                    <option value="2">Delivery</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="method_payment" class="form-label"><i class="fa-solid fa-money-bill-1"></i> Tipo de Pago</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="0" role="switch" id="credito" disabled>
                                    <label class="form-check-label" for="credito">A Credito?</label>
                                </div>
                            </div>
                            <div class="campos_dinamicos">

                                <div class="mb-3" id="methods">
                                    <label for="method1" class="form-label">Efectivo - Bolivares (Bs.D)</label>
                                    <input class="form-control" type="hidden" name="idmethod1" id="idmethod1" value="1">
                                    <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method1" id="method1" disabled>
                                </div>
                                <div class="mb-3" id="methods">
                                    <label for="method2" class="form-label">Efectivo - <strong>Dolares ($)</strong></label>
                                    <input class="form-control" type="hidden" name="idmethod2" id="idmethod2" value="2">
                                    <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method2" id="method2" disabled>
                                </div>
                                <div class="mb-3" id="methods">
                                    <label for="method3" class="form-label">Punto de Venta - Bolivares (Bs.D)</label>
                                    <input class="form-control" type="hidden" name="idmethod3" id="idmethod3" value="3">
                                    <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method3" id="method3" disabled>
                                </div>
                                <div class="mb-3" id="methods">
                                    <label for="method4" class="form-label">Pago movil - Bolivares (Bs.D)</label>
                                    <div class="row">
                                        <div class="col-md-6"><input class="form-control" type="hidden" name="idmethod4" id="idmethod4" value="4">
                                            <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method4" id="method4" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select select_pago_movil" id="select_pago_movil" name="select_pago_movil" disabled>
                                                <option value="">Selecciona un banco</option>
                                                <option value="0102">BANCO DE VENEZUELA</option>
                                                <option value="0156">100% BANCO</option>
                                                <option value="0172">BANCAMIGA BANCO MICROFINANCIERO C A</option>
                                                <option value="0114">BANCARIBE</option>
                                                <option value="0171">BANCO ACTIVO</option>
                                                <option value="0166">BANCO AGRICOLA DE VENEZUELA</option>
                                                <option value="0175">BANCO BICENTENARIO DEL PUEBLO</option>
                                                <option value="0128">BANCO CARONI</option>
                                                <option value="0163">BANCO DEL TESORO</option>
                                                <option value="0115">BANCO EXTERIOR</option>
                                                <option value="0151">BANCO FONDO COMUN</option>
                                                <option value="0173">BANCO INTERNACIONAL DE DESARROLLO</option>
                                                <option value="0105">BANCO MERCANTIL</option>
                                                <option value="0191">BANCO NACIONAL DE CREDITO</option>
                                                <option value="0138">BANCO PLAZA</option>
                                                <option value="0137">BANCO SOFITASA</option>
                                                <option value="0104">BANCO VENEZOLANO DE CREDITO</option>
                                                <option value="0168">BANCRECER</option>
                                                <option value="0134">BANESCO</option>
                                                <option value="0177">BANFANB</option>
                                                <option value="0146">BANGENTE</option>
                                                <option value="0174">BANPLUS</option>
                                                <option value="0108">BBVA PROVINCIAL</option>
                                                <option value="0157">DELSUR BANCO UNIVERSAL</option>
                                                <option value="0169">MI BANCO</option>
                                                <option value="0178">N58 BANCO DIGITAL BANCO MICROFINANCIERO S A</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="mb-3" id="methods">
                                    <label for="method5" class="form-label">Transferencia directa - Bolivares (Bs.D)</label>
                                    <div class="row">
                                        <div class="col-md-6"><input class="form-control" type="hidden" name="idmethod5" id="idmethod5" value="5">
                                            <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method5" id="method5" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select select_transferencia_directa_bs" id="select_transferencia_directa_bs" name="select_transferencia_directa_bs" disabled>
                                                <option value="">Selecciona un banco</option>
                                                <option value="0102">BANCO DE VENEZUELA</option>
                                                <option value="0156">100% BANCO</option>
                                                <option value="0172">BANCAMIGA BANCO MICROFINANCIERO C A</option>
                                                <option value="0114">BANCARIBE</option>
                                                <option value="0171">BANCO ACTIVO</option>
                                                <option value="0166">BANCO AGRICOLA DE VENEZUELA</option>
                                                <option value="0175">BANCO BICENTENARIO DEL PUEBLO</option>
                                                <option value="0128">BANCO CARONI</option>
                                                <option value="0163">BANCO DEL TESORO</option>
                                                <option value="0115">BANCO EXTERIOR</option>
                                                <option value="0151">BANCO FONDO COMUN</option>
                                                <option value="0173">BANCO INTERNACIONAL DE DESARROLLO</option>
                                                <option value="0105">BANCO MERCANTIL</option>
                                                <option value="0191">BANCO NACIONAL DE CREDITO</option>
                                                <option value="0138">BANCO PLAZA</option>
                                                <option value="0137">BANCO SOFITASA</option>
                                                <option value="0104">BANCO VENEZOLANO DE CREDITO</option>
                                                <option value="0168">BANCRECER</option>
                                                <option value="0134">BANESCO</option>
                                                <option value="0177">BANFANB</option>
                                                <option value="0146">BANGENTE</option>
                                                <option value="0174">BANPLUS</option>
                                                <option value="0108">BBVA PROVINCIAL</option>
                                                <option value="0157">DELSUR BANCO UNIVERSAL</option>
                                                <option value="0169">MI BANCO</option>
                                                <option value="0178">N58 BANCO DIGITAL BANCO MICROFINANCIERO S A</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="mb-3" id="methods">
                                    <label for="method6" class="form-label">Transferencia directa - <strong>Dolares ($)</strong></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" name="idmethod6" id="idmethod6" value="6">
                                            <input class="form-control" type="number" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.keyCode === 46' min="0" name="method6" id="method6" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select select_transferencia_directa_dls" id="select_transferencia_directa_dls" name="select_transferencia_directa_dls" disabled>
                                                <option value="">Selecciona un banco</option>
                                                <option value="1111">ZELLE</option>
                                                <option value="1112">BANESCO PANAMA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 totales">
                                <div class="d-flex justify-content-between">
                                    <p>SUBTOTAL</p>
                                    <span id="subtotalventa">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>IVA (16%)</p>
                                    <span id="ivatotalventa">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                    <p>Total ($)</p>
                                    <span id="totalventa2">0.00</span>
                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                    <p>Total (Bs)</p>
                                    <span id="totalventa3">0.00</span>

                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                    <p>Vuelto ($)</p>
                                    <span id="vuelto1">0.00</span>

                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                    <p>Vuelto (Bs)</p>
                                    <span id="vuelto2">0.00</span>

                                </div>
                            </div>
                            <div class="text-center w-100">
                                <button type="button" id="procesar_venta" name="procesar_venta" class="btn btn-primary mb-1"><i class="fa-solid fa-cart-shopping"></i> Realizar Factura</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modalCambio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Dar Cambio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="divMonedas"></div>
                                    <button type="button" id="btnAgregarMoneda" class="btn btn-primary">Agregar Moneda</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" id="btnConfirmar" class="btn btn-primary">Confirmar</button>
                                </div>
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