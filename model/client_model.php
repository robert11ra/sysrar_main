<?php
session_start();
require_once "../conection.php";


class Client
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Conection();
        $this->_db->conect();
    }

    public function obtener_status()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los datos
            $sql = "SELECT id, name FROM statuses";

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

    public function obtener_types()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los datos
            $sql = "SELECT id, name FROM clients_types";

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

    public function obtener_cliente()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los clientes que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT c.id, c.ced, c.name, c.phone, c.address, c.email, u.name as user, ct.name as type, c.id_status, s.name as status, c.date_created, c.date_changed FROM clients c LEFT JOIN users u ON u.id = c.id_user_created LEFT JOIN clients_types ct ON ct.id = c.id_type LEFT JOIN statuses s ON s.id = c.id_status WHERE c.id_status != 3");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $clientes = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los clientes
            return $clientes;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los clientes: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_cliente_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT c.id, c.ced, c.name, c.phone, c.address, c.email, u.name as user, c.id_type, ct.name as type, c.id_status, s.name as status, c.date_created FROM clients c LEFT JOIN users u ON u.id = c.id_user_created LEFT JOIN clients_types ct ON ct.id = c.id_type LEFT JOIN statuses s ON s.id = c.id_status WHERE c.id_status != 3 AND c.id = ?");

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

    public function registrar_cliente($ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("INSERT INTO clients (ced, name, phone, address, email, id_user_created, id_type, id_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function editar_cliente($ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status, $id)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta

            $sql = $this->_db->conection->prepare("UPDATE clients SET ced = ? , name= ?, phone= ?, address= ?, email= ?, id_user_changed= ?, id_type = ?, id_status = ? WHERE id = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$ced, $name, $phone, $address, $email, $id_user, $id_type, $id_status, $id]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function existe_cliente($user)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM clients WHERE ced = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$user]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function existe_cliente_by_id($ced, $id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM clients WHERE ced = ? AND id != ? ");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$ced, $id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function eliminar_cliente($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE clients SET id_status = 3 WHERE id = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function activar_cliente($user)
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
