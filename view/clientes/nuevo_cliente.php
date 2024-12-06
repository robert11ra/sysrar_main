<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Agregar Cliente</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Clientes</h3>
                <p class="text-muted">Nuevo Cliente</p>
            </div>

            <div class="container-fluid mt-3 shadow-lg rounded mb-3">
                <form class="p-3">
                    <div class="row">
                        <input type="hidden" id="id_user" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="ced" class="form-label">Cedula</label>
                            <input type="number" class="form-control" id="ced" name="ced" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="phone" class="form-label">Telefono</label>
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address" class="form-label">Direccion</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="select_type" class="form-label">Selecciona una opción</label>
                            <select class="form-select" id="select_type" name="select_type" required>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <button type="button" id="borrar" class="btn btn-outline-secondary"><i class="fa-solid fa-eraser"></i> Borrar</button>
                            <button type="submit" id="registrar_cliente" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Crear Cliente</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>