<!DOCTYPE html>
<html lang="es">

<head>
    <title>SYSRAR - Agregar Usuario</title>
    <?php include '../include/head.php' ?>
</head>

<body>
    <?php include '../include/nav.php' ?>
    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Usuario</h3>
                <p class="text-muted">Nuevo Usuario</p>
            </div>
            <div class="container-fluid mt-3 shadow-lg rounded mb-3">
                <form method="POST" class="p-3">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="name" class="form-label">Nombre<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="email" class="form-label">Correo electrónico<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="user" class="form-label">Usuario<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="pass" class="form-label">Contraseña<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="salary" class="form-label">Salario quincenal<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0.01" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="department" class="form-label">Cargo<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department" name="department" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="select_roles" class="form-label">Selecciona una opción<span class="text-danger">*</span></label>
                            <select class="form-select" id="select_roles" name="select_roles">
                                <option value="">Seleccione un rol...</option>

                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <button type="button" id="borrar" class="btn btn-outline-secondary"><i class="fa-solid fa-eraser"></i> Borrar</button>
                            <button type="submit" id="registrar_usuario" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Crear Usuario</button>
                        </div>
                </form>
            </div>
        </div>

    </div>

    <!-- <script>
        const inputImagen = document.getElementById("imagen");

        inputImagen.addEventListener("change", function() {
            // Comprobamos que se haya seleccionado una imagen
            if (this.files && this.files[0]) {
                const lector = new FileReader();
                lector.onload = function(e) {
                    // Creamos una imagen para cargar el archivo
                    const imagen = new Image();
                    imagen.onload = function() {
                        // Redimensionamos la imagen
                        const canvas = document.createElement("canvas");
                        canvas.width = 128;
                        canvas.height = 128;
                        const contexto = canvas.getContext("2d");
                        contexto.drawImage(imagen, 0, 0, 128, 128);
                        // Enviamos la imagen redimensionada al servidor
                        const imagenRedimensionada = canvas.toDataURL("image/jpeg", 0.9);
                        console.log(imagenRedimensionada);
                        // Aquí puedes enviar la imagen redimensionada al servidor mediante una petición AJAX o un formulario
                    }
                    imagen.src = e.target.result;
                }
                lector.readAsDataURL(this.files[0]);
            }
        });
    </script> -->



</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>