<?php

require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
// $dompdf = new Dompdf();
// $dompdf->loadHtml('hello world');

// // (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// $dompdf->stream();
$data = $_POST['datos'];
[$config] = json_decode($data['config'], true);
[$client] = json_decode($data['client'], true);

$products = json_decode($data['products'], true);

$payments = json_decode($data['payments'], true);
$cashbacks = json_decode($data['cashback'], true);

if (count($cashbacks) == '0') {
    $cashbacks[0]['back_usd'] = '0';
    $cashbacks[0]['back_bs'] = '0';
    $cashbacks[0]['method_bs'] = '';
}

if ($client['status'] == 'Pendiente') {
    $tasa = $client['tasa_bcv'];
    $tasa_dia = $client['tasa_vuelto'];
    $total_pago_bs = 0;
    $total_pago = 0;
    $total_pago_bs_usd = 0;

    foreach ($payments as $key => $payment) {

        // Currency = 1 es Bolivar, Currency = 2 es Dolar
        if ($payment['currency'] == '1') {

            $total_pago_bs += $payment['monto'];

            if ($payment['comments'] != 'Abono') {
                $payments[$key]['cambio'] = number_format($total_pago_bs / $tasa, 2, '.', '');
                $total_pago_bs_usd += $payments[$key]['cambio'];
            } else {
                $payments[$key]['cambio'] = number_format($payment['monto'] / $tasa_dia, 2, '.', '');
                $total_pago_bs_usd += $payments[$key]['cambio'];
            }

        } else if ($payment['currency'] == '2') {

            $total_pago += $payment['monto'];

        } else {

            $total_pago_bs = 0;
            $total_pago = 0;
        }
    }

    $total_pago_usd = $total_pago_bs_usd + $total_pago;
    $total_pago_bs = $total_pago_usd * $tasa_dia;

    // Se restan los abonos para sacar los pendientes
    $pendiente_bs = $client['total_bs'] - $total_pago_bs;
    $pendiente = $client['total'] - $total_pago_usd;

    $pendiente_bs = number_format($pendiente_bs, 2, '.', '');
    $pendiente = number_format($pendiente, 2, '.', '');
}else {
    $tasa = $client['tasa_bcv'];
    $tasa_dia = $client['tasa_vuelto'];
    $total_pago_bs = 0;
    $total_pago = 0;
    $total_pago_bs_usd = 0;

    foreach ($payments as $key => $payment) {

        // Currency = 1 es Bolivar, Currency = 2 es Dolar
        if ($payment['currency'] == '1') {

            $total_pago_bs += $payment['monto'];

            if ($payment['comments'] != 'Abono') {
                $payments[$key]['cambio'] = number_format($total_pago_bs / $tasa, 2, '.', '');
            } else {
                $payments[$key]['cambio'] = number_format($payment['monto'] / $tasa_dia, 2, '.', '');
            }
        } else if ($payment['currency'] == '2') {

            $total_pago += $payment['monto'];
        } else {

            $total_pago_bs = 0;
            $total_pago = 0;
        }
    }
}



ob_start();
include(dirname('__FILE__') . '/factura.php');
$html = ob_get_clean();

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Obtiene el contenido del PDF
$output = $dompdf->output();

// Guarda el PDF en un archivo
$id_factura = $client['id_bill'];
file_put_contents('../../pdf/Recibo_' . $id_factura . '.pdf', $output);
$result = ['success' => true, 'msg' => 'El PDF se generara en breve.', 'id' => $id_factura];
echo json_encode($result);
exit;
