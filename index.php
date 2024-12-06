<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Inicio de Sesión</title>

    <!-- LINKS HEAD Y STYLE CSS -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/sass/custom.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <!-- LINKS BOOTSTRAP 5, BoxIcons Y FONT-AWESOME -->
    <link rel="stylesheet" href="public/css/font-awesome-css/all.min.css">
    <script src="public/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <?php
    if (!empty($_SESSION['active'])) {
        echo '
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                willClose: () => {
                  window.location.href = "view/index/index.php";
                },
              });
              Toast.fire({
                icon: "success",
                title: "Sesion previa detectada",
              });
            </script>';
    }
    ?>
    <p>sexo</p>
    <div class="header finisher-header" style="width: 100%; height: 100vh;">
        <div class="container d-flex flex-column justify-content-center" style="height: 100vh;">
            <div class="row align-items-center bg-body-tertiary shadow-lg rounded-3 p-3">
                <div class="col-12 col-md-7">
                    <img src="public/img/logo.png" alt="" srcset="" class="img-fluid">
                </div>
                <div class="col-12 col-md-5 pe-md-5 mt-3 mt-md-0 login-form">
                    <div class="mb-3 title">
                        SYS - RAR
                    </div>
                    <div class="mb-3">
                        <h5>
                            Iniciar Sesión
                        </h5>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                        <label for="user">Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-login" id="login">Ingresar</button>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <script src="public/js/jquery-3.6.3.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/app.js"></script>
    <script src="public/js/finisher-header.es5.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        new FinisherHeader({
            "count": 10,
            "size": {
                "min": 2,
                "max": 40,
                "pulse": 0
            },
            "speed": {
                "x": {
                    "min": 0,
                    "max": 0.8
                },
                "y": {
                    "min": 0,
                    "max": 0.2
                }
            },
            "colors": {
                "background": "#ffffff",
                "particles": [
                    "#960707",
                    "#575757",
                    "#c30000",
                    "#2133c3"
                ]
            },
            "blending": "screen",
            "opacity": {
                "center": 1,
                "edge": 1
            },
            "skew": -1,
            "shapes": [
                "c",
                "s",
                "t"
            ]
        });
    </script>

</body>


</html>