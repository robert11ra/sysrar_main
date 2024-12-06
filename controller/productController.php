<?php
require_once '../model/product_model.php'; // Incluir el archivo del modelo

class ProductController
{
    private $product_model;

    public  function __construct()
    {

        $this->product_model = new Product();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerProductos':
                $this->obtenerProductos();
                break;
            case 'registrarProducto':
                $this->registrarProducto();
                break;
            case 'editarProducto':
                $this->editarProducto();
                break;
            case 'eliminarProducto':
                $this->eliminarProducto();
                break;
            case 'obtenerStatus':
                $this->obtenerStatus();
                break;
            case 'obtenerProductoById':
                $this->obtenerProductoById();
                break;
            case 'obtenerHistorial':
                $this->obtenerHistorial();
                break;
            case 'agregarStock':
                $this->agregarStock();
                break;
            case 'seguimientoProducto':
                $this->seguimientoProducto();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function obtenerStatus()
    {
        $result = $this->product_model->obtener_status();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerProductos()
    {

        // Obtener los datos de los Productos
        $result = $this->product_model->obtener_producto();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerProductoById()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['idproducto']) || trim($datos['idproducto']) === ''
        ) {
            //echo json_encode($datos);
            $result[0] = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $idproducto = trim(htmlspecialchars($datos['idproducto']));

            //Datos del usuario por id
            $result = $this->product_model->obtener_producto_by_id($idproducto);
        }

        echo json_encode($result[0]);
    }

    public function registrarProducto()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['model']) || trim($datos['model']) === '' ||
            empty($datos['cost']) || trim($datos['cost']) === '' ||
            empty($datos['price']) || trim($datos['price']) === '' ||
            empty($datos['second_price']) || trim($datos['second_price']) === '' ||
            empty($datos['stock']) || trim($datos['stock']) === '' ||
            empty($datos['stock_warranty']) || trim($datos['stock_warranty']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === '' ||
            empty($datos['id_status']) || trim($datos['id_status']) === ''
        ) {

            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {

            // Sanitización de datos
            $name = trim(htmlspecialchars($datos['name']));
            $model = trim(htmlspecialchars($datos['model']));
            $cost = trim($datos['cost']);
            $price = trim($datos['price']);
            $second_price = trim($datos['second_price']);

            //!Crear logica para habilitar un check para permitir decimales o enteros desde configuraciones
            $stock = trim(round($datos['stock']));
            $stock_warranty = trim(round($datos['stock_warranty']));

            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = trim(filter_var($datos['id_status'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion
            //Validar si existe el producto, si existe, mostrar mensaje de que existe, sino, registrarlo
            $existe_producto = $this->product_model->existe_producto($name, $model);
            if ($existe_producto !== null) {

                $id_exist = $existe_producto[0]['id'];
                $activar_producto = $this->product_model->activar_producto($id_exist);
                if ($activar_producto->rowCount() > 0) {
                    $result = ['success' => false, 'error' => 'Producto existe, se ha activado nuevamente'];
                } else {
                    $result = ['success' => false, 'error' => 'Producto existe, se encuentra activado'];
                }
            } else {

                $registrar_producto = $this->product_model->registrar_producto($name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status);

                // Manejo de la respuesta
                if ($registrar_producto->rowCount() > 0) {

                    $result = ['success' => true, 'msg' => 'Producto registrado exitosamente.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al registrar el Producto.'];
                }
            }
        }




        echo json_encode($result);
    }


    public function editarProducto()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['name']) || trim($datos['name']) === '' ||
            empty($datos['model']) || trim($datos['model']) === '' ||
            empty($datos['cost']) || trim($datos['cost']) === '' ||
            empty($datos['price']) || trim($datos['price']) === '' ||
            empty($datos['second_price']) || trim($datos['second_price']) === '' ||
            empty($datos['stock']) || trim($datos['stock']) === '' ||
            empty($datos['stock_warranty']) || trim($datos['stock_warranty']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === '' ||
            empty($datos['id_status']) || trim($datos['id_status']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id = trim(htmlspecialchars($datos['id']));
            $name = trim(htmlspecialchars($datos['name']));
            $model = trim(htmlspecialchars($datos['model']));
            $cost = trim($datos['cost']);
            $price = trim($datos['price']);
            $second_price = trim($datos['second_price']);

            //! MISMA LOGICA PARA QUE EL REGISTRO
            $stock = trim(round($datos['stock']));
            $stock_warranty = trim(round($datos['stock_warranty']));

            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            $id_status = trim(filter_var($datos['id_status'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion
            


                //Corchetes para desestructuración  de array
                [$producto_actual] = $this->product_model->obtener_producto_by_id($id);
                if (
                    $producto_actual['name'] == $name &&
                    $producto_actual['model'] == $model &&
                    $producto_actual['cost'] == $cost &&
                    $producto_actual['price'] == $price &&
                    $producto_actual['second_price'] == $second_price &&
                    $producto_actual['stock'] == $stock &&
                    $producto_actual['stock_warranty'] == $stock_warranty &&
                    $producto_actual['id_status'] == $id_status
                ) {
                    // No se ha realizado ningún cambio, no es necesario actualizar
                    $result = ['success' => true, 'msg' => 'El producto ya está actualizado, no se realizo ningun cambio.'];
                } else {
                    // Se actualiza el producto
                    $editar_producto = $this->product_model->editar_producto($name, $model, $cost, $price, $second_price, $stock, $stock_warranty, $id_user, $id_status, $id);

                    // Manejo de la respuesta
                    if ($editar_producto->rowCount() > 0) {
                        $result = ['success' => true, 'msg' => 'Producto editado exitosamente.'];
                    } else {
                        $result = ['success' => false, 'error' => 'Error al editar el producto'];
                    }
                }
            
        }

        echo json_encode($result);
    }

    public function eliminarProducto()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_producto']) || trim($datos['id_producto']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        }

        // Sanitización de datos
        $id_producto = trim(htmlspecialchars($datos['id_producto']));

        //! Instanciación del modelo, ejecución del registro

        //Elimina el producto y muestra respuesta
        $eliminar_producto = $this->product_model->eliminar_producto($id_producto);

        // Manejo de la respuesta
        if ($eliminar_producto->rowCount() > 0) {

            $result = ['success' => true, 'msg' => 'Producto eliminado exitosamente.'];
        } else {

            $result = ['success' => false, 'error' => 'Error al eliminar el producto.'];
        }


        echo json_encode($result);
    }

    public function agregarStock()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['new_cost']) || trim($datos['new_cost']) === '' ||
            empty($datos['new_price']) || trim($datos['new_price']) === '' ||
            empty($datos['new_second_price']) || trim($datos['new_second_price']) === '' ||
            empty($datos['new_stock']) || trim($datos['new_stock']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id = trim(htmlspecialchars($datos['id']));
            $cost = trim($datos['new_cost']);
            $price = trim($datos['new_price']);
            $second_price = trim($datos['new_second_price']);
            $stock = trim(round($datos['new_stock']));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));

            //! Instanciación del modelo, ejecución del registro y validacion
            //Corchetes para desestructuración  de array
            [$producto_actual] = $this->product_model->obtener_producto_by_id($id);
            if (
                $producto_actual['cost'] == $cost &&
                $producto_actual['price'] == $price &&
                $producto_actual['second_price'] == $second_price &&
                $producto_actual['stock'] == $stock
            ) {
                // No se ha realizado ningún cambio, no es necesario actualizar
                $result = ['success' => true, 'msg' => 'El producto ya está actualizado, no se realizo ningun cambio.'];
            } else {
                // Se actualiza el producto
                $agregar_stock = $this->product_model->agregar_stock($id, $cost, $price, $second_price, $stock, $id_user);

                // Manejo de la respuesta
                if ($agregar_stock->rowCount() > 0) {
                    $result = ['success' => true, 'msg' => 'Stock ingresado con exito.'];
                } else {
                    $result = ['success' => false, 'error' => 'Error al ingresar stock'];
                }
            }
        }

        echo json_encode($result);
    }

    public function obtenerHistorial()
    {

        // Obtener los datos de los Productos
        $result = $this->product_model->obtener_historial();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function seguimientoProducto()
    {

        // Obtener los datos de los Productos
        $result = $this->product_model->obtener_historial();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }
}

new ProductController();
