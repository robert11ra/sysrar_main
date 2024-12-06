<?php
session_start();
require_once "../conection.php";

setlocale(LC_ALL, 'es_ES');

class Bill
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
            $sql = $this->_db->conection->prepare("SELECT p.id,  p.name, p.model, p.cost, p.price, p.second_price, p.id_user, u.name as user, p.id_status, s.name as status FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status WHERE p.id_status != 3");

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

    public function obtener_producto_apartados()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los productos que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT dr.id, c.name as client, u.name as user, CONCAT(p.name, ' ', p.model) AS product, dr.quantity, ROUND((dr.quantity * dr.sell_price),2) AS total_price, ROUND((dr.quantity * dr.sell_price_bs),2) AS total_price_bs, dr.date_created FROM details_reserved dr LEFT JOIN clients c ON c.id = dr.id_client LEFT JOIN users u ON u.id = dr.id_user LEFT JOIN products p ON p.id = dr.id_product;");

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

    public function obtener_detalles_venta($id_client, $id_user)
    {
        // Estructura para manejar la conexión y la consulta
        // Ya se tiene tasa del dia en tabla, falta que la agregue
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT dr.id, dr.id_user, dr.id_client, dr.id_product, dr.quantity, dr.sell_price, dr.sell_price_bs, p.name, p.model, p.price, p.second_price FROM details_reserved dr LEFT JOIN products p ON p.id = dr.id_product WHERE dr.id_client = ? AND dr.id_user = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id_client, $id_user]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }
    
    public function obtener_detalles_total_venta($id_client, $id_user)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT SUM(sell_price * quantity) as sell_price, SUM(sell_price_bs * quantity) as sell_price_bs, SUM((sell_price * quantity) * 0.16) as iva, SUM(sell_price * quantity) - SUM((sell_price * quantity) * 0.16) AS subtotal, tasa_select FROM details_reserved WHERE id_client = ? AND id_user = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id_client, $id_user]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }


    public function obtener_metodos()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los clientes que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM payment_method");

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

    // public function obtener_tasa_actual($id_client)
    // {
    //     //Estructura cuando no se reciben datos
    //     try {

    //         // Consulta SQL para obtener los tasa que no esten eliminados

    //         // Preparar la consulta
            
    //         $sql = $this->_db->conection->prepare("SELECT CASE WHEN c.id_type = 1 THEN config.tasa_bcv ELSE config.tasa_paralelo END AS tasa FROM clients c INNER JOIN configurations config ON 1=1 WHERE c.id_status != 3 AND c.id = ?");


    //         // Ejecutar la consulta
    //         $sql->execute([$id_client]);

    //         // Obtener los resultados
    //         $tasa = $sql->fetchAll(PDO::FETCH_ASSOC);

    //         // Devolver la tasa
    //         return $tasa;
    //     } catch (PDOException $e) {
    //         // Manejar cualquier excepción
    //         echo "Error al obtener los tasa: " . $e->getMessage();
    //         return array(); // Devolver un array vacío en caso de error
    //     }
    // }

    public function obtener_producto_by_id($id)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT p.id, p.name, p.model, p.cost, p.price, p.second_price, p.id_user, u.name as user, p. id_status, s.name as status FROM products p LEFT JOIN users u ON u.id = p.id_user LEFT JOIN statuses s ON s.id = p.id_status WHERE p.id_status != 3 AND p.id = ?");

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
    public function obtener_producto_by_id_type($id, $id_type, $id_client, $id_user)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            //price = DETAL = 1
            //second_price = MAYOR = 2

            // Retornar tasa protegida si existe de details_reserved, si no existe, traerla de configuraciones
            $sql = $this->_db->conection->prepare("CALL getProductByIdType(?,?,?,?)");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id, $id_type, $id_client, $id_user]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }


    public function existe_producto_venta($id_client, $id_user, $id_product)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT * FROM details_reserved WHERE id_client = ? AND id_user = ? AND id_product = ?;");

            // Ejecutar la consulta con los parámetros
            $sql->execute([$id_client, $id_user, $id_product]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;  // Devuelve true o false según exista

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function sumar_cantidad_producto_venta($id_client, $id_user, $id_product, $new_quantity)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            // $sql = $this->_db->conection->prepare("UPDATE details_reserved SET quantity = ? WHERE id_client = ? AND id_user = ? AND id_product = ?;");
            $sql = $this->_db->conection->prepare("CALL addProductExist(?,?,?,?)");
            // Ejecutar la consulta con los parámetros
            $sql->execute([$new_quantity, $id_client, $id_user, $id_product]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            //Devolver resultado
            return $result;

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function agregar_producto_venta($id_client, $id_user, $id_product, $quantity_product)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL addProduct(?,?,?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_client, $id_user, $id_product, $quantity_product]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            //Devolver resultado
            return $result;

        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function eliminar_producto_venta($id_client, $id_user, $id_product)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL delProduct(?, ?, ?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_client, $id_user, $id_product]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function vaciar_venta($id_client, $id_user)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL emptyBill(?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_client, $id_user]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }    

    public function procesar_venta($id_user, $id_client, $idmethod1, $method1, $idmethod2, $method2, $idmethod3, $method3, $idmethod4,$method4,$idmethod5, $method5,$idmethod6, $method6, $ship, $credito, $banco4, $banco5,$banco6, $vuelto_usd, $vuelto_bs, $metodo_bs)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL procesarVenta(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            // Si data está vacío, ejecutar la consulta sin parámetros
            $sql->execute([$id_user, $id_client, $idmethod1, $method1, $idmethod2, $method2, $idmethod3, $method3, $idmethod4, $method4, $idmethod5, $method5, $idmethod6, $method6, $ship, $credito, $banco4, $banco5,$banco6, $vuelto_usd, $vuelto_bs, $metodo_bs]);

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            //Devolver resultado
            return $result;
            
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function obtener_facturas()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los clientes que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT b.id, b.total, b.total_bs, b.tasa_bcv, b.ship, b.id_client, c.name as client, b.id_status, s.name as status, b.id_user, u.name as user, b.date_created FROM bills b LEFT JOIN clients c ON c.id = b.id_client LEFT JOIN statuses s ON s.id = b.id_status LEFT JOIN users u ON u.id = b.id_user WHERE b.id_status != 3");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los facturas
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los clientes: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_facturas_pendientes()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los clientes que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT b.id, b.total, b.total_bs, b.tasa_bcv, b.ship, b.id_client, c.name as client, b.id_status, s.name as status, b.id_user, u.name as user, b.date_created FROM bills b LEFT JOIN clients c ON c.id = b.id_client LEFT JOIN statuses s ON s.id = b.id_status LEFT JOIN users u ON u.id = b.id_user WHERE b.id_status = 5");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los facturas
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los clientes: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function obtener_facturas_anuladas()
    {
        //Estructura cuando no se reciben datos
        try {

            // Consulta SQL para obtener los clientes que no esten eliminados

            // Preparar la consulta
            $sql = $this->_db->conection->prepare("SELECT b.id, b.total, b.total_bs, b.tasa_bcv, b.ship, b.id_client, c.name as client, b.id_status, s.name as status, b.id_user, u.name as user, b.date_created FROM bills b LEFT JOIN clients c ON c.id = b.id_client LEFT JOIN statuses s ON s.id = b.id_status LEFT JOIN users u ON u.id = b.id_user WHERE b.id_status = 6");

            // Ejecutar la consulta
            $sql->execute();

            // Obtener los resultados
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            // Devolver los facturas
            return $result;
        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los clientes: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }


    public function eliminar_factura($id_factura, $id_user)
    {
        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL eliminarFactura(?, ?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_factura, $id_user]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    //!OBTENER DATA FACTURA
    public function obtener_data_factura($id_factura)
    {
        // Estructura para manejar la conexión y la consulta
        try {
            // Preparar la consulta
            $sql_client = $this->_db->conection->prepare("CALL getDataClientFactura(?)");
            $sql_client->execute([$id_factura]);
            $client_result = $sql_client->fetchAll(PDO::FETCH_ASSOC); // Datos de cliente

            // Cerrar el cursor
            $sql_client->closeCursor();

            // Preparar la consulta
            $sql_products = $this->_db->conection->prepare("CALL getProductsFactura(?)");
            $sql_products->execute([$id_factura]);
            $products_result = $sql_products->fetchAll(PDO::FETCH_ASSOC);   // Datos de productos

            // Cerrar el cursor
            $sql_products->closeCursor();

            // Preparar la consulta
            $sql_payments = $this->_db->conection->prepare("CALL getPaymentsFactura(?)");
            $sql_payments->execute([$id_factura]);
            $payments_result = $sql_payments->fetchAll(PDO::FETCH_ASSOC);   // Datos de pagos

            // Cerrar el cursor
            $sql_payments->closeCursor();

            // Preparar la consulta
            $sql_config = $this->_db->conection->prepare("CALL getConfiguration()");
            $sql_config->execute();
            $config_result = $sql_config->fetchAll(PDO::FETCH_ASSOC);   // Datos de pagos

            // Cerrar el cursor
            $sql_config->closeCursor();

            // Preparar la consulta
            $sql_cashback = $this->_db->conection->prepare("CALL getCashBackBill(?)");
            $sql_cashback->execute([$id_factura]);
            $cashback_result = $sql_cashback->fetchAll(PDO::FETCH_ASSOC);   // Datos de vueltos

            // Cerrar el cursor
            $sql_cashback->closeCursor();

            // Armar los datos de retorno
            return [
                'clientData' => $client_result,
                'productsData' => $products_result,
                'paymentsData' => $payments_result, 
                'configData' => $config_result,
                'cashbackData' => $cashback_result
            ];

        } catch (PDOException $e) {
            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error
        }
    }

    public function anular_factura($id_factura, $motivo){

        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL overrideBill(?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_factura, $motivo]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function pagar_factura($id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs, $vueltoUSD, $vueltoBS, $metodo_vuelto)
    {

        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL payOverdueBill(?,?,?,?,?,?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs, $vueltoUSD, $vueltoBS, $metodo_vuelto]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    public function abono_factura($id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs)
    {

        //Estructura cuando se reciben datos
        try {

            //Preparar la consulta
            $sql = $this->_db->conection->prepare("CALL payPartialOverdueBill(?,?,?,?)");

            // Ejecutar consulta y validar exito
            $sql->execute([$id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs]);

            //Devolver resultado
            return $sql;
        } catch (PDOException $e) {

            // Manejar cualquier excepción
            echo "Error al obtener los resultados: " . $e->getMessage();
            return array(); // Devolver un array vacío en caso de error

        }
    }

    
}
