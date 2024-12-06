<?php
session_start();
require_once "../conection.php";

setlocale(LC_ALL, 'es_ES');
class Product
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

    public function obtener_producto()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los productos que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT p.id, p.name, p.model, p.cost, p.price, p.second_price, p.stock, p.stock_warranty, p.id_user, u.name as user, p.id_status, s.name as status FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status WHERE p.id_status != 3");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los productos
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los productos: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_producto_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT p.id, p.name, p.model, p.cost, p.price, p.second_price, p.stock, p.stock_warranty, p.id_user, u.name as user, p. id_status, s.name as status FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status WHERE p.id_status != 3 AND p.id = ?");

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

    public function registrar_producto($name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("INSERT INTO products ( name, model, cost, price, second_price, stock, stock_warranty, id_user, id_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function editar_producto($name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status, $id)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE products SET name= ?, model= ?, cost= ?, price= ?, second_price= ?, stock = ?, stock_warranty = ?, id_user = ?, id_status = ? WHERE id = ?");

            // Ejecutar consulta y validar exito
            $sql->execute([$name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status, $id]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function existe_producto($name, $model)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Prepara la consulta SQL con marcadores de posición para una vinculación segura de parámetros
            $sql = $this->_db->conection->prepare("SELECT id FROM products WHERE name LIKE :name AND model LIKE :model");

            // Vincula los parámetros usando marcadores de posición con nombre para mayor claridad y seguridad
            $sql->bindValue(':name', "%$name%", PDO::PARAM_STR);
            $sql->bindValue(':model', "%$model%", PDO::PARAM_STR);

            // Ejecuta la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result; 

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function existe_producto_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM products WHERE id != ? ");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function eliminar_producto($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE products SET id_status = 3 WHERE id = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function agregar_stock($id, $cost, $price, $second_price, $stock, $id_user)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL agregarStock(?,?,?,?,?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id, $cost, $price, $second_price, $stock, $id_user]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function activar_producto($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("UPDATE products SET id_status = 1 WHERE id = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id]);

            return $sql;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_historial()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los productos que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT ph.id, CONCAT(p.name, ' ', p.model) as name_product, u.name as name_user, ph.modified_column, ph.action, ph.old_value, ph.new_value, ph.date_modified FROM products_history ph LEFT JOIN products p ON p.id = ph.id_product LEFT JOIN users u ON u.id = ph.id_user ORDER BY ph.date_modified DESC");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los productos
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los productos: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
}
