<?php
require_once '../model/payroll_model.php'; // Incluir el archivo del modelo

class PayrollController
{
    private $payroll_model;

    public  function __construct()
    {

        $this->payroll_model = new Payroll();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerSalariosEmpleados':
                $this->obtenerSalariosEmpleados();
                break;
            case 'obtenerDetallesNomina':
                $this->obtenerDetallesNomina();
                break;
            case 'pagarNominaEmpleado':
                $this->pagarNominaEmpleado();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerSalariosEmpleados()
    {
        // Obtener los datos de los usuarios
        $result = $this->payroll_model->obtener_salarios_empleados();

        foreach ($result as &$empleado) {
            $fecha = $empleado['period'];
            
            $dia = date('d', strtotime($fecha));
            $mes = date('m', strtotime($fecha));
            $ultimoDia = date('t', strtotime($fecha));

            $primeraQuincenaInicio = "01-$mes";
            $primeraQuincenaFin = "15-$mes";

            $segundaQuincenaInicio = "16-$mes";
            $segundaQuincenaFin = "$ultimoDia-$mes";

            if ($dia <= 15) {
                $empleado['period2'] = "$primeraQuincenaInicio / $primeraQuincenaFin";
            } else {
                $empleado['period2'] = "$segundaQuincenaInicio / $segundaQuincenaFin";
            }
        }


        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerDetallesNomina()
    {
        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'ID no encontrado, verifique los datos.'];
        } else {
            $id = $datos['id'];
            // Obtener los datos de los usuarios
            $result = $this->payroll_model->obtener_detalles_nomina($id);

            foreach ($result as &$empleado) {
                
                //ESTADO COMISION NOMINA Y TIPOVENTA
                if ($empleado['mayor_detal'] == '1') {
                    $empleado['mayor_detal'] = 'DETAL';
                }else {
                    $empleado['mayor_detal'] = 'MAYOR';
                }

                if ($empleado['estado_comision'] == '2') {
                    $empleado['estado_comision'] = 'Procesado';
                } else {
                    $empleado['estado_comision'] = 'No Procesado';
                }

                if ($empleado['pago_nomina'] == '5') {
                    $empleado['pago_nomina'] = 'Pendiente';
                } else {
                    $empleado['pago_nomina'] = 'Pagado';
                }
            }
        }

        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function pagarNominaEmpleado()
    {
        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'ID no encontrado, verifique los datos.'];
        } else {
            $id = $datos['id'];
            // Obtener los datos de los usuarios
            $pagar_nomina_empleado = $this->payroll_model->pagar_nomina_empleado($id);
            // Manejo de la respuesta
            if ($pagar_nomina_empleado->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Nomina pagada.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al cambiar el estado de la nomina.'];
            }
        }

        // Devolver los datos en formato JSON
        echo json_encode($result);
    }
}

new PayrollController();
