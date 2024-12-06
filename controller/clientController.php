<?php
require_once '../model/client_model.php'; // Incluir el archivo del modelo

class ClientController
{
    private $client_model;

    public  function __construct()
    {

        $this->client_model = new Client();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerClientes':
                $this->obtenerClientes();
                break;
            case 'registrarCliente':
                $this->registrarCliente();
                break;
            case 'editarCliente':
                $this->editarCliente();
                break;
            case 'eliminarCliente':
                $this->eliminarCliente();
                break;
            case 'obtenerStatus':
                $this->obtenerStatus();
                break;
            case 'obtenerTypes':
                $this->obtenerTypes();
                break;
            case 'obtenerClienteById':
                $this->obtenerClienteById();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerStatus()
    {
        $result = $this->client_model->obtener_status();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerTypes()
    {
        $result = $this->client_model->obtener_types();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerClientes()
    {

        // Obtener los datos de los clientes
        $result = $this->client_model->obtener_cliente();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerClienteById()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['idcliente']) || trim($datos['idcliente']) === ''
        ) {
            //echo json_encode($datos);
            $result[0] = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $idcliente = trim(htmlspecialchars($datos['idcliente']));

            //Datos del usuario por id
            $result = $this->client_model->obtener_cliente_by_id($idcliente);
        }

        echo json_encode($result[0]);
    }

    public function registrarCliente()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['ced']) || trim($datos['ced']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['phone']) || trim($datos['phone']) === '' ||
            empty($datos['address']) || trim($datos['address']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['id_user']) || trim($datos['id_user']) === '' ||
            empty($datos['id_type']) || trim($datos['id_type']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => $datos['id_type']];
        } else {
            // Sanitización de datos
            $ced = trim(htmlspecialchars($datos['ced']));
            $name = trim(htmlspecialchars($datos['name']));
            $phone = trim(htmlspecialchars($datos['phone']));
            $address = trim(htmlspecialchars($datos['address']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            $id_type = trim(filter_var($datos['id_type'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = 1;

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el usuario, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_cliente = $this->client_model->existe_cliente($ced);

            if ($existe_cliente->rowCount() > 0) {

                $activar_cliente = $this->client_model->activar_cliente($ced);
                if ($activar_cliente->rowCount() > 0) {

                    $result = ['success' => false, 'error' => 'Cliente ya existe, se ha activado nuevamente'];
                } else {
                    $result = ['success' => false, 'error' => 'Cliente existe, se encuentra activado'];
                }
            } else {

                $registrar_cliente = $this->client_model->registrar_cliente($ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status);

                // Manejo de la respuesta
                if ($registrar_cliente->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Cliente registrado exitosamente.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al registrar el cliente.'];
                }
            }
        }




        echo json_encode($result);
    }


    public function editarCliente()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['ced']) || trim($datos['ced']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['phone']) || trim($datos['phone']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['address']) || trim($datos['address']) === '' ||
            empty($datos['id_type']) || trim($datos['id_type']) === '' ||
            empty($datos['id_status']) || trim($datos['id_status']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id = trim(htmlspecialchars($datos['id']));
            $ced = trim(htmlspecialchars($datos['ced']));
            $name = trim(htmlspecialchars($datos['name']));
            $phone = trim(htmlspecialchars($datos['phone']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $address = trim(htmlspecialchars($datos['address']));
            $id_type = trim(filter_var($datos['id_type'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = trim(filter_var($datos['id_status'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el cliente, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_cliente_by_id = $this->client_model->existe_cliente_by_id($ced, $id);

            if ($existe_cliente_by_id->rowCount() > 0) {
                $result = ['success' => false, 'error' => 'Cliente ya existe, por favor escriba otra cedula'];
            } else {
                //Corchetes para desestructuración  de array
                [$cliente_actual] = $this->client_model->obtener_cliente_by_id($id);

                if (
                    $cliente_actual['ced'] == $ced &&
                    $cliente_actual['name'] == $name &&
                    $cliente_actual['phone'] == $phone &&
                    $cliente_actual['email'] == $email &&
                    $cliente_actual['address'] == $address &&
                    $cliente_actual['id_type'] == $id_type
                ) {
                    // No se ha realizado ningún cambio, no es necesario actualizar
                    $result = ['success' => true, 'msg' => 'El cliente ya está actualizado, no se realizo ningun cambio.'];
                } else {
                    $editar_cliente = $this->client_model->editar_cliente($ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status, $id);

                    // Manejo de la respuesta
                    if ($editar_cliente->rowCount() > 0) {

                        $result = ['success' => true, 'msg' => 'Cliente editado exitosamente.'];
                    } else {

                        $result = ['success' => false, 'error' => 'Error al editar el cliente.'];
                    }
                }
            }
        }




        echo json_encode($result);
    }

    public function eliminarCliente()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_cliente']) || trim($datos['id_cliente']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        }

        // Sanitización de datos
        $id_cliente = trim(htmlspecialchars($datos['id_cliente']));

        //! Instanciación del modelo, ejecución del registro

        //Elimina el cliente y muestra respuesta
        $eliminar_client = $this->client_model->eliminar_cliente($id_cliente);

        // Manejo de la respuesta
        if ($eliminar_client->rowCount() > 0) {

            $result = ['success' => true, 'msg' => 'Cliente eliminado exitosamente.'];
        } else {

            $result = ['success' => false, 'error' => 'Error al eliminar el cliente.'];
        }


        echo json_encode($result);
    }
}

new ClientController();
