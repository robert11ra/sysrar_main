<?php
/* Change to the correct path if you copy this example! */
require '../vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */


$data = $_POST['datos'];
[$config] = json_decode($data['config'], true);
[$client] = json_decode($data['client'], true);
$products = json_decode($data['products'], true);
$payments = json_decode($data['payments'], true);

$id_factura = $client['id_bill'];


// Ejemplo de uso
try {
    // Ingresar el nombre de la impresora
    $connector = new WindowsPrintConnector($config['tickera_name']);
    $printer = new Printer($connector);

    // Alinear al centro
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    // Imprimir el encabezado del ticket
    $printer->text($config['rif'] . "\n");
    $printer->text($config['company_name'] . "\n");
    $printer->text($config['company_address'] . "\n");
    $printer->text($config['company_phone'] . "\n");
    // Un salto
    $printer->feed(1);

    // Alinear a la izquierda
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text('RIF/Cedula: ' . $client['client_ced'] . "\n");
    $printer->text('Clte: ' . $client['client_name'] . "\n");
    $printer->text($client['client_address'] . "\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("RECIBO\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("RECIBO: " . $id_factura . "\n");
    $printer->text("FECHA: " . $client['date_created'] . "\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("--------------------------------\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    foreach ($products as $producto) {

        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text($producto['quantity'] . " x $" . $producto['sell_price'] . "\n");
        $printer->text($producto['product_name'] . " (E)\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("$ " . $producto['product_total'] . "\n");
    }
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("--------------------------------\n");
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("TOTAL PRODUCTOS: " . $producto['total_quantity'] . "\n");
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text("TOTAL: $ " . $client['total'] . "\n");
    $printer->feed(1);
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    foreach ($payments as $payment) {
        $printer->text($payment['payment_method'] . ": " . $payment['monto'] . "\n");
    }
    // Un salto
    $printer->feed(1);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("** GRACIAS POR SU COMPRA **");

    // Tres saltos, Final del recibo
    $printer->feed(4);

    // Cortar el papel
    $printer->cut();

    // Cerrar la impresora
    //$printer->close();
    $result = ['success' => true, 'msg' => 'El Ticket se generara en breve.'];
    echo json_encode($result);
} finally {
    $printer->close();
}
