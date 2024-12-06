<?php
require_once '../model/income_model.php'; // Incluir el archivo del modelo

class ProfitController
{
    private $income_model;

    public  function __construct()
    {

        $this->income_model = new Income();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerIngresos':
                $this->obtenerIngresos();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerIngresos()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['date_range']) || trim($datos['date_range']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $date = trim(htmlspecialchars($datos['date_range']));
            $dates = explode(" - ", $date);
            $date_start = isset($dates[0]) ? $dates[0] : null;
            $date_end = isset($dates[1]) ? $dates[1] : null;

            $start = str_replace("/", "-", $date_start);
            $end = str_replace("/", "-", $date_end);

            $start_formated = DateTime::createFromFormat('m-d-Y', $start)->format('Y-m-d') . ' 00:00:00';
            $end_formated = DateTime::createFromFormat('m-d-Y', $end)->format('Y-m-d') . ' 23:59:59';

            //$result = [$start_formated . ' | ' . $end_formated];
            // Obtener los datos del modelo
            $results = $this->income_model->obtener_ingresos($start_formated, $end_formated);

            $result = [];
            $cash_bs = '0,00';
            $cash_dolar = ' 0,00';
            $card_bs = ' 0,00';
            $pago_movil = '0,00';
            $result = ['error' => ''];

            foreach ($results as $data) {

                if (isset($data['monto']) && !empty($data['monto'])) {
                    $monto = $data['monto'];
                } else {
                    $monto = 0;
                }

                // Procesar cada id_banco
                switch ($data['id_banco']) {
                    case '1':
                        $cash_bs = $monto;
                        break;
                    case '2':
                        $cash_dolar = $monto;
                        break;
                    case '3':
                        $card_bs = $monto;
                        break;
                    case '4':
                        $pago_movil = $monto;
                        break;
                    default:
                        // Manejar metodo no definido
                        $result = ['success' => false, 'error' =>"Metodo no encontrado: " . json_encode($data)];
                }
            }
            // Asignar cada valor
            $result = ['success' => true, 'cash_bs' => $cash_bs, 'cash_dolar' => $cash_dolar, 'card_bs' => $card_bs, 'pago_movil' => $pago_movil];
        }
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }
}

new ProfitController();
