<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Añadir Stock</title>

    <?php include '../include/head.php' ?>
    <style>
        .slider-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slider-step {
            display: none;
            padding: 20px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .active {
            display: flex;
        }
    </style>
</head>

<body>
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="px-4 py-3 d-flex flex-column">
            <div class="row">
                <div class="col ps-5">
                    <h3 class="m-0">Productos</h3>
                    <p class="text-muted"><i class="fa-solid fa-plus"></i> Añadir Stock</p>
                </div>
            </div>
        </div>
        <div class="container w-75 mx-auto shadow-lg rounded mb-3">
            <form class="p-3">
                <div class="row justify-content-center">
                    <h2 class="text-center">ID: <span id="id_product" name="id_product"></span></h2>
                    <input type="hidden" id="id" name="id">
                    <input class="w-75" type="hidden" id="id_user" value="<?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ''; ?>">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="name" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="name" name="name" disabled>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="model" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="model" name="model" disabled>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="cost" class="form-label">Costo</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="cost" name="cost" disabled>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="0" step="1" class="form-control" id="stock" name="stock" disabled oninput="if (this.value < 0) this.value = 0;">
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="price" class="form-label">Precio (D)</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="price" name="price" disabled>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="second_price" class="form-label">Precio (M)</label>
                            <input type="number" min="0.01" step="0.01" class="form-control" id="second_price" name="second_price" disabled>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="slider-container col-12 col-lg-8 mb-4">
                            <div class="slider-step active">
                                <div class="w-100">
                                    <label for="new_cost">Costo:</label>
                                    <input type="number" min="0.01" step="0.01" class="form-control" id="new_cost" name="new_cost" required>
                                </div>
                            </div>
                            <div class="slider-step">
                                <div class="w-100">
                                    <label for="new_price">Precio Detal:</label>
                                    <input type="number" min="0.01" step="0.01" class="form-control" id="new_price" name="new_price" required>
                                </div>
                            </div>
                            <div class="slider-step">
                                <div class="w-100">
                                    <label for="new_second_price">Precio Mayor:</label>
                                    <input type="number" min="0.01" step="0.01" class="form-control" id="new_second_price" name="new_second_price" required>
                                </div>
                            </div>
                            <div class="slider-step">
                                <div class="w-100">
                                    <label for="new_stock">Cantidad:</label>
                                    <input type="number" min="1" step="1" class="form-control" id="new_stock" name="new_stock" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 mb-4">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mb-4 text-center">
                            <button type="button" class="btn btn-primary prev d-none">Anterior</button>
                            <button type="button" class="btn btn-primary next">Siguiente</button>
                            <button type="submit" id="agregar_stock" class="btn btn-primary d-none"><i class="fa-solid fa-floppy-disk"></i> Añadir Stock</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    const steps = document.querySelectorAll('.slider-step');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const progressBar = document.querySelector('.progress-bar');
    const form = document.getElementById('productForm');
    const addStock = document.getElementById('agregar_stock');

    let currentStep = 0;
    const totalSteps = steps.length;

    // Función para mostrar el paso actual y actualizar la barra de progreso
    function showStep(step) {
        steps.forEach(step => step.classList.remove('active'));
        steps[step].classList.add('active');
        progressBar.style.width = `${(step + 1) / totalSteps * 100}%`;
    }

    // Función para validar los datos del formulario
    function validateForm() {
        const currentStepElements = steps[currentStep].querySelectorAll('input, select');
        let isValid = true;
        currentStepElements.forEach(element => {
            if (!element.checkValidity()) {
                isValid = false;
                element.classList.add('is-invalid');
            } else {
                element.classList.remove('is-invalid');
            }
        });
        return isValid;
    }

    // Evento para el botón "Siguiente"
    nextBtn.addEventListener('click', () => {
        if (validateForm()) {
            currentStep++;
            const new_cost = document.getElementById('new_cost').value;
            const new_price = document.getElementById('new_price').value;
            const new_second_price = document.getElementById('new_second_price').value;
            $('#cost').val(new_cost);
            if (currentStep == totalSteps - 1) {
                // Enviar el formulario
                $('#price').val(new_price);
                $('#second_price').val(new_second_price);
                nextBtn.classList.add('d-none');
                addStock.classList.remove('d-none');
                showStep(currentStep);
            } else {
                prevBtn.classList.remove('d-none');
                showStep(currentStep);

            }
        }
    });

    // Evento para el botón "Anterior"
    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            nextBtn.classList.remove('d-none');
            addStock.classList.add('d-none');
            showStep(currentStep);
        }

        if (currentStep == 0) {
            prevBtn.classList.add('d-none');
        }
    });

    // Mostrar el primer paso al cargar la página
    showStep(currentStep);
</script>
<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>


</html>