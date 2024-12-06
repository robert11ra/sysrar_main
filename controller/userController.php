<?php
require_once '../model/user_model.php'; // Incluir el archivo del modelo

class UserController
{
    private $user_model;

    public  function __construct()
    {

        $this->user_model = new User();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerUsuarios':
                $this->obtenerUsuarios();
                break;
            case 'registrarUsuario':
                $this->registrarUsuario();
                break;
            case 'editarUsuario':
                $this->editarUsuario();
                break;
            case 'eliminarUsuario':
                $this->eliminarUsuario();
                break;
            case 'obtenerRoles':
                $this->obtenerRoles();
                break;
            case 'obtenerStatus':
                $this->obtenerStatus();
                break;
            case 'obtenerUsuarioById':
                $this->obtenerUsuarioById();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerRoles()
    {
        $result = $this->user_model->obtener_roles();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerStatus()
    {
        $result = $this->user_model->obtener_status();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerUsuarios()
    {

        // Obtener los datos de los usuarios
        $result = $this->user_model->obtener_usuario();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerUsuarioById()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['idusuario']) || trim($datos['idusuario']) === ''
        ) {
            //echo json_encode($datos);
            $result[0] = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $idusuario = trim(htmlspecialchars($datos['idusuario']));

            //Datos del usuario por id
            $result = $this->user_model->obtener_usuario_by_id($idusuario);
        }

        echo json_encode($result[0]);
    }

    public function registrarUsuario()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['user']) || trim($datos['user']) === '' ||
            empty($datos['pass']) || trim($datos['pass']) === '' ||
            empty($datos['salary']) || trim($datos['salary']) === '' ||
            empty($datos['department']) || trim($datos['department']) === '' ||
            empty($datos['id_rol']) || trim($datos['id_rol']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $name = trim(htmlspecialchars($datos['name']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $user = trim(htmlspecialchars($datos['user']));
            $salary = trim(htmlspecialchars($datos['salary']));
            $department = trim(htmlspecialchars($datos['department']));
            $id_rol = trim(filter_var($datos['id_rol'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = '1';

            // Hashing de la contraseña
            $pass_hashed = password_hash($datos['pass'], PASSWORD_DEFAULT);

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el usuario, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_usuario = $this->user_model->existe_usuario($user);

            if ($existe_usuario->rowCount() > 0) {

                $activar_usuario = $this->user_model->activar_usuario($user);
                if ($activar_usuario->rowCount() > 0) {

                    $result = ['success' => false, 'error' => 'Usuario ya existe, se ha activado nuevamente'];
                } else {
                    $result = ['success' => false, 'error' => 'Usuario existe, se encuentra activado'];
                }
            } else {

                $registro_usuario = $this->user_model->registrar_usuario($name, $email, $user, $salary, $department, $pass_hashed, $id_rol, $id_status);

                // Manejo de la respuesta
                if ($registro_usuario->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Usuario registrado exitosamente.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al registrar el usuario.'];
                }
            }
        }




        echo json_encode($result);
    }


    public function editarUsuario()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['email']) || !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            empty($datos['user']) || trim($datos['user']) === '' ||
            empty($datos['salary']) || trim($datos['salary']) === '' ||
            empty($datos['department']) || trim($datos['department']) === '' ||
            empty($datos['id_rol']) || trim($datos['id_rol']) === '' ||
            empty($datos['id_status']) || trim($datos['id_status']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id = trim(htmlspecialchars($datos['id']));
            $name = trim(htmlspecialchars($datos['name']));
            $email = trim(filter_var($datos['email'], FILTER_SANITIZE_EMAIL));
            $user = trim(htmlspecialchars($datos['user']));
            $salary = trim(htmlspecialchars($datos['salary']));
            $department = trim(htmlspecialchars($datos['department']));
            $id_rol = trim(filter_var($datos['id_rol'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = trim(filter_var($datos['id_status'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el usuario, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_usuario_by_id = $this->user_model->existe_usuario_by_id($user, $id);

            if ($existe_usuario_by_id->rowCount() > 0) {
                $result = ['success' => false, 'error' => 'Usuario ya existe, por favor escriba otro usuario'];
            } else {
                //Corchetes para desestructuración  de array
                [$usuario_actual] = $this->user_model->obtener_usuario_by_id($id);

                if (
                    $usuario_actual['name'] == $name &&
                    $usuario_actual['email'] == $email &&
                    $usuario_actual['user'] == $user &&
                    $usuario_actual['salary'] == $salary &&
                    $usuario_actual['department'] == $department &&
                    $usuario_actual['id_rol'] == $id_rol &&
                    $usuario_actual['id_status'] == $id_status &&
                    empty($datos['pass']) || trim($datos['pass']) === ''
                ) {
                    // No se ha realizado ningún cambio, no es necesario actualizar
                    $result = ['success' => true, 'msg' => 'El usuario ya está actualizado, no se realizo ningun cambio.'];
                } else {
                    if (empty($datos['pass']) || trim($datos['pass']) === '') {

                        $registro_usuario = $this->user_model->editar_usuario($name, $email, $user, $salary, $department, $id_rol, $id_status, $id);
                    } else {
                        // Hashing de la contraseña
                        $pass_hashed = password_hash($datos['pass'], PASSWORD_DEFAULT);
                        $registro_usuario = $this->user_model->editar_usuario_wpass($name, $email, $user, $pass_hashed, $salary, $department, $id_rol, $id_status, $id);
                    }

                    // Manejo de la respuesta
                    if ($registro_usuario->rowCount() > 0) {

                        $result = ['success' => true, 'msg' => 'Usuario editado exitosamente.'];
                    } else {

                        $result = ['success' => false, 'error' => var_export($registro_usuario, true)];
                    }
                }
            }
        }




        echo json_encode($result);
    }

    public function eliminarUsuario()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_usuario']) || trim($datos['id_usuario']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {
            // Sanitización de datos
            $id_usuario = trim(htmlspecialchars($datos['id_usuario']));

            //! Instanciación del modelo, ejecución del registro

            //Elimina el usuario y muestra respuesta
            $eliminar_usuario = $this->user_model->eliminar_usuario($id_usuario);

            // Manejo de la respuesta
            if ($eliminar_usuario->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Usuario eliminado exitosamente.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al eliminar el usuario.'];
            }
        }



        echo json_encode($result);
    }
}

new UserController();
