<?php

require_once '../model/bill_model.php'; // Incluir el archivo del modelo

class BillController
{
    private $bill_model;

    public  function __construct()
    {

        $this->bill_model = new Bill();

        // Se obtiene la función a ejecutar
        $function = $_POST['function'];

        // Se ejecuta la función
        switch ($function) {
            case 'obtenerProductos':
                $this->obtenerProductos();
                break;
            case 'obtenerClientes':
                $this->obtenerClientes();
                break;
            case 'obtenerDatosCliente':
                $this->obtenerDatosCliente();
                break;
            case 'obtenerMetodosPago':
                $this->obtenerMetodosPago();
                break;
            case 'agregarProductoVenta':
                $this->agregarProductoVenta();
                break;
            case 'obtenerDetallesVenta':
                $this->obtenerDetallesVenta();
                break;
            case 'obtenerDetallesTotalVenta':
                $this->obtenerDetallesTotalVenta();
                break;
            case 'obtenerStatus':
                $this->obtenerStatus();
                break;
            case 'obtenerProductoById':
                $this->obtenerProductoById();
                break;
            case 'obtenerProductoByIdType':
                $this->obtenerProductoByIdType();
                break;
            case 'obtenerProductosApartados':
                $this->obtenerProductosApartados();
                break;
            case 'obtenerVueltosFactura':
                $this->obtenerVueltosFactura();
                break;
            case 'procesarVenta':
                $this->procesarVenta();
                break;
            case 'obtenerFacturas':
                $this->obtenerFacturas();
                break;
            case 'obtenerFacturasPendientes':
                $this->obtenerFacturasPendientes();
                break;
            case 'obtenerFacturasAnuladas':
                $this->obtenerFacturasAnuladas();
                break;
            case 'eliminarProductoVenta':
                $this->eliminarProductoVenta();
                break;
            case 'vaciarFactura':
                $this->vaciarFactura();
                break;
            case 'eliminarFactura':
                $this->eliminarFactura();
                break;
            case 'anularFactura':
                $this->anularFactura();
                break;
            case 'pagarFactura':
                $this->pagarFactura();
                break;
            case 'obtenerDataFactura':
                $this->obtenerDataFactura();
                break;
            default:
                echo json_encode(array('error' => 'Función no válida'));
        }
    }

    public function formateadorNumerico($num)
    {
        $num = number_format($num, 2, '.', '');
        return $num;
    }

    public function obtenerStatus()
    {
        $result = $this->bill_model->obtener_status();
        // Devolver los datos en formato json
        echo json_encode($result);
    }

    public function obtenerProductos()
    {

        // Obtener los datos de los Productos
        $result = $this->bill_model->obtener_producto();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerClientes()
    {

        // Obtener los datos de los clientes
        $result = $this->bill_model->obtener_cliente();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerProductosApartados()
    {

        // Obtener los datos de los Productos
        $result = $this->bill_model->obtener_producto_apartados();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerDatosCliente()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id = trim(htmlspecialchars($datos['id']));

            //Datos del usuario por id
            [$result] = $this->bill_model->obtener_cliente_by_id($id);
        }

        // Devolver los datos en formato JSON
        echo json_encode($result);
        // Obtener los datos de los clientes

    }

    public function obtenerDetallesVenta()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id_client = trim(htmlspecialchars($datos['id_client']));
            $id_user = trim(htmlspecialchars($datos['id_user']));

            //Datos del usuario por id
            $result = $this->bill_model->obtener_detalles_venta($id_client, $id_user);
        }

        // Devolver los datos en formato JSON
        echo json_encode($result);
        // Obtener los datos de los clientes

    }

    public function obtenerDetallesTotalVenta()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id_client = trim(htmlspecialchars($datos['id_client']));
            $id_user = trim(htmlspecialchars($datos['id_user']));

            //Datos del usuario por id
            [$result] = $this->bill_model->obtener_detalles_total_venta($id_client, $id_user);
            foreach ($result as $key => &$value) {
                if (is_numeric($value)) {
                    $value = number_format($value, 2, '.', '');
                }
            }
        }

        // Devolver los datos en formato JSON
        echo json_encode($result);
        // Obtener los datos de los clientes

    }

    public function obtenerMetodosPago()
    {

        // Obtener los datos de los clientes
        $result = $this->bill_model->obtener_metodos();
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
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $idproducto = trim(htmlspecialchars($datos['idproducto']));

            //Datos del usuario por id
            [$result] = $this->bill_model->obtener_producto_by_id($idproducto);
        }

        echo json_encode($result);
    }

    public function obtenerProductoByIdType()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id']) || trim($datos['id']) === '' ||
            empty($datos['id_type']) || trim($datos['id_type']) === '' ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => $datos];
        } else {

            $id = trim(htmlspecialchars($datos['id']));
            $id_type = trim(htmlspecialchars($datos['id_type']));
            $id_client = trim(htmlspecialchars($datos['id_client']));
            $id_user = trim(htmlspecialchars($datos['id_user']));

            //Datos del usuario por id
            [$result] = $this->bill_model->obtener_producto_by_id_type($id, $id_type, $id_client, $id_user);
        }

        echo json_encode($result);
    }

    public function agregarProductoVenta()
    {
        // Decodificación de la información JSONf
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === '' ||
            empty($datos['id_product']) || trim($datos['id_product']) === '' ||
            empty($datos['quantity_product']) || trim($datos['quantity_product']) === ''
        ) {

            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id_client = trim(filter_var($datos['id_client'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            $id_product = trim(filter_var($datos['id_product'], FILTER_SANITIZE_NUMBER_INT));
            $quantity_product = trim($datos['quantity_product']); //!Cantidad solicitada

            //! Instanciación del modelo, ejecución del registro y validacion
            //Validar si existe el registro, si existe, mostrar mensaje de que existe
            $existe_producto_venta = $this->bill_model->existe_producto_venta($id_client, $id_user, $id_product);

            if (!empty($existe_producto_venta)) {

                [$existe_producto_venta_array] = $existe_producto_venta;
                $id_user = $existe_producto_venta_array['id_user'];
                $id_client = $existe_producto_venta_array['id_client'];
                $id_product = $existe_producto_venta_array['id_product'];

                //!Calculo directo de la nueva cantidad del producto
                // $quantity = $existe_producto_venta_array['quantity'];
                // $new_quantity = $quantity + $quantity_product;

                //Existe el producto en tabla de venta, se procede a sumar el producto
                [$sumar_producto] = $this->bill_model->sumar_cantidad_producto_venta($id_client, $id_user, $id_product, $quantity_product);

                if (isset($sumar_producto['in'])) {

                    $result = ['success' => true, 'msg' => 'Producto ya existe en la venta, se ha sumado la cantidad.'];
                } elseif (isset($sumar_producto['out'])) {

                    $result = ['success' => false, 'error' => 'No hay stock suficiente, por favor actualice el producto.'];
                } else {
                    $result = ['success' => false, 'error' => 'Error al agregar el Producto EX.'];
                }
            } else {

                //Ya que no existe el producto, se procede a agregarlo a la venta
                [$agregar_producto_venta] = $this->bill_model->agregar_producto_venta($id_client, $id_user, $id_product, $quantity_product);

                // Manejo de la respuesta
                if (isset($agregar_producto_venta['in'])) {

                    $result = ['success' => true, 'msg' => 'Producto agregado exitosamente.', 'tasa_protegida' => $agregar_producto_venta['tasa_protegida']];
                } elseif (isset($agregar_producto_venta['out'])) {

                    $result = ['success' => false, 'error' => 'No hay stock suficiente, por favor actualice el producto.'];
                } else {

                    $result = ['success' => false, 'error' => 'Error al agregar el producto AGR.'];
                }
            }
        }
        echo json_encode($result);
    }

    public function obtenerFacturas()
    {

        // Obtener los datos de las facturas
        $result = $this->bill_model->obtener_facturas();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerFacturasPendientes()
    {

        // Obtener los datos de las facturas
        $result = $this->bill_model->obtener_facturas_pendientes();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function obtenerFacturasAnuladas()
    {

        // Obtener los datos de las facturas
        $result = $this->bill_model->obtener_facturas_anuladas();
        // Devolver los datos en formato JSON
        echo json_encode($result);
    }

    public function procesarVenta()
    {
        // Se recibe informacion
        $datos = json_decode($_POST['datos'], true);


        // Validación de datos


        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_user']) || empty($datos['id_client']) || empty($datos['id_documento'])
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => $datos];
        } else {

            $id_user = trim(htmlspecialchars($datos['id_user']));
            $id_client = trim(htmlspecialchars($datos['id_client']));
            $is_credito = trim(htmlspecialchars($datos['is_credito']));

            //!TICKET = 1 / PDF = 2
            $id_documento = trim(htmlspecialchars($datos['id_documento']));

            $idmethod1 = trim(htmlspecialchars($datos['idmethod1']));
            $idmethod2 = trim(htmlspecialchars($datos['idmethod2']));
            $idmethod3 = trim(htmlspecialchars($datos['idmethod3']));
            $idmethod4 = trim(htmlspecialchars($datos['idmethod4']));
            $idmethod5 = trim(htmlspecialchars($datos['idmethod5']));
            $idmethod6 = trim(htmlspecialchars($datos['idmethod6']));

            $method1 = trim(htmlspecialchars($datos['method1']));
            $method2 = trim(htmlspecialchars($datos['method2']));
            $method3 = trim(htmlspecialchars($datos['method3']));
            $method4 = trim(htmlspecialchars($datos['method4']));
            $method5 = trim(htmlspecialchars($datos['method5']));
            $method6 = trim(htmlspecialchars($datos['method6']));

            $banco4 = trim(htmlspecialchars($datos['banco4']));
            $banco5 = trim(htmlspecialchars($datos['banco5']));
            $banco6 = trim(htmlspecialchars($datos['banco6']));

            $ship = trim(htmlspecialchars($datos['ship']));

            if (!empty($method1)) {

                $method1 = trim(htmlspecialchars($datos['method1']));
            } else {
                $method1 = "";
            }

            if (!empty($method2)) {

                $method2 = trim(htmlspecialchars($datos['method2']));
            } else {
                $method2 = "";
            }

            if (!empty($method3)) {

                $method3 = trim(htmlspecialchars($datos['method3']));
            } else {
                $method3 = "";
            }

            // PAGOS CON BANCOS
            if (!empty($method4) && !empty($banco4)) {

                $method4 = trim(htmlspecialchars($datos['method4']));
                $banco4 = htmlspecialchars($datos['banco4']);
            } else {
                $method4 = "";
                $banco4 = "";
            }

            if (!empty($method5) && !empty($banco5)) {

                $method5 = trim(htmlspecialchars($datos['method5']));
                $banco5 = htmlspecialchars($datos['banco5']);
            } else {
                $method5 = "";
                $banco5 = "";
            }

            if (!empty($method6) && !empty($banco6)) {

                $method6 = trim(htmlspecialchars($datos['method6']));
                $banco6 = htmlspecialchars($datos['banco6']);
            } else {
                $method6 = "";
                $banco6 = "";
            }

            // VUELTOS
            // VALIDAR UNO POR UNO

            if (isset($datos['cantidadUSD'])) {
                $vuelto_usd = $datos['cantidadUSD'];
            } else {
                $vuelto_usd = "";
            }

            if (isset($datos['cantidadBS']) && isset($datos['metodo_vuelto'])) {
                $vuelto_bs = $datos['cantidadBS'];
                $metodo_bs = $datos['metodo_vuelto'];
            } else {
                $vuelto_bs = "";
                $metodo_bs = "";
            }



            //Procesar venta
            [$procesar_venta] = $this->bill_model->procesar_venta($id_user, $id_client, $idmethod1, $method1, $idmethod2, $method2, $idmethod3, $method3, $idmethod4, $method4, $idmethod5, $method5, $idmethod6, $method6, $ship, $is_credito, $banco4, $banco5, $banco6, $vuelto_usd, $vuelto_bs, $metodo_bs);

            if ($id_documento == '1') {
                //Ticket
                // Manejo de la respuesta
                if ($procesar_venta['id']) {
                    $id_bill = $procesar_venta['id'];
                    $result = ['success' => true, 'msg' => 'Venta realizada exitosamente por TICKET.', 'id_documento' => $id_documento, 'id_bill' => $id_bill];
                } else {

                    $result = ['success' => false, 'error' => $procesar_venta];
                }
            } else {
                //PDF
                // Manejo de la respuesta
                if ($procesar_venta['id']) {
                    $id_bill = $procesar_venta['id'];
                    $result = ['success' => true, 'msg' => 'Venta realizada exitosamente por PDF.', 'id_documento' => $id_documento, 'id_bill' => $id_bill];
                } else {

                    $result = ['success' => false, 'error' => 'Error al crear venta por PDF.'];
                }
            }
        }

        echo json_encode($result);
    }

    public function eliminarProductoVenta()
    {
        // Decodificación de la información JSON
        $datos = json_decode($_POST['datos'], true);

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === '' ||
            empty($datos['id_detalle']) || trim($datos['id_detalle']) === ''
        ) {

            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'Todos los datos son obligatorios.'];
        } else {
            // Sanitización de datos
            $id_client = trim(filter_var($datos['id_client'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            $id_detalle = trim(filter_var($datos['id_detalle'], FILTER_SANITIZE_NUMBER_INT));
            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el registro, si existe, mostrar mensaje de que existe
            $eliminar_producto_venta = $this->bill_model->eliminar_producto_venta($id_client, $id_user, $id_detalle);



            // Manejo de la respuesta
            if ($eliminar_producto_venta->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Producto eliminado exitosamente de la venta.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al eliminar el Producto de la venta.'];
            }
        }




        echo json_encode($result);
    }

    public function vaciarFactura()
    {
        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_client']) || trim($datos['id_client']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {

            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se ha seleccionado un cliente.'];
        } else {
            // Sanitización de datos
            $id_client = trim(filter_var($datos['id_client'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el registro, si existe, mostrar mensaje de que existe
            $eliminar_producto_venta = $this->bill_model->vaciar_venta($id_client, $id_user);



            // Manejo de la respuesta
            if ($eliminar_producto_venta->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Factura vaciada con exito.'];
            } else {

                $result = ['success' => false, 'error' => 'La factura esta vacia.'];
            }
        }




        echo json_encode($result);
    }

    public function eliminarFactura()
    {
        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_factura']) || trim($datos['id_factura']) === '' ||
            empty($datos['id_user']) || trim($datos['id_user']) === ''
        ) {

            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {
            // Sanitización de datos
            $id_factura = trim(filter_var($datos['id_factura'], FILTER_SANITIZE_NUMBER_INT));
            $id_user = trim(filter_var($datos['id_user'], FILTER_SANITIZE_NUMBER_INT));
            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el registro, si existe, mostrar mensaje de que existe
            $eliminar_factura = $this->bill_model->eliminar_factura($id_factura, $id_user);



            // Manejo de la respuesta
            if ($eliminar_factura->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Factura eliminada exitosamente.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al eliminar la factura.'];
            }
        }


        // $("#tabla_facturas").on("click", ".eliminar-factura", function () {
        //   // Obtener el ID del registro seleccionado
        //   let id_factura = $(this).attr("id");
        //   const id_user = document.getElementById("id_user").value.trim();
        //   const datos = {
        //     id_factura: id_factura,
        //     id_user: id_user,
        //   };
        //   // Mostrar una alerta de confirmación antes de eliminar el registro
        //   Swal.fire({
        //     title: "¿Está seguro de que desea eliminar este registro?",
        //     html: "ID: " + id_factura + "<br>" + "No podrá revertir esta acción",
        //     icon: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#d33",
        //     cancelButtonColor: "#3085d6",
        //     confirmButtonText: "Sí, eliminar",
        //     cancelButtonText: "Cancelar",
        //   }).then((result) => {
        //     if (result.isConfirmed) {
        //       // Hacer una llamada AJAX para eliminar el registro seleccionado
        //       $.ajax({
        //         url: "../../controller/billController.php",
        //         dataType: "json",
        //         type: "POST",
        //         data: {
        //           datos: datos,
        //           function: "eliminarFactura",
        //         },
        //         success: function (response) {
        //           // Respuesta exitosa - manejar en caso de JSON

        //           if (response.success) {
        //             Swal.fire({
        //               title: "Eliminado",
        //               text: response.msg,
        //               icon: "success",
        //             }).then((result) => {
        //               if (result.isConfirmed) {
        //                 window.location.href = "facturas.php";
        //               }
        //             });
        //           } else {
        //             Swal.fire({
        //               title: "Atencion!",
        //               text: response.error,
        //               icon: "warning",
        //             });
        //           }
        //         },
        //         error: function (error) {
        //           // Mostrar una alerta de error si no se puede eliminar el registro
        //           console.log(error);
        //           Swal.fire({
        //             title: "Error",
        //             text: "Oops ha ocurrido un error interno.",
        //             icon: "error",
        //           });
        //         },
        //       });
        //     }
        //   });
        // });


        echo json_encode($result);
    }

    public function obtenerDataFactura()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_factura']) || trim($datos['id_factura']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id_factura = trim(htmlspecialchars($datos['id_factura']));

            //Datos del recibo por id
            $result = $this->bill_model->obtener_data_factura($id_factura);
        }
        echo json_encode($result);
    }

    public function anularFactura()
    {
        // Decodificación de la información JSON
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_factura']) || trim($datos['id_factura']) === '' ||
            empty($datos['motivo']) || trim($datos['motivo']) === ''
        ) {
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {
            // Sanitización de datos
            $id_factura = trim(filter_var($datos['id_factura'], FILTER_SANITIZE_NUMBER_INT));
            $motivo = trim(htmlspecialchars($datos['motivo']));
            //! Instanciación del modelo, ejecución del registro y validacion

            //Validar si existe el registro, si existe, mostrar mensaje de que existe
            $anular_factura = $this->bill_model->anular_factura($id_factura, $motivo);

            // Manejo de la respuesta
            if ($anular_factura->rowCount() > 0) {

                $result = ['success' => true, 'msg' => 'Factura anulada exitosamente.'];
            } else {

                $result = ['success' => false, 'error' => 'Error al anular la factura.'];
            }
        }
        echo json_encode($result);
    }

    public function pagarFactura()
    {
        $datos = $_POST['datos'];

        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_factura']) || trim($datos['id_factura']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {
            $id_factura = trim(htmlspecialchars($datos['id_factura']));
            $cantidadUSD = trim(htmlspecialchars($datos['cantidadUSD']));
            $cantidadBS = trim(htmlspecialchars($datos['cantidadBS']));
            if (isset($datos['metodo_vuelto'])) {
                $vueltoUSD = trim(htmlspecialchars($datos['vueltoUSD']));
                $vueltoBS = trim(htmlspecialchars($datos['vueltoBS']));
                $metodo_vuelto = trim(htmlspecialchars($datos['metodo_vuelto']));
                $vuelto_pagado = 0;
                // !!ENTREGAR
                if (empty($vueltoUSD) || $vueltoUSD == 'NaN') {
                    $vueltoUSD = 0;
                }

                if (empty($vueltoBS) || $vueltoBS == 'NaN') {
                    $vueltoBS = 0;
                }
                // !!FIN ENTREGAR
            }else {
                $vueltoUSD = 0;
                $vueltoBS = 0;
                $metodo_vuelto = '';
                $vuelto_pagado = 1;
            }


            // RECIBIENDO
            if (empty($cantidadBS) || $cantidadBS == 'NaN') {
                $cantidadBS = 0;
            }

            if (empty($cantidadUSD) || $cantidadUSD == 'NaN') {
                $cantidadUSD = 0;
            }

            $metodo_pago_bs = trim(htmlspecialchars($datos['metodo_pago_bs']));

            if ($metodo_pago_bs == 'Efectivo') {
                $metodo_pago_bs = 1;
            } else {
                $metodo_pago_bs = 4;
            }
            // FIN RECIBIR



            // Total real de la factura
            $data_factura = $this->bill_model->obtener_data_factura($id_factura);

            $tasa = $data_factura['clientData'][0]['tasa_bcv'];
            $tasa_dia = $data_factura['clientData'][0]['tasa_vuelto'];

            $total_pago_bs = 0;
            $total_pago = 0;
            $total_pago_bs_usd = 0;

            foreach ($data_factura['paymentsData'] as $key => $payment) {

                // Currency = 1 es Bolivar, Currency = 2 es Dolar
                if ($payment['currency'] == '1') {

                    $total_pago_bs += $payment['monto'];

                    if ($payment['comments'] != 'Abono') {
                        $payments[$key]['cambio'] = number_format($total_pago_bs / $tasa, 2, '.', '');
                        $total_pago_bs_usd += $payments[$key]['cambio'];
                    } else {
                        $payments[$key]['cambio'] = number_format($payment['monto'] / $tasa_dia, 2, '.', '');
                        $total_pago_bs_usd += $payments[$key]['cambio'];
                    }
                } else if ($payment['currency'] == '2') {

                    $total_pago += $payment['monto'];
                } else {

                    $total_pago_bs = 0;
                    $total_pago = 0;
                }
            }

            $total_pago_usd = $total_pago_bs_usd + $total_pago;
            $total_pago_bs = $total_pago_usd * $tasa_dia;

            $completado = $data_factura['clientData'][0]['total_bs'] - $total_pago_bs;
            $completado_usd = $data_factura['clientData'][0]['total'] - $total_pago_usd;
            
            $monto_bs_usd = $cantidadBS / $tasa_dia;
            $totalIngresadoUsd = $cantidadUSD + $monto_bs_usd;
            $pendiente_usd = $completado_usd - $totalIngresadoUsd;
            $pendiente_bs = $pendiente_usd * $tasa_dia;

            $completado = $this->formateadorNumerico($completado);
            $completado_usd = $this->formateadorNumerico($completado_usd);

            $pendiente_usd = $this->formateadorNumerico($pendiente_usd);
            $pendiente_bs = $this->formateadorNumerico($pendiente_bs);

            // LOGICA PARA CAMBIAR STATUS
            if ($pendiente_bs == '0' || $vuelto_pagado == '0') {

                // Si se pago completa la factura
                $pay = $this->bill_model->pagar_factura($id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs, $vueltoUSD, $vueltoBS, $metodo_vuelto);
                if ($pay->rowCount() > 0) {
                    $result = ['success' => true, 'msg' => 'Factura pagada en su totalidad', 'cashback' => false];
                } else {
                    $result = ['success' => false, 'msg' => 'Error al pagar factura'];
                }
            } else if ($pendiente_bs > 0) {

                // Falta pagar y es Abono
                $pay = $this->bill_model->abono_factura($id_factura, $cantidadUSD, $cantidadBS, $metodo_pago_bs);
                if ($pay->rowCount() > 0) {
                    $result = ['success' => false, 'msg' => 'Abono <strong>completado</strong>. Saldo restante: <strong>$' . $pendiente_usd . ' - Bs ' . $pendiente_bs . '</strong>', 'cashback' => false];
                } else if($pay->rowCount() == 0){
                    $result = ['success' => false, 'msg' => 'Campos vacios, por favor ingresar montos'];
                }else {
                    $result = ['success' => false, 'msg' => 'Error al abonar factura'];
                }
            } else if ($pendiente_bs < 0) {

                // Dar vuelto
                $result = ['success' => false, 'msg' => 'La factura será pagada en su totalidad. <br> Vuelto a entregar: ', 'cashback' => true, 'tasa_bcv' => $tasa_dia, 'vuelto_bs_total' => abs($pendiente_bs), 'vuelto_usd_total' => abs($pendiente_usd)];
            } else {
                $result = ['success' => false, 'error' => 'Error interno!, por favor avisar al administrador del sistema', 'cashback' => false];
            }
        }
        echo json_encode($result);
    }

    // Obtener Vueltos
    public function obtenerVueltosFactura()
    {
        // Se recibe informacion
        $datos = $_POST['datos'];

        // Validación de datos
        if (
            empty($datos) || !is_array($datos) ||
            empty($datos['id_factura']) || trim($datos['id_factura']) === ''
        ) {
            //echo json_encode($datos);
            $result = ['success' => false, 'error' => 'No se recibe ID, por favor intente nuevamente.'];
        } else {

            $id_factura = trim(htmlspecialchars($datos['id_factura']));

            //Datos del recibo por id
            $data_factura = $this->bill_model->obtener_data_factura($id_factura);
            $tasa = $data_factura['clientData'][0]['tasa_bcv'];
            $tasa_dia = $data_factura['clientData'][0]['tasa_vuelto'];

            $total_pago_bs = 0;
            $total_pago = 0;
            $total_pago_bs_usd = 0;

            foreach ($data_factura['paymentsData'] as $key => $payment) {

                // Currency = 1 es Bolivar, Currency = 2 es Dolar
                if ($payment['currency'] == '1') {

                    $total_pago_bs += $payment['monto'];

                    if ($payment['comments'] != 'Abono') {
                        $payments[$key]['cambio'] = number_format($total_pago_bs / $tasa, 2, '.', '');
                        $total_pago_bs_usd += $payments[$key]['cambio'];
                    } else {
                        $payments[$key]['cambio'] = number_format($payment['monto'] / $tasa_dia, 2, '.', '');
                        $total_pago_bs_usd += $payments[$key]['cambio'];
                    }
                } else if ($payment['currency'] == '2') {

                    $total_pago += $payment['monto'];
                } else {

                    $total_pago_bs = 0;
                    $total_pago = 0;
                }
            }

            $total_pago_usd = $total_pago_bs_usd + $total_pago;
            $total_pago_bs = $total_pago_usd * $tasa_dia;

            $completado_usd = $data_factura['clientData'][0]['total'] - $total_pago_usd;

            $pendiente_usd = $completado_usd;
            $pendiente_bs = $pendiente_usd * $tasa_dia;

            $pendiente_usd = $this->formateadorNumerico($pendiente_usd);
            $pendiente_bs = $this->formateadorNumerico($pendiente_bs);
            
            $result['tasa_vuelto'] = $tasa_dia;
            $result['pendiente'] = $pendiente_usd;
            $result['pendiente_bs'] = $pendiente_bs;
            
        }
        echo json_encode($result);
    }
}

new BillController();
