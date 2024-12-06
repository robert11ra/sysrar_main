<?php
session_start();
if (empty($_SESSION['active'])) {

    header('location: ../../');
}
// Establecer la zona horaria predeterminada
date_default_timezone_set('America/Caracas'); // Ajusta la zona horaria según tu ubicación

$mesactual = (int)date('m');

$meses = array(
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre"
);

$mes = $meses[$mesactual];


?>
<!-- LINKS HEAD Y STYLE CSS -->

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../public/css/style.css">

<!-- LINKS BOOTSTRAP 5, BoxIcons Y FONT-AWESOME -->
<link rel="stylesheet" type="text/css" href="../../public/sass/custom.css">
<link rel="stylesheet" type="text/css" href="../../public/css/font-awesome-css/all.min.css">
<link rel="stylesheet" type="text/css" href="../../public/css/boxicons-2.1.4/css/boxicons.min.css">
<link rel="stylesheet" type="text/css" href="../../public/css/DataTables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="../../public/css/daterangepicker.min.css">
<link rel="stylesheet" type="text/css" href="../../public/node_modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../public/css/daterangepicker.min.css">

<link rel="icon" href="../../public/img/favicon.ico" type="image/x-icon">

<input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">