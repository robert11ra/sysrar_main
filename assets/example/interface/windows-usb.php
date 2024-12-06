<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../vendor/autoload.php';
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

// Función para dividir el texto en líneas de 16 caracteres
function dividirTexto($texto) {
  $lineas = [];
  $longitudLinea = 16;

  while (strlen($texto) > 0) {
    $linea = substr($texto, 0, $longitudLinea);
    $texto = substr($texto, $longitudLinea);

    $lineas[] = $linea;
  }

  return $lineas;
}

// Ejemplo de uso
try {
  // Enter the share name for your USB printer here
  $connector = new WindowsPrintConnector("POS-5801");

  // Obtener la lista de productos y el total
  $productos = [
    [0 => 'Q Mozarella Por Kg', 1 => '200', 2 => '33.00'],
    [0 => 'Harina de trigo kileada', 1 => '20', 2 => '20.00'],
    [0 => 'Carne para guisar de primera', 1 => '200', 2 => '40.40'],
  ];
  $total = 93.40;

  // Imprimir el encabezado del ticket
  $printer = new Printer($connector);
  $printer->text("**FACTURA**");
  $printer->feed(1);

  // Imprimir la lista de productos
  foreach ($productos as $producto) {
    $descripcion = $producto[0];
    $cantidad = $producto[1];
    $precio = $producto[2];

    // Dividir la descripción en líneas
    $lineasDescripcion = dividirTexto($descripcion);

    // Imprimir la descripción, cantidad y precio
    foreach ($lineasDescripcion as $linea) {
      $printer->text($linea);
    }
    $printer->text(str_pad($cantidad, 4, " ", STR_PAD_LEFT) . " x $" . str_pad($precio, 6, " ", STR_PAD_LEFT));
    $printer->feed(1);
  }

  // Imprimir el total
  $printer->text("-----------------------------");
  $printer->text("TOTAL: $" . number_format($total, 2, ",", "."));
  $printer->feed(3);

  // Cortar el papel
  $printer->cut();

  // Cerrar la impresora
  $printer->close();
} catch (Exception $e) {
  echo "No se pudo imprimir en la impresora: " . $e->getMessage() . "\n";
}

?>


