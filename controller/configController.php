<?php
require_once '../model/config_model.php'; // Incluir el archivo del modelo

class ConfigController
{
    private $config_model;

    public  function __construct()
    {

        $this->config_model = new Config();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerDashboard':
                $this->obtenerDashboard();
                break;
            case 'obtenerConfiguracion':
                $this->obtenerConfiguracion();
                break;
            case 'editarConfiguracion':
                $this->editarConfiguracion();
                break;
            case 'editarConfiguracionEmpresa':
                $this->editarConfiguracionEmpresa();
                break;
            case 'obtenerTasa':
                $this->obtenerTasa();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerTasa()
    {
        // Obtener los datos del modelo
        [$result] = $this->config_model->obtener_tasa();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerDashboard()
    {
        // Obtener los datos del modelo
        [$result] = $this->config_model->obtener_dashboard();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerConfiguracion()
    {

        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id_user = trim(htmlspecialchars($datos['id_user']));
            [$result] = $this->config_model->obtener_configuracion($id_user);
        }
        // Obtener los datos de la configuracion
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function editarConfiguracion()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['tasa_bcv']) || trim($datos['tasa_bcv']) === '' ||
            empty($datos['tasa_paralelo']) || trim($datos['tasa_paralelo']) === '' ||
            empty($datos['comission_detal']) || trim($datos['comission_detal']) === ''||
            empty($datos['comission_mayor']) || trim($datos['comission_mayor']) === '' ||
            empty($datos['type_comission']) || trim($datos['type_comission']) === '' 
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            

            if (empty($datos['tickera']) || trim($datos['tickera']) === '') {
                $tickera = '';
            }else {
                $tickera = trim(htmlspecialchars($datos['tickera']));
                
            }
            $tasa_bcv = trim(htmlspecialchars($datos['tasa_bcv']));
            $tasa_paralelo = trim(htmlspecialchars($datos['tasa_paralelo']));
            $comission_detal = trim(htmlspecialchars($datos['comission_detal']));
            $comission_mayor = trim(htmlspecialchars($datos['comission_mayor']));
            $type_comission = trim(htmlspecialchars($datos['type_comission']));
            
            [$configuracion_actual] = $this->config_model->obtener_configuracion(1);

            if (
                $configuracion_actual['tickera_name'] == $tickera &&
                
                $configuracion_actual['tasa_bcv'] == $tasa_bcv &&
                $configuracion_actual['tasa_paralelo'] == $tasa_paralelo &&
                $configuracion_actual['comission_detal'] == $comission_detal &&
                $configuracion_actual['comission_mayor'] == $comission_mayor &&
                $configuracion_actual['type_comission'] == $type_comission
            ) {
                // No se ha realizado ningún cambio, no es necesario actualizar
                $result = ['success' => true, 'msg' => 'La configuracion es la misma, no se realizo ningun cambio.'];

            } else {

                $editar_configuracion = $this->config_model->editar_configuracion($tickera, $tasa_bcv, $tasa_paralelo, $comission_detal, $comission_mayor, $type_comission);

                // Manejo de la respuesta
                if ($editar_configuracion->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Cambios realizados.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al editar la configuracion.'];
                }
            }
        }




        echo json_encode($result);
    }

    public function editarConfiguracionEmpresa()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['rif']) || trim($datos['rif']) === '' ||
            empty($datos['company_name']) || trim($datos['company_name']) === '' ||
            empty($datos['company_email']) || !filter_var($datos['company_email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['company_address']) || trim($datos['company_address']) === '' ||
            empty($datos['company_phone']) || trim($datos['company_phone']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $rif = trim(htmlspecialchars($datos['rif']));
            $company_name = trim(htmlspecialchars($datos['company_name']));
            $company_email = trim(filter_var($datos['company_email'], FILTER_SANITIZE_EMAIL));
            $company_address = trim(htmlspecialchars($datos['company_address']));
            $company_phone = trim(htmlspecialchars($datos['company_phone']));

           

            [$configuracion_actual] = $this->config_model->obtener_configuracion(1);

            if (
                $configuracion_actual['rif'] == $rif &&
                $configuracion_actual['company_name'] == $company_name &&
                $configuracion_actual['company_email'] == $company_email &&
                $configuracion_actual['company_address'] == $company_address &&
                $configuracion_actual['company_phone'] == $company_phone 
            ) {
                // No se ha realizado ningún cambio, no es necesario actualizar
                $result = ['success' => true, 'msg' => 'La configuracion es la misma, no se realizo ningun cambio.'];
            } else {

                $editar_configuracion = $this->config_model->editar_configuracion_empresa($rif, $company_name, $company_email, $company_address, $company_phone);

                // Manejo de la respuesta
                if ($editar_configuracion->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Cambios realizados.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al editar la configuracion.'];
                }
            }
        }




        echo json_encode($result);
    }
}

new ConfigController();
