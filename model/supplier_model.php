<?php
session_start();
require_once "../conection.php";


class Supplier
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

    public function obtener_proveedores()
    {
        //Estructura cuando no se reciben datos
        try {
            // Consulta SQL para obtener los usuarios que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT s.id, s.name, s.rif, s.phone, s.email, s.address, u.name as user, st.name as status, s.id_status, s.date_created FROM suppliers s LEFT JOIN users u ON u.id = s.id_user LEFT JOIN statuses st ON st.id = s.id_status;");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $proveedores = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar la conexión


            // Devolver los clientes
            return $proveedores;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los proveedores: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_proveedores_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT s.id, s.name, s.rif, s.phone, s.email, s.address, u.name as user, st.name as status, s.id_status, s.date_created FROM suppliers s LEFT JOIN users u ON u.id = s.id_user LEFT JOIN statuses st ON st.id = s.id_status WHERE s.id = ?");

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

    public function registrar_proveedor($rif, $name, $email, $phone, $address, $id_user, $id_status)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("INSERT INTO suppliers (rif, name, email, phone, address, id_user, id_status) VALUES (?,?,?,?,?,?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$rif, $name, $email, $phone, $address, $id_user, $id_status]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function editar_proveedor($rif, $name, $email, $phone, $address, $id_user, $id_status, $id)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta

            $sql = $this->_db->conection->prepare("UPDATE suppliers SET rif = ?, name = ?, email = ?, phone = ?, address = ?, id_user = ?, id_status = ? WHERE id = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$rif, $name, $email, $phone, $address, $id_user, $id_status, $id]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }
    

    public function existe_proveedor($rif)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM suppliers WHERE rif = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$rif]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function existe_proveedor_by_id($rif, $id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM suppliers WHERE rif = ? AND id != ? ");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$rif, $id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function eliminar_proveedor($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE suppliers SET id_status = 3 WHERE id = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function activar_proveedor($rif)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE suppliers SET id_status = 1 WHERE rif = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$rif]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
}
