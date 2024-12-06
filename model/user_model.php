<?php
session_start();
require_once "../conection.php";


class User
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function obtener_roles()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los datos
            $sql = "SELECT id, name FROM roles";

            // Preparar la consulta
            $stmt = $this->_db->conection->prepare($sql);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los resultados
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los datos
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los roles: " . $e->getMessage();
            error_log($e->getMessage());
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_status()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los datos
            //id = 3 es eliminado
            $sql = "SELECT id, name FROM statuses WHERE id IN (1,2)";

            // Preparar la consulta
            $stmt = $this->_db->conection->prepare($sql);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener los resultados
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los datos
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los roles: " . $e->getMessage();
            error_log($e->getMessage());
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_usuario()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los usuarios que no esten eliminados
            
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT u.id, u.name, u.user, u.email, u.id_rol, r.name as rol, u.id_status, s.name as status, u.date_created FROM users u LEFT JOIN roles r ON r.id = u.id_rol LEFT JOIN statuses s ON s.id = u.id_status WHERE u.id_status != 3");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los clientes
            return $usuarios;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_usuario_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT u.id, u.name, u.user, u.email, u.id_rol, u.salary, u.department, r.name as rol, u.id_status, s.name as status, u.date_created FROM users u LEFT JOIN roles r ON r.id = u.id_rol LEFT JOIN statuses s ON s.id = u.id_status WHERE u.id_status != 3 AND u.id = ?");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function registrar_usuario($name, $email, $user, $salary, $department, $pass, $id_rol, $id_status)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("INSERT INTO users (name, email, user, salary, department, pass, id_rol, id_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$name, $email, $user, $salary, $department, $pass, $id_rol, $id_status]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function editar_usuario($name, $email, $user, $salary, $department, $id_rol, $id_status, $id)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
           
            $sql = $this->_db->conection->prepare("UPDATE users SET name = ?, email= ?, user= ?, salary = ?, department = ?, id_rol= ?, id_status= ? WHERE id = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$name, $email, $user, $salary, $department, $id_rol, $id_status, $id]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }
    public function editar_usuario_wpass($name, $email, $user, $pass, $salary, $department, $id_rol, $id_status, $id)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
           
            $sql = $this->_db->conection->prepare("UPDATE users SET name = ?, email= ?, user= ?, pass= ?, salary = ?, department = ?, id_rol= ?, id_status= ? WHERE id = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$name, $email, $user, $pass, $salary, $department, $id_rol, $id_status, $id]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function existe_usuario($user)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM users WHERE user = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$user]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function existe_usuario_by_id($user, $id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM users WHERE user = ? AND id != ? ");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$user, $id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function eliminar_usuario($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE users SET id_status = 3 WHERE id = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function activar_usuario($user)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE users SET id_status = 1 WHERE user = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$user]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
}
