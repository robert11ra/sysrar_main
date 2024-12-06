<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Editar Producto</title>

    <?php include '../include/head.php' ?>

</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-5 py-3 d-flex flex-column">
            <div class="col ps-4">
                <h3 class="m-0">Productos</h3>
                <p class="text-muted"><i class="fa-solid fa-plus"></i> Editar Producto</p>
            </div>
            <div class="container-fluid mt-3 shadow-lg rounded mb-3">
                <form class="p-3">
                    <div class="row">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="id_user" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="name" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="model" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="cost" class="form-label">Costo</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="cost" name="cost" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="price" class="form-label">Precio (D)</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="second_price" class="form-label">Precio (M)</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="second_price" name="second_price" required>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="0" step="1" class="form-control" id="stock" name="stock" required oninput="if (this.value < 0) this.value = 0;">
                        </div>

                        <div class="col-12 col-lg-6 mb-3">
                            <label for="stock_warranty" class="form-label">Stock Garantía</label>
                            <input type="number" min="0" step="1" class="form-control" id="stock_warranty" name="stock_warranty" required oninput="if (this.value < 0) this.value = 0;">
                        </div>


                        <div class="col-12 mb-3">
                            <label for="select_status" class="form-label">Estado</label>
                            <select class="form-select" id="select_status" name="select_status" required>
                            </select>
                        </div>
                        <!-- <div class="col-12 mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="imagen" name="imagen" onchange="previewImage()" required>
                        </div>
                        <div class="mt-2" id="preview-container" style="display: none; position: relative;">
                            <img id="preview" src="#" alt="Imagen previa" style="width: 200px; height: 150px;">
                            <button type="button" class="btn btn-outline-danger position-absolute" onclick="removeImage()" id="removeButton">X</button>
                        </div>
                    </div> -->
                        <div class="col-12 mb-3">
                            <button type="button" id="borrar" class="btn btn-outline-secondary"><i class="fa-solid fa-eraser"></i> Borrar</button>
                            <button type="submit" id="editar_producto" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Editar Producto</button>
                        </div>
                </form>
            </div>
        </div>

        <script>
            function previewImage() {
                const imageInput = document.getElementById('imagen');
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('preview-container');
                const removeButton = document.getElementById('removeButton');

                if (imageInput.files && imageInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.style.display = 'block';
                    }

                    reader.readAsDataURL(imageInput.files[0]);
                } else {
                    preview.src = '#';
                    previewContainer.style.display = 'none';
                }
            }

            function removeImage() {
                const imageInput = document.getElementById('imagen');
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('preview-container');
                const removeButton = document.getElementById('removeButton');

                imageInput.value = '';
                preview.src = '#';
                previewContainer.style.display = 'none';
            }
        </script>
</body>

<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>