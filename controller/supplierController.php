<?php
require_once '../model/supplier_model.php'; // Incluir el archivo del modelo

class SupplierController
{
    private $supplier_model;

    public  function __construct()
    {

        $this->supplier_model = new Supplier();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerProveedores':
                $this->obtenerProveedores();
                break;
            case 'registrarProveedor':
                $this->registrarProveedor();
                break;
            case 'editarProveedor':
                $this->editarProveedor();
                break;
            case 'eliminarProveedor':
                $this->eliminarProveedor();
                break;
            case 'obtenerStatus':
                $this->obtenerStatus();
                break;
            case 'obtenerProveedorById':
                $this->obtenerProveedorById();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerStatus()
    {
        $result = $this->supplier_model->obtener_status();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerProveedores()
    {

        // Obtener los datos de los proveedores
        $result = $this->supplier_model->obtener_proveedores();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerProveedorById()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_proveedor']) || trim($datos['id_proveedor']) === ''
        ) {
            //echo json_encode($datos);
            $result[0] = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id_proveedor = trim(htmlspecialchars($datos['id_proveedor']));

            //Datos del usuario por id
            [$result]= $this->supplier_model->obtener_proveedores_by_id($id_proveedor);
        }

        echo json_encode($result);
    }

    public function registrarProveedor()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['rif']) || trim($datos['rif']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['phone']) || trim($datos['phone']) === '' ||
            empty($datos['address']) || trim($datos['address']) === '' ||
            empty($datos['status']) || trim($datos['status']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $rif = trim(htmlspecialchars($datos['rif']));
            $name = trim(htmlspecialchars($datos['name']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $phone = trim(htmlspecialchars($datos['phone']));
            $address = trim(htmlspecialchars($datos['address']));
            $id_status = trim(filter_var($datos['status'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el usuario, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_proveedor = $this->supplier_model->existe_proveedor($rif);

            if ($existe_proveedor->rowCount() > 0) {

                $activar_proveedor = $this->supplier_model->activar_proveedor($rif);
                if ($activar_proveedor->rowCount() > 0) {

                    $result = ['success' => false, 'error' => 'Proveedor ya existe, se ha activado nuevamente'];
                } else {
                    $result = ['success' => false, 'error' => 'Proveedor existe, se encuentra activado'];
                }
            } else {

                $registro_proveedor = $this->supplier_model->registrar_proveedor($rif, $name, $email, $phone, $address, $id_user, $id_status);

                // Manejo de la respuesta
                if ($registro_proveedor->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Proveedor registrado exitosamente.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al registrar el Proveedor.'];
                }
            }
        }




        echo json_encode($result);
    }


    public function editarProveedor()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['rif']) || trim($datos['rif']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['phone']) || trim($datos['phone']) === '' ||
            empty($datos['address']) || trim($datos['address']) === '' ||
            empty($datos['status']) || trim($datos['status']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id = trim(filter_var($datos['id'], FILTER_SANITIZE_NUMBER_INT));
            $rif = trim(htmlspecialchars($datos['rif']));
            $name = trim(htmlspecialchars($datos['name']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $phone = trim(htmlspecialchars($datos['phone']));
            $address = trim(htmlspecialchars($datos['address']));
            $id_status = trim(filter_var($datos['status'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el usuario, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_proveedor_by_id = $this->supplier_model->existe_proveedor_by_id($rif, $id);

            if ($existe_proveedor_by_id->rowCount() > 0) {
                $result = ['success' => false, 'error' => 'RIF existente, por favor escriba otro RIF'];
            } else {
                //Corchetes para desestructuración  de array
                [$proveedor_actual] = $this->supplier_model->obtener_proveedores_by_id($id);

                if (
                    $proveedor_actual['rif'] == $rif &&
                    $proveedor_actual['name'] == $name &&
                    $proveedor_actual['email'] == $email &&
                    $proveedor_actual['phone'] == $phone &&
                    $proveedor_actual['address'] == $address &&
                    $proveedor_actual['id_status'] == $id_status
                ) {
                    // No se ha realizado ningún cambio, no es necesario actualizar
                    $result = ['success' => true, 'msg' => 'El proveedor ya está actualizado, no se realizo ningun cambio.'];
                } else {

                    $registro_proveedor = $this->supplier_model->editar_proveedor($rif, $name, $email, $phone, $address, $id_user, $id_status, $id);

                    // Manejo de la respuesta
                    if ($registro_proveedor->rowCount() > 0) {

                        $result = ['success' => true, 'msg' => 'Proveedor editado exitosamente.'];
                    } else {

                        $result = ['success' => false, 'error' => 'Error al editar el proveedor'];
                    }
                }
            }
        }




        echo json_encode($result);
    }

    public function eliminarProveedor()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_proveedor']) || trim($datos['id_proveedor']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {
            // Sanitización de datos
            $id_proveedor = trim(htmlspecialchars($datos['id_proveedor']));

            //! Instanciación del modelo, ejecución del registro

            //Elimina el proveedor y muestra respuesta
            $eliminar_proveedor = $this->supplier_model->eliminar_proveedor($id_proveedor);

            // Manejo de la respuesta
            if ($eliminar_proveedor->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Proveedor eliminado exitosamente.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al eliminar el Proveedor.'];
            }
        }



        echo json_encode($result);
    }
}

new SupplierController();
