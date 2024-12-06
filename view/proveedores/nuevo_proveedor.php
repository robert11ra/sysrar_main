<!DOCTYPE html>
<html lang="es">

<head>
    <title>SYSRAR - Agregar Proveedor</title>
    <?php include '../include/head.php' ?>
</head>

<body>
    <?php include '../include/nav.php' ?>
    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Proveedor</h3>
                <p class="text-muted"><i class="fa-solid fa-plus"></i>Nuevo Proveedor</p>
            </div>
            <div class="container-fluid mt-3 shadow-lg rounded mb-3">
                <form method="POST" class="p-3">
                    <div class="row">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="rif" class="form-label">RIF<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="rif" name="rif" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="name" class="form-label">Proveedor<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="email" class="form-label">Correo electrónico<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="phone" class="form-label">Telefono<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="address" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="select_status" class="form-label">Estado<span class="text-danger">*</span></label>
                            <select class="form-select" id="select_status" name="select_status">
                                <option value="">Seleccione un estado...</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <button type="button" id="borrar" class="btn btn-outline-secondary"><i class="fa-solid fa-eraser"></i> Borrar</button>
                            <button type="submit" id="registrar_proveedor" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Registrar Proveedor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>