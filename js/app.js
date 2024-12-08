$(document).ready(function () {
  //!SPANISH
  const spanish = {
    processing: "Procesando...",
    lengthMenu: "Mostrar _MENU_ registros",
    zeroRecords: "No se encontraron resultados",
    emptyTable: "Ningún dato disponible en esta tabla",
    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    infoFiltered: "(filtrado de un total de _MAX_ registros)",
    search: "Buscar:",
    loadingRecords: "Cargando...",
    paginate: {
      first: "Primero",
      last: "Último",
      next: "Siguiente",
      previous: "Anterior",
    },
    aria: {
      sortAscending: ": Activar para ordenar la columna de manera ascendente",
      sortDescending: ": Activar para ordenar la columna de manera descendente",
    },
    buttons: {
      copy: "Copiar",
      colvis: "Visibilidad",
      collection: "Colección",
      colvisRestore: "Restaurar visibilidad",
      copyKeys:
        "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
      copySuccess: {
        1: "Copiada 1 fila al portapapeles",
        _: "Copiadas %ds fila al portapapeles",
      },
      copyTitle: "Copiar al portapapeles",
      csv: "CSV",
      excel: "Excel",
      pageLength: {
        "-1": "Mostrar todas las filas",
        _: "Mostrar %d filas",
      },
      pdf: "PDF",
      print: "Imprimir",
      renameState: "Cambiar nombre",
      updateState: "Actualizar",
      createState: "Crear Estado",
      removeAllStates: "Remover Estados",
      removeState: "Remover",
      savedStates: "Estados Guardados",
      stateRestore: "Estado %d",
    },
    autoFill: {
      cancel: "Cancelar",
      fill: "Rellene todas las celdas con <i>%d</i>",
      fillHorizontal: "Rellenar celdas horizontalmente",
      fillVertical: "Rellenar celdas verticalmente",
    },
    decimal: ",",
    searchBuilder: {
      add: "Añadir condición",
      button: {
        0: "Constructor de búsqueda",
        _: "Constructor de búsqueda (%d)",
      },
      clearAll: "Borrar todo",
      condition: "Condición",
      conditions: {
        date: {
          before: "Antes",
          between: "Entre",
          empty: "Vacío",
          equals: "Igual a",
          notBetween: "No entre",
          not: "Diferente de",
          after: "Después",
          notEmpty: "No Vacío",
        },
        number: {
          between: "Entre",
          equals: "Igual a",
          gt: "Mayor a",
          gte: "Mayor o igual a",
          lt: "Menor que",
          lte: "Menor o igual que",
          notBetween: "No entre",
          notEmpty: "No vacío",
          not: "Diferente de",
          empty: "Vacío",
        },
        string: {
          contains: "Contiene",
          empty: "Vacío",
          endsWith: "Termina en",
          equals: "Igual a",
          startsWith: "Empieza con",
          not: "Diferente de",
          notContains: "No Contiene",
          notStartsWith: "No empieza con",
          notEndsWith: "No termina con",
          notEmpty: "No Vacío",
        },
        array: {
          not: "Diferente de",
          equals: "Igual",
          empty: "Vacío",
          contains: "Contiene",
          notEmpty: "No Vacío",
          without: "Sin",
        },
      },
      data: "Data",
      deleteTitle: "Eliminar regla de filtrado",
      leftTitle: "Criterios anulados",
      logicAnd: "Y",
      logicOr: "O",
      rightTitle: "Criterios de sangría",
      title: {
        0: "Constructor de búsqueda",
        _: "Constructor de búsqueda (%d)",
      },
      value: "Valor",
    },
    searchPanes: {
      clearMessage: "Borrar todo",
      collapse: {
        0: "Paneles de búsqueda",
        _: "Paneles de búsqueda (%d)",
      },
      count: "{total}",
      countFiltered: "{shown} ({total})",
      emptyPanes: "Sin paneles de búsqueda",
      loadMessage: "Cargando paneles de búsqueda",
      title: "Filtros Activos - %d",
      showMessage: "Mostrar Todo",
      collapseMessage: "Colapsar Todo",
    },
    select: {
      cells: {
        1: "1 celda seleccionada",
        _: "%d celdas seleccionadas",
      },
      columns: {
        1: "1 columna seleccionada",
        _: "%d columnas seleccionadas",
      },
      rows: {
        1: "1 fila seleccionada",
        _: "%d filas seleccionadas",
      },
    },
    thousands: ".",
    datetime: {
      previous: "Anterior",
      hours: "Horas",
      minutes: "Minutos",
      seconds: "Segundos",
      unknown: "-",
      amPm: ["AM", "PM"],
      months: {
        0: "Enero",
        1: "Febrero",
        2: "Marzo",
        3: "Abril",
        4: "Mayo",
        5: "Junio",
        6: "Julio",
        7: "Agosto",
        8: "Septiembre",
        9: "Octubre",
        10: "Noviembre",
        11: "Diciembre",
      },
      weekdays: {
        0: "Dom",
        1: "Lun",
        2: "Mar",
        3: "Mié",
        4: "Jue",
        5: "Vie",
        6: "Sáb",
      },
      next: "Próximo",
    },
    editor: {
      close: "Cerrar",
      create: {
        button: "Nuevo",
        title: "Crear Nuevo Registro",
        submit: "Crear",
      },
      edit: {
        button: "Editar",
        title: "Editar Registro",
        submit: "Actualizar",
      },
      remove: {
        button: "Eliminar",
        title: "Eliminar Registro",
        submit: "Eliminar",
        confirm: {
          1: "¿Está seguro de que desea eliminar 1 fila?",
          _: "¿Está seguro de que desea eliminar %d filas?",
        },
      },
      error: {
        system:
          'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>',
      },
      multi: {
        title: "Múltiples Valores",
        restore: "Deshacer Cambios",
        noMulti:
          "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
        info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga clic o pulse aquí, de lo contrario conservarán sus valores individuales.",
      },
    },
    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
    stateRestore: {
      creationModal: {
        button: "Crear",
        name: "Nombre:",
        order: "Clasificación",
        paging: "Paginación",
        select: "Seleccionar",
        columns: {
          search: "Búsqueda de Columna",
          visible: "Visibilidad de Columna",
        },
        title: "Crear Nuevo Estado",
        toggleLabel: "Incluir:",
        scroller: "Posición de desplazamiento",
        search: "Búsqueda",
        searchBuilder: "Búsqueda avanzada",
      },
      removeJoiner: "y",
      removeSubmit: "Eliminar",
      renameButton: "Cambiar Nombre",
      duplicateError: "Ya existe un Estado con este nombre.",
      emptyStates: "No hay Estados guardados",
      removeTitle: "Remover Estado",
      renameTitle: "Cambiar Nombre Estado",
      emptyError: "El nombre no puede estar vacío.",
      removeConfirm: "¿Seguro que quiere eliminar %s?",
      removeError: "Error al eliminar el Estado",
      renameLabel: "Nuevo nombre para %s:",
    },
    infoThousands: ".",
  };

  //Inicio Sesion//
  if ($("#login").length) {
    $("#login").click(function (e) {
      e.preventDefault();

      let user = $('input[name="user"]').val();
      let password = $('input[name="password"]').val();
      // Validación de campos vacíosF
      if (user == "" || password == "") {
        Swal.fire({
          title: "Error",
          text: "Todos los campos son obligatorios.",
          icon: "error",
        });
        return;
      } else {
        $.ajax({
          type: "post",
          url: "controller/loginController.php",
          dataType: "json",
          data: {
            user: user,
            password: password,
          },
          success: function (response) {
            // Conversión a JSON si es necesario
            if (typeof response === "string") {
              response = JSON.parse(response);
            }
            if (response.success == true) {
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                willClose: () => {
                  window.location.href = "view/index/index.php";
                },
              });
              Toast.fire({
                icon: "success",
                title: "Inicio de Sesión Exitoso",
              });
            } else {
              Swal.fire({
                title: "Error",
                text: response.error,
                icon: "error",
                timer: 2000,
              });
            }
          },
          error: function (error) {
            console.log("Error en comunicación AJAX", error);
          },
        });
      }
    });
  }
  //FIN Inicio Sesion//

  //boton para limpiar los formularios de editar y agregar//
  if ($("#borrar").length) {
    const borrar = document.getElementById("borrar");
    const formulario = document.querySelector("form");
    borrar.addEventListener("click", (event) => {
      event.preventDefault(); // Evitamos que el botón envíe el formulario
      formulario.reset(); // Limpiamos el formulario
    });
  }

  // Funcion para obtener roles
  function obtenerRoles() {
    $.ajax({
      url: "../../controller/UserController.php",
      dataType: "json",
      type: "POST",
      data: {
        function: "obtenerRoles",
      },
      success: function (data) {
        // Recorrer los roles y agregarlos al Select
        //$("#select_roles").empty(); // Eliminar las opciones existentes
        $.each(data, function (i, item) {
          $("#select_roles").append(
            "<option value='" + item.id + "'>" + item.name + "</option>"
          );
        });
      },
      error: function (error) {
        console.error("Error al cargar roles:", error);
      },
    });
  }

  // Funcion para obtener status
  function obtenerStatus() {
    $.ajax({
      url: "../../controller/UserController.php",
      dataType: "json",
      type: "POST",
      data: {
        function: "obtenerStatus",
      },
      success: function (data) {
        // Recorrer los roles y agregarlos al Select
        $.each(data, function (i, item) {
          $("#select_status").append(
            "<option value='" + item.id + "'>" + item.name + "</option>"
          );
        });
      },
      error: function (error) {
        console.error("Error al cargar status:", error);
      },
    });
  }

  // Funcion para obtener types clientes
  function obtenerTypes() {
    $.ajax({
      url: "../../controller/clientController.php",
      dataType: "json",
      type: "POST",
      data: {
        function: "obtenerTypes",
      },
      success: function (data) {
        // Recorrer los roles y agregarlos al Select
        $.each(data, function (i, item) {
          $("#select_type").append(
            "<option value='" + item.id + "'>" + item.name + "</option>"
          );
        });
      },
      error: function (error) {
        console.error("Error al cargar status:", error);
      },
    });
  }

  //FUNCIONES DE BOTONES PARA DATATABLES

  //Funcion para retornar las funciones de los usuarios
  function accionesUsuarios(data) {
    return (
      "<a id=" +
      data.id +
      ' href="editar_usuario.php?id=' +
      data.id +
      '" class="editar-usuarios btn btn-warning me-2 btn_op"><i class="fa-solid fa-pen-to-square"></i></a><button id="' +
      data.id +
      '" class="eliminar-usuarios btn btn-danger btn_op" type="button"><i class="fa-solid fa-trash-can"></i></button>'
    );
  }

  //Funcion para retornar las funciones de los usuarios
  function accionesAdmin(data) {
    return (
      '<a id="' +
      data.id +
      '" href="editar_usuario.php?id=' +
      data.id +
      '" class="editar-usuarios btn btn-warning me-2 btn_op"><i class="fa-solid fa-pen-to-square"></i></a>'
    );
  }

  //Funcion para retornar las funciones de los clientes
  function accionesClientes(data) {
    return (
      "<a id=" +
      data.id +
      ' href="editar_cliente.php?id=' +
      data.id +
      '" class="editar-clientes btn btn-warning me-2 btn_op"><i class="fa-solid fa-pen-to-square"></i></a><button id="' +
      data.id +
      '" class="eliminar-clientes btn btn-danger btn_op" type="button"><i class="fa-solid fa-trash-can"></i></button>'
    );
  }

  //Funcion para retornar las funciones de los productos
  function accionesProductos(data) {
    return (
      "<a id=" +
      data.id +
      ' href="agregar_stock.php?id=' +
      data.id +
      '" class="agregar-stock btn btn-success me-2 btn_op"><i class="fa-solid fa-plus"></i></a>' +
      "<a id=" +
      data.id +
      ' href="editar_producto.php?id=' +
      data.id +
      '" class="editar-productos btn btn-warning me-2 btn_op"><i class="fa-solid fa-pen-to-square"></i></a><button id="' +
      data.id +
      '"class="eliminar-productos btn btn-danger btn_op" type="button"><i class="fa-solid fa-trash-can"></i></button>'
    );
  }

  function accionesProveedores(data) {
    return (
      "<a id=" +
      data.id +
      ' href="editar_proveedor.php?id=' +
      data.id +
      '" class="editar-proveedor btn btn-warning me-2 btn_op"><i class="fa-solid fa-pen-to-square"></i></a><button id="' +
      data.id +
      '" class="eliminar-proveedor btn btn-danger btn_op" type="button"><i class="fa-solid fa-trash-can"></i></button>'
    );
  }

  function accionesProductosVentas(data) {
    return (
      "<button class='eliminar_producto_venta d-block w-100 text-center btn' data-id=" +
      data.id +
      "><i class='fa-solid fs-5 fa-trash text-danger'></i></button>"
    );
  }

  //Funcion para retornar las funciones de las facturas
  function accionesFactura(data) {
    //CREAR FUNCION PARA PAGAR FACTURA

    if (data.id_status == 4) {
      return (
        "<button title='Ver PDF' class='ver-factura btn btn-primary me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-eye'></i></button><button title='Imprimir Ticket' class='imprimir-factura btn btn-info me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-ticket'></i></button><button title='Anular Factura' class='anular-factura btn btn-danger btn_op' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-ban'></i></button>"
      );
    } else if (data.id_status == 5) {
      return (
        "<button title='Ver PDF' class='ver-factura btn btn-primary me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-eye'></i></button><button title='Imprimir Ticket' class='imprimir-factura btn btn-info me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-ticket'></i></button><button title='Pagar Factura' class='pagar-factura btn btn-success btn_op' id=" +
        data.id +
        "><i class='fa-solid fa-money-bill-wave'></i></button>"
      );
    } else {
      return (
        "<button title='Ver PDF' class='ver-factura btn btn-primary me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-eye'></i></button><button title='Imprimir Ticket' class='imprimir-factura btn btn-info me-2' id=" +
        data.id +
        "><i class='fa-solid fs-5 fa-ticket'></i></button>"
      );
    }
  }

  //Funcion para retornar las funciones de la nomina
  function accionesNomina(data) {
    return (
      '<button type="button" class="btn btn-secondary ver-detalles-nomina" data-bs-toggle="modal" id=' +
      data.id +
      ' data-bs-target="#staticBackdrop"><i class="fa-solid fa-list-ul"></i></button>'
    );
  }

  function enviarDataPDF(id_factura) {
    const datos = {
      id_factura: id_factura,
    };

    // Hacer una llamada AJAX para ver el registro seleccionado
    $.ajax({
      url: "../../controller/billController.php",
      dataType: "json",
      type: "POST",
      data: {
        datos: datos,
        function: "obtenerDataFactura",
      },
      success: function (response) {
        let clientData = [];
        let productsData = [];
        let paymentsData = [];
        let configData = [];
        let cashbackData = [];
        clientData["client"] = response.clientData;
        productsData["products"] = response.productsData;
        paymentsData["payments"] = response.paymentsData;
        configData["config"] = response.configData;
        cashbackData["cashback"] = response.cashbackData;

        generarPDF(
          clientData,
          productsData,
          paymentsData,
          configData,
          cashbackData
        );
      },
      error: function (error) {
        // Mostrar una alerta de error si no se puede eliminar el registro
        console.log(error.responseText);
        Swal.fire({
          title: "Error",
          text: "Oops ha ocurrido un error interno.",
          icon: "error",
        });
      },
    });
  }

  function generarPDF(client, products, payments, config, cashback) {
    const datos = {
      client: JSON.stringify(client.client),
      products: JSON.stringify(products.products),
      payments: JSON.stringify(payments.payments),
      config: JSON.stringify(config.config),
      cashback: JSON.stringify(cashback.cashback),
    };
    // Hacer una llamada AJAX para eliminar el registro seleccionado
    $.ajax({
      url: "../../assets/templates/verFactura.php",
      dataType: "json",
      type: "POST",
      data: {
        datos: datos,
      },
      success: function (response) {
        // Respuesta exitosa - manejar en caso de JSON
        if (response.success) {
          let ancho = 1000;
          var alto = 800;
          //Calculo posicion x,y para centrar la ventana
          let x = parseInt(window.screen.width / 2 - ancho / 2);
          let y = parseInt(window.screen.height / 2 - alto / 2);

          url = "../../pdf/Recibo_" + response.id + ".pdf";
          window.open(
            url,
            "Recibo_" + response.id,
            "left=" +
              x +
              ",top=" +
              y +
              ",height=" +
              alto +
              ",width=" +
              ancho +
              ",scrollbar=si,location=no,resizable=si,menubar=no"
          );

          Swal.fire({
            title: "Exito",
            text: response.msg,
            icon: "success",
          }).then((result) => {
            location.reload();
          });
        } else {
          Swal.fire({
            title: "Atencion!",
            text: response.error,
            icon: "warning",
          });
        }
      },
      error: function (error) {
        console.log(error);
        // Mostrar una alerta de error si no se puede eliminar el registro
        //console.log(error);
        Swal.fire({
          title: "Error",
          text: "Oops ha ocurrido un error interno.",
          icon: "error",
        });
      },
    });
  }

  function enviarDataTicket(id_factura) {
    const datos = {
      id_factura: id_factura,
    };

    // Hacer una llamada AJAX para ver el registro seleccionado
    $.ajax({
      url: "../../controller/billController.php",
      dataType: "json",
      type: "POST",
      data: {
        datos: datos,
        function: "obtenerDataFactura",
      },
      success: function (response) {
        let clientData = [];
        let productsData = [];
        let paymentsData = [];
        let configData = [];
        let cashbackData = [];

        clientData["client"] = response.clientData;
        productsData["products"] = response.productsData;
        paymentsData["payments"] = response.paymentsData;
        configData["config"] = response.configData;
        cashbackData["cashback"] = response.cashbackData;

        generarTicket(
          clientData,
          productsData,
          paymentsData,
          configData,
          cashbackData
        );
      },
      error: function (error) {
        // Mostrar una alerta de error si no se puede eliminar el registro
        console.log(error.responseText);
        Swal.fire({
          title: "Error",
          text: "Oops ha ocurrido un error interno.",
          icon: "error",
        });
      },
    });
  }

  function generarTicket(client, products, payments, config) {
    const datos = {
      client: JSON.stringify(client.client),
      products: JSON.stringify(products.products),
      payments: JSON.stringify(payments.payments),
      config: JSON.stringify(config.config),
    };
    // Hacer una llamada AJAX para eliminar el registro seleccionado
    $.ajax({
      url: "../../assets/templates/ticket.php",
      dataType: "json",
      type: "POST",
      data: {
        datos: datos,
      },
      success: function (response) {
        console.log(response);
        // Respuesta exitosa - manejar en caso de JSON
        if (response.success) {
          Swal.fire({
            title: "Exito",
            text: response.msg,
            icon: "success",
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          });
        } else {
          Swal.fire({
            title: "Atencion!",
            text: response.error,
            icon: "warning",
          });
        }
      },
      error: function (error) {
        // Mostrar una alerta de error si no se puede eliminar el registro
        console.log(error);
        Swal.fire({
          title: "Error",
          text: "Oops ha ocurrido un error interno.",
          icon: "error",
        });
      },
    });
  }

  //FIN FUNCIONES DE BOTONES PARA DATATABLES

  //! DASHBOARD
  if ($("#dashboard").length) {
    obtener_dashboard();

    function obtener_dashboard() {
      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/configController.php",
        type: "POST",
        dataType: "json",
        data: {
          function: "obtenerDashboard",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#count_users").text(response.userss);
          $("#count_clients").text(response.clientss);
          $("#count_products").text(response.productss);
          $("#count_sells").text(response.sells);
          $("#count_daysells").text(response.daysells);
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //! FIN DASHBOARD

  //! TASA
  if ($("#tasa").length) {
    obtener_tasa();

    function obtener_tasa() {
      // Hacer una llamada AJAX para obtener los datos del registro seleccionado

      $.ajax({
        url: "../../controller/configController.php",
        type: "POST",
        dataType: "json",
        data: {
          function: "obtenerTasa",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#tasa_bcv").val(response.tasa_bcv);
          $("#tasa_paralelo").val(response.tasa_paralelo);

          $("#id_dolar").text("BCV: " + response.tasa_bcv);
          $("#id_dolar2").text("Paralelo: " + response.tasa_paralelo);
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //! FIN TASA
  //! USUARIOS
  //DATATABLE USUARIOS
  if ($("#tabla_usuario").length) {
    $("#tabla_usuario").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/UserController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerUsuarios",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "user",
        },
        {
          data: "name",
        },
        {
          data: "email",
        },
        {
          data: "rol",
        },
        {
          data: "status",
        },
        {
          data: null,
          render: function (data) {
            if (data.id != 1) {
              return accionesUsuarios(data);
            } else {
              return accionesAdmin(data);
            }
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 1) {
          $("td:eq(5)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 2) {
          $("td:eq(5)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(6)", row).html(
            '<span class="badge text-bg-warning text-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  // FIN DATATABLE USUARIOS
  //FORMULARIO REGISTRAR USUARIO//
  if ($("#registrar_usuario").length) {
    obtenerRoles();
    $("#registrar_usuario").click(function (e) {
      e.preventDefault();
      // Obtención de los valores del formulario
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const user = document.getElementById("user").value.trim();
      const pass = document.getElementById("pass").value.trim();
      const salary = document.getElementById("salary").value.trim();
      const department = document.getElementById("department").value.trim();
      const id_rol = document.getElementById("select_roles").value.trim();

      // // Validación básica (campos vacíos)
      // if (
      //   name === "" ||
      //   email === "" ||
      //   user === "" ||
      //   pass === "" ||
      //   id_rol === ""
      // ) {
      //   Swal.fire({
      //     title: "Error",
      //     text: "Todos los campos son obligatorios.",
      //     icon: "error",
      //   });
      //   return;
      // }

      // ¡Lógica AJAX aquí
      const datos = {
        name: name,
        email: email,
        user: user,
        pass: pass,
        id_rol: id_rol,
        salary: salary,
        department: department,
      };

      registrarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)
      //registrarUser(datos);

      function registrarUser(datos) {
        $.ajax({
          url: "../../controller/userController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "registrarUsuario",
            datos: datos,
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              Swal.fire({
                title: "Exito",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "usuarios.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  }
  //FIN FORMULARIO REGISTRAR USUARIO//

  //FORMULARIO EDITAR USUARIO//
  if ($("#editar_usuario").length) {
    // Obtenemos la cadena de consulta
    const search = location.search;

    // Obtenemos el parámetro `id`
    const idusuario = new URLSearchParams(search).get("id");

    obtener_usuario_id(idusuario);

    function obtener_usuario_id(idusuario) {
      //crear funcion para el tipo de usuario
      obtenerStatus();
      obtenerRoles();
      const datos = {
        idusuario: idusuario,
      };

      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/userController.php",
        type: "POST",
        dataType: "json",
        data: {
          datos: datos,
          function: "obtenerUsuarioById",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#id").val(response.id);
          $("#name").val(response.name);
          $("#email").val(response.email);
          $("#user").val(response.user);
          $("#salary").val(response.salary);
          $("#department").val(response.department);
          $("#select_roles").val(response.id_rol);
          $("#select_status").val(response.id_status);

          //editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          $("#editar_usuario").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const id = document.getElementById("id").value.trim();
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const user = document.getElementById("user").value.trim();
            const pass = document.getElementById("pass").value.trim();
            const salary = document.getElementById("salary").value.trim();
            const department = document
              .getElementById("department")
              .value.trim();
            const id_rol = document.getElementById("select_roles").value.trim();
            const id_status = document
              .getElementById("select_status")
              .value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              id: id,
              name: name,
              email: email,
              user: user,
              pass: pass,
              id_rol: id_rol,
              id_status: id_status,
              salary: salary,
              department: department,
            };

            editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });
          // Llamar a la funcion ajax (definir a continuación)
          //registrarUser(datos);

          function editarUser(datos) {
            $.ajax({
              url: "../../controller/userController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarUsuario",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "usuarios.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //FIN FORMULARIO EDITAR USUARIO//

  // Controlador de eventos click para el botón de eliminar en DataTable
  $("#tabla_usuario").on("click", ".eliminar-usuarios", function () {
    // Obtener el ID del registro seleccionado
    let id_usuario = $(this).attr("id");

    const datos = {
      id_usuario: id_usuario,
    };
    // Mostrar una alerta de confirmación antes de eliminar el registro
    Swal.fire({
      title: "¿Está seguro de que desea eliminar este registro?",
      html: "ID: " + id_usuario + "<br>" + "No podrá revertir esta acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Hacer una llamada AJAX para eliminar el registro seleccionado
        $.ajax({
          url: "../../controller/userController.php",
          dataType: "json",
          type: "POST",
          data: {
            datos: datos,
            function: "eliminarUsuario",
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON

            if (response.success) {
              Swal.fire({
                title: "Eliminado",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "usuarios.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            // Mostrar una alerta de error si no se puede eliminar el registro
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  });
  //! FIN USUARIOS

  //! CLIENTES
  //DATATABLE CLIENTES
  if ($("#tabla_cliente").length) {
    $("#tabla_cliente").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/clientController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerClientes",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "ced",
        },
        {
          data: "name",
        },
        {
          data: "phone",
        },
        {
          data: "address",
        },
        {
          data: "email",
        },
        {
          data: "type",
        },
        {
          data: "status",
        },

        {
          data: null,
          render: function (data) {
            return accionesClientes(data);
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 1) {
          $("td:eq(7)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 2) {
          $("td:eq(7)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(6)", row).html(
            '<span class="badge text-bg-warning text-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  // FIN DATATABLE CLIENTES
  //FORMULARIO REGISTRAR CLIENTE//
  if ($("#registrar_cliente").length) {
    obtenerTypes();
    $("#registrar_cliente").click(function (e) {
      e.preventDefault();
      // Obtención de los valores del formulario
      const ced = document.getElementById("ced").value.trim();
      const name = document.getElementById("name").value.trim();
      const phone = document.getElementById("phone").value.trim();
      const email = document.getElementById("email").value.trim();
      const address = document.getElementById("address").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const id_type = document.getElementById("select_type").value.trim();

      // ¡Lógica AJAX aquí
      const datos = {
        ced: ced,
        name: name,
        phone: phone,
        email: email,
        address: address,
        id_user: id_user,
        id_type: id_type,
      };

      registrarClient(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)
      //registrarUser(datos);

      function registrarClient(datos) {
        $.ajax({
          url: "../../controller/clientController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "registrarCliente",
            datos: datos,
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              Swal.fire({
                title: "Exito",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "clientes.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  }
  //FIN FORMULARIO REGISTRAR CLIENTE//
  //Controlador de eventos click para el botón de editar en DataTable

  //FORMULARIO EDITAR CLIENTE//
  if ($("#editar_cliente").length) {
    // Obtenemos la cadena de consulta
    const search = location.search;

    // Obtenemos el parámetro `id`
    const idcliente = new URLSearchParams(search).get("id");

    obtener_cliente_id(idcliente);

    function obtener_cliente_id(idcliente) {
      //crear funcion para el tipo de cliente
      obtenerStatus();
      obtenerTypes();
      const id_user = document.getElementById("id_user").value.trim();
      const datos = {
        idcliente: idcliente,
        id_user: id_user,
      };

      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/clientController.php",
        type: "POST",
        dataType: "json",
        data: {
          datos: datos,
          function: "obtenerClienteById",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#id").val(response.id);
          $("#ced").val(response.ced);
          $("#name").val(response.name);
          $("#phone").val(response.phone);
          $("#email").val(response.email);
          $("#address").val(response.address);
          $("#select_type").val(response.id_type);
          $("#select_status").val(response.id_status);

          //editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          $("#editar_cliente").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const id = document.getElementById("id").value.trim();
            const ced = document.getElementById("ced").value.trim();
            const name = document.getElementById("name").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const email = document.getElementById("email").value.trim();
            const address = document.getElementById("address").value.trim();
            const id_type = document.getElementById("select_type").value.trim();
            const id_status = document
              .getElementById("select_status")
              .value.trim();
            const id_user = document.getElementById("id_user").value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              id: id,
              ced: ced,
              name: name,
              phone: phone,
              email: email,
              address: address,
              id_type: id_type,
              id_status: id_status,
              id_user: id_user,
            };

            editarCliente(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });
          // Llamar a la funcion ajax (definir a continuación)

          function editarCliente(datos) {
            $.ajax({
              url: "../../controller/clientController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarCliente",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "clientes.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //FIN FORMULARIO EDITAR CLIENTE//

  // Controlador de eventos click para el botón de eliminar en DataTable
  $("#tabla_cliente").on("click", ".eliminar-clientes", function () {
    // Obtener el ID del registro seleccionado
    let id_cliente = $(this).attr("id");

    const datos = {
      id_cliente: id_cliente,
    };
    // Mostrar una alerta de confirmación antes de eliminar el registro
    Swal.fire({
      title: "¿Está seguro de que desea eliminar este registro?",
      html: "ID: " + id_cliente + "<br>" + "No podrá revertir esta acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Hacer una llamada AJAX para eliminar el registro seleccionado
        $.ajax({
          url: "../../controller/ClientController.php",
          dataType: "json",
          type: "POST",
          data: {
            datos: datos,
            function: "eliminarCliente",
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON

            if (response.success) {
              Swal.fire({
                title: "Eliminado",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "clientes.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            // Mostrar una alerta de error si no se puede eliminar el registro
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  });

  //! FIN CLIENTES

  //! PRODUCTOS
  //DATATABLE PRODUCTOS
  if ($("#tabla_producto").length) {
    $("#tabla_producto").DataTable({
      pageLength: 10,
      autoWidth: false,
      ajax: {
        url: "../../controller/productController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerProductos",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "name",
        },
        {
          data: "model",
        },
        {
          data: "cost",
        },
        {
          data: "price",
        },
        {
          data: "second_price",
        },
        {
          data: "stock",
        },
        {
          data: "stock_warranty",
        },
        {
          data: "status",
        },
        {
          data: null,
          render: function (data) {
            return accionesProductos(data);
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 1) {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 2) {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-warning text-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  if ($("#tabla_productos_agotados").length) {
    $("#tabla_productos_agotados").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/productController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerProductos",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "name",
        },
        {
          data: "model",
        },
        {
          data: "cost",
        },
        {
          data: "price",
        },
        {
          data: "second_price",
        },
        {
          data: "stock",
        },
        {
          data: "stock_warranty",
        },
        {
          data: "status",
        },
        {
          data: null,
          render: function (data) {
            return accionesProductos(data);
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 1) {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 2) {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(8)", row).html(
            '<span class="badge text-bg-warning text-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  // FIN DATATABLE PRODUCTOS
  //FORMULARIO REGISTRAR PRODUCTOS//
  if ($("#registrar_producto").length) {
    obtenerStatus();
    $("#registrar_producto").click(function (e) {
      e.preventDefault();
      // Obtención de los valores del formulario
      const name = document.getElementById("name").value.trim();
      const model = document.getElementById("model").value.trim();
      const cost = document.getElementById("cost").value.trim();
      const price = document.getElementById("price").value.trim();
      const second_price = document.getElementById("second_price").value.trim();
      const stock = document.getElementById("stock").value.trim();
      const stock_warranty = document
        .getElementById("stock_warranty")
        .value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const id_status = document.getElementById("select_status").value.trim();

      // ¡Lógica AJAX aquí
      const datos = {
        name: name,
        model: model,
        cost: cost,
        price: price,
        second_price: second_price,
        stock: stock,
        stock_warranty: stock_warranty,
        id_user: id_user,
        id_status: id_status,
      };

      registrarProducto(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)
      //registrarUser(datos);

      function registrarProducto(datos) {
        $.ajax({
          url: "../../controller/productController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "registrarProducto",
            datos: datos,
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              Swal.fire({
                title: "Exito",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "productos.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  }
  //FIN FORMULARIO REGISTRAR PRODUCTO//
  //Controlador de eventos click para el botón de editar en DataTable

  //FORMULARIO EDITAR PRODUCTO//
  if ($("#editar_producto").length) {
    // Obtenemos la cadena de consulta
    const search = location.search;

    // Obtenemos el parámetro `id`
    const idproducto = new URLSearchParams(search).get("id");

    obtener_producto_id(idproducto);

    function obtener_producto_id(idproducto) {
      obtenerStatus();
      const id_user = document.getElementById("id_user").value.trim();
      const datos = {
        idproducto: idproducto,
        id_user: id_user,
      };

      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/productController.php",
        type: "POST",
        dataType: "json",
        data: {
          datos: datos,
          function: "obtenerProductoById",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#id").val(response.id);
          $("#name").val(response.name);
          $("#model").val(response.model);
          $("#cost").val(response.cost);
          $("#price").val(response.price);
          $("#second_price").val(response.second_price);
          $("#stock").val(response.stock);
          $("#stock_warranty").val(response.stock_warranty);
          $("#select_status").val(response.id_status);

          //editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          $("#editar_producto").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const id = document.getElementById("id").value.trim();
            const name = document.getElementById("name").value.trim();
            const model = document.getElementById("model").value.trim();
            const cost = document.getElementById("cost").value.trim();
            const price = document.getElementById("price").value.trim();
            const second_price = document
              .getElementById("second_price")
              .value.trim();
            const stock = document.getElementById("stock").value.trim();
            const stock_warranty = document
              .getElementById("stock_warranty")
              .value.trim();
            const id_status = document
              .getElementById("select_status")
              .value.trim();
            const id_user = document.getElementById("id_user").value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              id: id,
              name: name,
              model: model,
              cost: cost,
              price: price,
              second_price: second_price,
              stock: stock,
              stock_warranty: stock_warranty,
              id_status: id_status,
              id_user: id_user,
            };
            editarProducto(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });

          function editarProducto(datos) {
            $.ajax({
              url: "../../controller/productController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarProducto",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "productos.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //FIN FORMULARIO EDITAR PRODUCTO//

  // Controlador de eventos click para el botón de eliminar en DataTable
  $("#tabla_producto").on("click", ".eliminar-productos", function () {
    // Obtener el ID del registro seleccionado
    let id_producto = $(this).attr("id");

    const datos = {
      id_producto: id_producto,
    };
    // Mostrar una alerta de confirmación antes de eliminar el registro
    Swal.fire({
      title: "¿Está seguro de que desea eliminar este registro?",
      html: "ID: " + id_producto + "<br>" + "No podrá revertir esta acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Hacer una llamada AJAX para eliminar el registro seleccionado
        $.ajax({
          url: "../../controller/productController.php",
          dataType: "json",
          type: "POST",
          data: {
            datos: datos,
            function: "eliminarProducto",
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON

            if (response.success) {
              Swal.fire({
                title: "Eliminado",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "productos.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            // Mostrar una alerta de error si no se puede eliminar el registro
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  });

  //FORMULARIO AGREGAR STOCK PRODUCTO//
  if ($("#agregar_stock").length) {
    // Obtenemos la cadena de consulta
    const search = location.search;

    // Obtenemos el parámetro `id`
    const idproducto = new URLSearchParams(search).get("id");

    obtener_producto_id(idproducto);

    function obtener_producto_id(idproducto) {
      const id_user = document.getElementById("id_user").value.trim();
      const datos = {
        idproducto: idproducto,
        id_user: id_user,
      };

      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/productController.php",
        type: "POST",
        dataType: "json",
        data: {
          datos: datos,
          function: "obtenerProductoById",
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#id").val(response.id);
          $("#id_product").text(response.id);
          $("#name").val(response.name);
          $("#model").val(response.model);
          $("#cost").val(response.cost);
          $("#price").val(response.price);
          $("#second_price").val(response.second_price);
          $("#stock").val(response.stock);

          //editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          $("#agregar_stock").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const id = document.getElementById("id").value.trim();
            const new_cost = document.getElementById("new_cost").value.trim();
            const new_price = document.getElementById("new_price").value.trim();
            const new_second_price = document
              .getElementById("new_second_price")
              .value.trim();
            const new_stock = document.getElementById("new_stock").value.trim();
            const id_user = document.getElementById("id_user").value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              id: id,
              new_cost: new_cost,
              new_price: new_price,
              new_second_price: new_second_price,
              new_stock: new_stock,
              id_user: id_user,
            };
            agregarStock(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }

    function agregarStock(datos) {
      $.ajax({
        url: "../../controller/productController.php", // ruta del archivo PHP
        type: "POST",
        dataType: "json", //tipo de dato que se recibe
        data: {
          function: "agregarStock",
          datos: datos,
        },
        success: function (response) {
          // Respuesta exitosa - manejar en caso de JSON
          if (response.success) {
            Swal.fire({
              title: "Exito",
              text: response.msg,
              icon: "success",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "productos.php";
              }
            });
          } else {
            Swal.fire({
              title: "Atencion!",
              text: response.error,
              icon: "warning",
            });
          }
        },
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Error",
            text: "Oops ha ocurrido un error interno.",
            icon: "error",
          });
        },
      });
    }
  }
  //FIN FORMULARIO EDITAR PRODUCTO//

  //! FIN PRODUCTOS

  //! PROVEEDORES
  //DATATABLE PROVEEDORES
  if ($("#tabla_proveedores").length) {
    $("#tabla_proveedores").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/supplierController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerProveedores",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "name",
        },
        {
          data: "rif",
        },
        {
          data: "phone",
        },
        {
          data: "email",
        },
        {
          data: "address",
        },
        {
          data: "status",
        },
        {
          data: null,
          render: function (data) {
            return accionesProveedores(data);
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 1) {
          $("td:eq(6)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 3) {
          $("td:eq(6)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(6)", row).html(
            '<span class="badge text-bg-warning black-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  // FIN DATATABLE PROVEEDORES
  //FORMULARIO REGISTRAR PROVEEDOR//
  if ($("#registrar_proveedor").length) {
    obtenerStatus();
    $("#registrar_proveedor").click(function (e) {
      e.preventDefault();
      // Obtención de los valores del formulario
      const rif = document.getElementById("rif").value.trim();
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const phone = document.getElementById("phone").value.trim();
      const address = document.getElementById("address").value.trim();
      const status = document.getElementById("select_status").value.trim();
      const id_user = document.getElementById("id_user").value.trim();

      // ¡Lógica AJAX aquí
      const datos = {
        rif: rif,
        name: name,
        email: email,
        phone: phone,
        address: address,
        status: status,
        id_user: id_user,
      };

      registrarProveedor(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)

      function registrarProveedor(datos) {
        $.ajax({
          url: "../../controller/supplierController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "registrarProveedor",
            datos: datos,
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              Swal.fire({
                title: "Exito",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "proveedores.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  }
  //FIN FORMULARIO REGISTRAR PROVEEDOR//

  //FORMULARIO EDITAR PROVEEDOR//
  if ($("#editar_proveedor").length) {
    // Obtenemos la cadena de consulta
    const search = location.search;

    // Obtenemos el parámetro `id`
    const id_proveedor = new URLSearchParams(search).get("id");

    obtener_proveedor_by_id(id_proveedor);

    function obtener_proveedor_by_id(id_proveedor) {
      //crear funcion para el tipo de usuario
      obtenerStatus();
      const datos = {
        id_proveedor: id_proveedor,
      };

      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/supplierController.php",
        type: "POST",
        dataType: "json",
        data: {
          datos: datos,
          function: "obtenerProveedorById",
        },
        success: function (response) {
          console.log(response);
          //Asignar los valores del formulario
          $("#id").val(response.id);
          $("#rif").val(response.rif);
          $("#name").val(response.name);
          $("#email").val(response.email);
          $("#phone").val(response.phone);
          $("#address").val(response.address);
          $("#select_status").val(response.id_status);

          //editarUser(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          $("#editar_proveedor").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const id = document.getElementById("id").value.trim();
            const rif = document.getElementById("rif").value.trim();
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const address = document.getElementById("address").value.trim();
            const status = document
              .getElementById("select_status")
              .value.trim();
            const id_user = document.getElementById("id_user").value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              id: id,
              rif: rif,
              name: name,
              email: email,
              phone: phone,
              address: address,
              status: status,
              id_user: id_user,
            };

            editarProveedor(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });
          // Llamar a la funcion ajax (definir a continuación)
          //registrarUser(datos);

          function editarProveedor(datos) {
            $.ajax({
              url: "../../controller/supplierController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarProveedor",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "proveedores.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //FIN FORMULARIO EDITAR PROVEEDOR//

  // Controlador de eventos click para el botón de eliminar en DataTable
  $("#tabla_proveedores").on("click", ".eliminar-proveedor", function () {
    // Obtener el ID del registro seleccionado
    let id_proveedor = $(this).attr("id");

    const datos = {
      id_proveedor: id_proveedor,
    };
    // Mostrar una alerta de confirmación antes de eliminar el registro
    Swal.fire({
      title: "¿Está seguro de que desea eliminar este registro?",
      html: "ID: " + id_proveedor + "<br>" + "No podrá revertir esta acción",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        // Hacer una llamada AJAX para eliminar el registro seleccionado
        $.ajax({
          url: "../../controller/supplierController.php",
          dataType: "json",
          type: "POST",
          data: {
            datos: datos,
            function: "eliminarProveedor",
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON

            if (response.success) {
              Swal.fire({
                title: "Eliminado",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "proveedores.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            // Mostrar una alerta de error si no se puede eliminar el registro
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  });
  //! FIN PROVEEDORES

  //! VENTAS

  //DATATABLE FACTURAS
  if ($("#tabla_facturas").length) {
    $("#tabla_facturas").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/billController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerFacturas",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "date_created",
        },
        {
          data: "client",
        },
        {
          data: "user",
        },
        {
          data: "status",
        },
        {
          data: "total",
        },
        {
          data: "total_bs",
        },
        {
          data: null,
          width: "10rem",
          render: function (data) {
            return accionesFactura(data);
          },
        },
      ],
      order: [[0, "desc"]],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 4) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 6) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-warning text-black">' +
              data.status +
              "</span>"
          );
        }
      },
      scrollCollapse: true,
      scrollY: "31rem",
    });

    // Controlador de eventos click para el botón de eliminar en DataTable

    // Controlador de eventos click para el botón de ver PDF en DataTable
    $("#tabla_facturas").on("click", ".ver-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");

      enviarDataPDF(id_factura);
    });

    // Controlador de eventos click para el botón de imprimir ticket en DataTable
    $("#tabla_facturas").on("click", ".imprimir-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");

      enviarDataTicket(id_factura);
    });

    $("#tabla_facturas").on("click", ".anular-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");
      anular_factura(id_factura);
    });

    // PAGAR FACTURA

    $("#tabla_facturas").on("click", ".pagar-factura", function () {
      let id_factura = $(this).attr("id");
      pagar_factura(id_factura);
    });
  }
  //FUNCIONES FACTURAS
  function anular_factura(id) {
    let id_factura = id;
    // Mostrar una alerta de confirmación antes de anular el registro
    Swal.fire({
      title: "¿Está seguro de que desea anular este registro?",
      html: "ID: " + id_factura + "<br>" + "No podrá revertir esta acción",
      text: "Ingresa el motivo detallado de la anulación:",
      input: "textarea",
      inputLabel: "Motivo:",
      inputPlaceholder: "Escribe aquí el motivo...",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, anular",
      cancelButtonText: "Cancelar",
      inputValidator: (value) => {
        if (!value) {
          return "Por favor, ingresa el motivo.";
        } else if (value.length < 10) {
          return "El motivo debe tener al menos 10 caracteres.";
        }
      },
    }).then((result) => {
      if (result.isConfirmed) {
        const motivo = result.value;
        console.log(motivo);
        const datos = {
          id_factura: id_factura,
          motivo: motivo,
        };
        // Hacer una llamada AJAX para eliminar el registro seleccionado
        $.ajax({
          url: "../../controller/billController.php",
          dataType: "json",
          type: "POST",
          data: {
            datos: datos,
            function: "anularFactura",
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON

            if (response.success) {
              Swal.fire({
                title: "Anulada",
                text: response.msg,
                icon: "success",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "facturas.php";
                }
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            // Mostrar una alerta de error si no se puede eliminar el registro
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });
  }

  function pagar_factura(id) {
    // Obtener el ID del registro seleccionado
    let id_factura = id;

    const datos = {
      id_factura: id_factura,
    };

    // !Realizar peticion para traer los datos de la factura, si ha pagado algo, cuanto falta por pagar y preparar para enviar metodos a pagar y si hay que dar vuelto
    $.ajax({
      url: "../../controller/billController.php",
      dataType: "json",
      type: "POST",
      data: {
        datos: datos,
        function: "obtenerVueltosFactura",
      },
      success: function (response) {
        document.body.addEventListener("keyup", (e) => {
          const tasa_actual = parseFloat(response.tasa_vuelto);

          //Dolares
          let vuelto_bs_total = parseFloat(
            e.target.parentElement.getAttribute("data-total_vuelto_bs")
          );
          let vuelto_usd_total = parseFloat(
            e.target.parentElement.getAttribute("data-total_vuelto_usd")
          );

          function calcularVuelto(montoBs, montoUsd) {
            const montoBsEnUsd = montoBs / tasa_actual;
            const totalIngresado = montoUsd + montoBsEnUsd;
            const vueltoUsd = vuelto_usd_total - totalIngresado;
            const vueltoBs = vueltoUsd * tasa_actual;

            return {
              vueltoBs,
              vueltoUsd,
            };
          }
          if (
            [...e.target.classList].includes("cambios") ||
            [...e.target.classList].includes("cambios2")
          ) {
            const montoBs = isNaN(
              parseFloat(document.getElementById("swal-input2").value)
            )
              ? 0
              : parseFloat(document.getElementById("swal-input2").value);
            const montoUsd = isNaN(
              parseFloat(document.getElementById("swal-input1").value)
            )
              ? 0
              : parseFloat(document.getElementById("swal-input1").value);

            const { vueltoBs, vueltoUsd } = calcularVuelto(montoBs, montoUsd);

            e.target.parentElement.querySelector("span .bs").innerHTML =
              parseFloat(vueltoBs.toFixed(2));
            e.target.parentElement.querySelector("span .usd").innerHTML =
              parseFloat(vueltoUsd.toFixed(2));
          }
        });

        // Respuesta exitosa - manejar en caso de JSON
        const selects = ["Efectivo", "Pago Movil", "Tarjeta"]
          .map(
            (tipo_pago) => `<option value="${tipo_pago}">${tipo_pago}</option>`
          )
          .join("");
        const bs = response.pendiente_bs;
        const usd = response.pendiente;

        const consultar_pago = () =>
          Swal.fire({
            title: "Pagar factura - ID: " + id_factura,
            html:
              '<div data-total_vuelto_bs="' +
              bs +
              '" data-total_vuelto_usd="' +
              usd +
              '"><span>USD: <strong class="usd">' +
              usd +
              "</strong> - " +
              'BS: <strong class="bs">' +
              bs +
              "</strong><br>" +
              "Ingrese montos a pagar</span><br>" +
              '<input id="swal-input1" class="swal2-input cambios usd" type="number" min="0" step="0.1" placeholder="Cantidad en USD"><hr>' +
              '<input id="swal-input2" class="swal2-input cambios2 bs" type="number" min="0" step="0.1" placeholder="Cantidad en BS"><select id="swal2-select" style="padding: 0 3.95rem" class="swal2-select swal2-input">' +
              selects +
              "</select></div>",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#61a146",
            cancelButtonColor: "#da2828",
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.isConfirmed) {
              const cantidadUSD = parseFloat(
                document.getElementById("swal-input1").value
              );
              const cantidadBS = parseFloat(
                document.getElementById("swal-input2").value
              );
              const metodo_pago_bs =
                document.getElementById("swal2-select").value;

              const datos = {
                id_factura: id_factura,
                cantidadUSD: cantidadUSD,
                cantidadBS: cantidadBS,
                metodo_pago_bs: metodo_pago_bs,
              };

              //if (pagado >= 0) {
              // Hacer una llamada AJAX para eliminar el registro seleccionado
              $.ajax({
                url: "../../controller/billController.php",
                dataType: "json",
                type: "POST",
                data: {
                  datos: datos,
                  function: "pagarFactura",
                },
                success: function (response) {
                  // Respuesta exitosa - manejar en caso de JSON
                  if (response.success) {
                    Swal.fire({
                      title: "Exito",
                      html: response.msg,
                      icon: "success",
                    }).then(() => {
                      window.location.href = "facturas.php";
                    });
                  } else {
                    // Manejar en caso de error
                    if (response.cashback) {
                      document.body.addEventListener("keyup", (e) => {
                        const tasa_actual = parseFloat(response.tasa_bcv);

                        //Dolares
                        let vuelto_bs_total = parseFloat(
                          response.vuelto_bs_total
                        );

                        function calcularVuelto(montoBs, montoUsd) {
                          const montoUsdEnBs = montoUsd * tasa_actual;
                          const totalIngresado = montoBs + montoUsdEnBs;
                          const vueltoBs = vuelto_bs_total - totalIngresado;
                          const vueltoUsd = vueltoBs / tasa_actual;

                          return {
                            vueltoBs,
                            vueltoUsd,
                          };
                        }
                        if (
                          [...e.target.classList].includes("cambios_usd") ||
                          [...e.target.classList].includes("cambios_bs")
                        ) {
                          const montoBs = isNaN(
                            parseFloat(
                              document.getElementById("swal-input-bs").value
                            )
                          )
                            ? 0
                            : parseFloat(
                                document.getElementById("swal-input-bs").value
                              );
                          const montoUsd = isNaN(
                            parseFloat(
                              document.getElementById("swal-input-usd").value
                            )
                          )
                            ? 0
                            : parseFloat(
                                document.getElementById("swal-input-usd").value
                              );

                          const { vueltoBs, vueltoUsd } = calcularVuelto(
                            montoBs,
                            montoUsd
                          );

                          e.target.parentElement.querySelector(
                            "span .bs_v"
                          ).innerHTML = parseFloat(vueltoBs.toFixed(2));
                          e.target.parentElement.querySelector(
                            "span .usd_v"
                          ).innerHTML = parseFloat(vueltoUsd.toFixed(2));
                        }
                      });
                      const selects_vuelto = ["Efectivo", "Pago Movil"]
                        .map(
                          (tipo_pago) =>
                            `<option value="${tipo_pago}">${tipo_pago}</option>`
                        )
                        .join("");
                      const consultar_vuelto = () =>
                        Swal.fire({
                          title: "Pagar factura - ID: " + id_factura,
                          html:
                            "<strong>¡Hay cambio!</strong><br>" +
                            response.msg +
                            '<div data-total_vuelto_bs="' +
                            response.vuelto_bs_total +
                            '" data-total_vuelto_usd="' +
                            response.vuelto_usd_total +
                            '"><span>USD: <strong class="usd_v">' +
                            response.vuelto_usd_total +
                            '</strong></span> - <span>BS: <strong class="bs_v">' +
                            response.vuelto_bs_total +
                            "</strong></span><br>" +
                            "¿Cuánto <strong>USD y BS</strong> de cambio deseas entregar?</span><br>" +
                            '<input id="swal-input-usd" class="swal2-input cambios_usd" type="number" min="0" step="1" placeholder="Cantidad en USD"><hr>' +
                            '<input id="swal-input-bs" class="swal2-input cambios_bs" type="number" min="0" step="0.1" placeholder="Cantidad en BS"><select id="swal2-select-bs" style="padding: 0 3.95rem" class="swal2-select swal2-input">' +
                            selects_vuelto +
                            "</select></div>",
                          icon: "info",
                          showCancelButton: true,
                          confirmButtonText: "Confirmar",
                          cancelButtonText: "Cancelar",
                        }).then((result) => {
                          if (result.isConfirmed) {
                            const vueltoUSD = parseFloat(
                              document.getElementById("swal-input-usd").value
                            );
                            const vueltoBS = parseFloat(
                              document.getElementById("swal-input-bs").value
                            );
                            const metodo_vuelto =
                              document.getElementById("swal2-select-bs").value;
                            const vuelto_pagado = parseFloat(
                              document.querySelector(
                                "[data-total_vuelto_bs] strong.bs_v"
                              ).innerText
                            );

                            //Tomar datos
                            if (vuelto_pagado == 0) {
                              const datos = {
                                id_factura: id_factura,
                                cantidadUSD: cantidadUSD,
                                cantidadBS: cantidadBS,
                                metodo_pago_bs: metodo_pago_bs,
                                vueltoUSD: vueltoUSD,
                                vueltoBS: vueltoBS,
                                metodo_vuelto: metodo_vuelto,
                              };

                              $.ajax({
                                url: "../../controller/billController.php",
                                dataType: "json",
                                type: "POST",
                                data: {
                                  datos: datos,
                                  function: "pagarFactura",
                                },
                                success: function (response) {
                                  // Respuesta exitosa - manejar en caso de JSON
                                  if (response.success) {
                                    Swal.fire({
                                      title: "Exito",
                                      html: response.msg,
                                      icon: "success",
                                    }).then(() => {
                                      window.location.href = "facturas.php";
                                    });
                                  } else {
                                    Swal.fire({
                                      title: "Atencion!",
                                      html: response.msg,
                                      icon: "warning",
                                    }).then(() => {
                                      window.location.href = "facturas.php";
                                    });
                                  }
                                },
                                error: function (error) {
                                  // Mostrar una alerta de error si no se puede pagar el registro
                                  console.log(error);
                                  Swal.fire({
                                    title: "Error",
                                    text: "Oops ha ocurrido un error interno.",
                                    icon: "error",
                                  });
                                },
                              });
                            } else {
                              Swal.fire({
                                title: "Atencion!",
                                text: "Vuelto a entregar incorrecto!",
                                icon: "error",
                              }).then(() => {
                                consultar_vuelto();
                              });
                            }
                          }
                        });
                      consultar_vuelto();
                    } else {
                      Swal.fire({
                        title: "Atencion!",
                        html: response.msg,
                        icon: "warning",
                      }).then(() => {
                        window.location.href = "facturas.php";
                      });
                    }
                  }
                },
                error: function (error) {
                  // Mostrar una alerta de error si no se puede pagar el registro
                  console.log(error);
                  Swal.fire({
                    title: "Error",
                    text: "Oops ha ocurrido un error interno.",
                    icon: "error",
                  });
                },
              });
            }
          });
        consultar_pago();
      },
      error: function (error) {
        // Mostrar una alerta de error si no se puede pagar el registro
        console.log(error);
        Swal.fire({
          title: "Error",
          text: "Oops ha ocurrido un error interno.",
          icon: "error",
        });
      },
    });
  }

  //DATATABLE FACTURAS
  if ($("#tabla_facturas_pendientes").length) {
    $("#tabla_facturas_pendientes").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/billController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerFacturasPendientes",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "date_created",
        },
        {
          data: "client",
        },
        {
          data: "user",
        },
        {
          data: "status",
        },
        {
          data: "total",
        },
        {
          data: "total_bs",
        },
        {
          data: null,
          width: "10rem",
          render: function (data) {
            return accionesFactura(data);
          },
        },
      ],
      order: [[0, "desc"]],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 4) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 6) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-warning text-black">' +
              data.status +
              "</span>"
          );
        }
      },
      scrollCollapse: true,
      scrollY: "31rem",
    });

    // VER PDF
    $("#tabla_facturas_pendientes").on("click", ".ver-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");
      enviarDataPDF(id_factura);
    });

    // IMPRIMIR TICKET
    $("#tabla_facturas_pendientes").on(
      "click",
      ".imprimir-factura",
      function () {
        // Obtener el ID del registro seleccionado
        let id_factura = $(this).attr("id");
        enviarDataTicket(id_factura);
      }
    );

    // PAGAR FACTURA
    $("#tabla_facturas_pendientes").on("click", ".pagar-factura", function () {
      let id_factura = $(this).attr("id");
      pagar_factura(id_factura);
    });
  }

  //DATATABLE FACTURAS
  if ($("#tabla_facturas_anuladas").length) {
    $("#tabla_facturas_anuladas").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/billController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerFacturasAnuladas",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "date_created",
        },
        {
          data: "client",
        },
        {
          data: "user",
        },
        {
          data: "status",
        },
        {
          data: "total",
        },
        {
          data: "total_bs",
        },
        {
          data: null,
          width: "10rem",
          render: function (data) {
            return accionesFactura(data);
          },
        },
      ],
      order: [[0, "desc"]],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 4) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 6) {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(4)", row).html(
            '<span class="badge text-bg-warning text-black">' +
              data.status +
              "</span>"
          );
        }
      },
      scrollCollapse: true,
      scrollY: "31rem",
    });

    // VER PDF
    $("#tabla_facturas_anuladas").on("click", ".ver-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");
      enviarDataPDF(id_factura);
    });

    // IMPRIMIR TICKET
    $("#tabla_facturas_anuladas").on("click", ".imprimir-factura", function () {
      // Obtener el ID del registro seleccionado
      let id_factura = $(this).attr("id");
      enviarDataTicket(id_factura);
    });
  }

  //DATATABLE FACTURAS
  if ($("#tabla_apartado").length) {
    $("#tabla_apartado").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/billController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerProductosApartados",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "user",
        },
        {
          data: "client",
        },
        {
          data: "product",
        },
        {
          data: "quantity",
        },
        {
          data: "total_price",
        },
        {
          data: "total_price_bs",
        },
        {
          data: "date_created",
        },
      ],
      order: [[0, "desc"]],
      // createdRow: function (row, data, dataIndex) {
      //   if (data.id_status == 4) {
      //     $("td:eq(4)", row).html(
      //       '<span class="badge text-bg-success text-white">' +
      //       data.status +
      //       "</span>"
      //     );
      //   } else if (data.id_status == 6) {
      //     $("td:eq(4)", row).html(
      //       '<span class="badge text-bg-danger text-white">' +
      //       data.status +
      //       "</span>"
      //     );
      //   } else {
      //     $("td:eq(4)", row).html(
      //       '<span class="badge text-bg-warning text-black">' +
      //       data.status +
      //       "</span>"
      //     );
      //   }
      // },
      scrollCollapse: true,
      scrollY: "31rem",
    });
  }

  // LOGICA NUEVA FACTURA
  if ($("#ventas").length) {
    document.body.addEventListener("keyup", (e) => {
      const tasa_actual = parseFloat(
        document.getElementById("tasa_protegida").value
      );

      //Dolares
      let vuelto_bs_total = parseFloat(
        e.target.parentElement.getAttribute("data-total_vuelto_bs")
      );

      function calcularVuelto(montoBs, montoUsd) {
        const montoUsdEnBs = montoUsd * tasa_actual;
        const totalIngresado = montoBs + montoUsdEnBs;
        const vueltoBs = vuelto_bs_total - totalIngresado;
        const vueltoUsd = vueltoBs / tasa_actual;

        return {
          vueltoBs,
          vueltoUsd,
        };
      }
      if (
        [...e.target.classList].includes("cambios") ||
        [...e.target.classList].includes("cambios2")
      ) {
        const montoBs = isNaN(
          parseFloat(document.getElementById("swal-input2").value)
        )
          ? 0
          : parseFloat(document.getElementById("swal-input2").value);
        const montoUsd = isNaN(
          parseFloat(document.getElementById("swal-input1").value)
        )
          ? 0
          : parseFloat(document.getElementById("swal-input1").value);

        const { vueltoBs, vueltoUsd } = calcularVuelto(montoBs, montoUsd);

        e.target.parentElement.querySelector("span .bs").innerHTML = parseFloat(
          vueltoBs.toFixed(2)
        );
        e.target.parentElement.querySelector("span .usd").innerHTML =
          parseFloat(vueltoUsd.toFixed(2));
      }
    });
    $("#agregar_producto").slideUp();
    $("#procesar_venta").slideUp();
    $("#tabla_producto_venta").DataTable();
    //CLIENTE
    $(".select_client").select2({
      placeholder: "Ingrese la Cedula/RIF del cliente",
      allowClear: false,
    });

    $(".select_client").on("change", function () {
      // Función para generar o eliminar campos
      const id = document.getElementById("client").value;
      const id_user = document.getElementById("id_user").value;

      $("#client_dinamic").addClass("show-client"); // Add a class

      obtenerDatosCliente(id);

      updateTable(id, id_user);
      const product = document.getElementById("product");

      product.removeAttribute("disabled");
      $("#product").val(null).trigger("change");
      const quantity_product = document.getElementById("quantity_product");
      quantity_product.setAttribute("disabled", true);
      $("#stock").val("");
      $("#quantity_product").val("");
      $("#total_product").val("");
      $("#total_product_bs").val("");
      disabledMethod();
    });

    obtenerClientesSelect();

    function obtenerClientesSelect() {
      $.ajax({
        url: "../../controller/BillController.php",
        dataType: "json",
        type: "POST",
        data: {
          function: "obtenerClientes",
        },
        success: function (data) {
          // Recorrer los roles y agregarlos al Select
          $.each(data, function (i, item) {
            $("#client").append(
              "<option value='" +
                item.id +
                "'>" +
                item.ced +
                " - " +
                item.name +
                "</option>"
            );
          });
        },
        error: function (error) {
          console.error("Error al cargar status:", error);
        },
      });
    }

    function obtenerDatosCliente(id) {
      const datos = {
        id: id,
      };

      $.ajax({
        url: "../../controller/BillController.php",
        dataType: "json",
        type: "POST",
        data: {
          function: "obtenerDatosCliente",
          datos: datos,
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#ced").text(response.ced);
          $("#name").text(response.name);
          $("#address").text(response.address);
          $("#id_type").val(response.id_type);
          $("#type").text(response.type);
          $("#phone").text(response.phone);
          $("#email").text(response.email);
          // Recorrer los roles y agregarlos al Select
        },
        error: function (error) {
          console.error("Error al cargar status:", error);
        },
      });
    }

    //FIN CLIENTE

    //PRODUCTO
    $(".select_product").select2({
      placeholder: "Ingrese el código o nombre del producto",
      allowClear: true,
    });

    $(".select_product").on("change", function () {
      // Función para generar o eliminar campos
      const id = document.getElementById("product").value;
      const id_type = document.getElementById("id_type").value;
      const id_client = document.getElementById("client").value;
      const id_user = document.getElementById("id_user").value;

      obtenerProductoByIdType(id, id_type, id_client, id_user);
      $("#agregar_producto").slideUp();
      $("#quantity_product").val("");
      quantity_product.removeAttribute("disabled");
      $("#total_product").val("");
      $("#total_product_bs").val("");
    });

    //Se obtiene la data del producto seleccionado
    function obtenerProductoByIdType(id, id_type, id_client, id_user) {
      const datos = {
        id: id,
        id_type: id_type,
        id_client: id_client,
        id_user: id_user,
      };

      $.ajax({
        url: "../../controller/BillController.php",
        dataType: "json",
        type: "POST",
        data: {
          function: "obtenerProductoByIdType",
          datos: datos,
        },
        success: function (response) {
          let tasa_protegida = parseFloat(response.tasa_protegida);
          let price = response.price;
          let price_bs = price * tasa_protegida;
          if (tasa_protegida > 0) {
            $("#tasa_protegida").val(tasa_protegida);
          }
          $("#stock").val(response.stock);
          $("#price_product").val(response.price);
          $("#price_product_bs").val(price_bs.toFixed(2));
        },
        error: function (error) {
          console.error("Error al cargar producto:", error);
        },
      });
    }

    //Validar cantidad del producto antes de agregar
    $("#quantity_product").keyup(function (e) {
      e.preventDefault();
      let quantity_act = $(this).val();

      let tasa_actual = $("#tasa_protegida").val();
      let precio_total = quantity_act * $("#price_product").val();
      let precio_total_bs = precio_total * tasa_actual;
      $("#total_product").val(precio_total.toFixed(2));
      $("#total_product_bs").val(precio_total_bs.toFixed(2));
      //Ocultar boton agregar si la cantidad es menor que 1 o mayor que la existencia
      if (
        $(this).val() > 0 &&
        $(this).val() <= parseFloat($("#stock").val())
        // $(this).val() < 1 ||
        // isNaN($(this).val()) ||
        // $(this).val() > existencia
      ) {
        $("#agregar_producto").slideDown();
      } else {
        $("#agregar_producto").slideUp();
      }
    });

    //! METODO DE PAGO
    $("#methods input").on("keyup", function (e) {
      e.preventDefault();

      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      calculoTotalVenta(id_client, id_user);
    });

    function EsCreditos(creditos) {
      const Toast_Credito = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
      });

      //USD
      const totalVenta = parseFloat($("#totalventa2").text());
      const totalrestante = parseFloat($("#vuelto1").text());

      //BS
      const totalVentaBs = parseFloat($("#totalventa3").text());
      const totalrestantebs = parseFloat($("#vuelto2").text());

      // No es credito
      if (creditos == "0") {
        if (
          totalrestante >= 0 &&
          totalrestantebs >= 0 &&
          totalVenta > 0 &&
          totalVentaBs > 0
        ) {
          // Habilitar el botón
          $("#procesar_venta").slideDown();
        } else {
          Toast_Credito.fire({
            icon: "warning",
            title: "Vuelto debe ser mayor o igual a 0",
          });
          // Deshabilitar el botón
          $("#procesar_venta").slideUp();
        }
      } else {
        // Es a credito
        if (
          totalrestante < 0 &&
          totalrestantebs < 0 &&
          totalVenta > 0 &&
          totalVentaBs > 0
        ) {
          // Habilitar el botón
          $("#procesar_venta").slideDown();
        } else {
          Toast_Credito.fire({
            icon: "warning",
            title: "Credito seleccionado, vuelto no debe ser mayor a 0",
          });
          // Deshabilitar el botón
          $("#procesar_venta").slideUp();
        }
      }
    }

    $("#credito").on("change", function () {
      // Obtenemos el estado actual del checkbox
      let estaMarcado = $(this).prop("checked") == true ? "1" : "0";
      $("#credito").val(estaMarcado);
      EsCreditos(estaMarcado);
    });

    $("#agregar_producto").click(function (e) {
      e.preventDefault();
      // Obtención de los valores del formulario
      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const id_product = document.getElementById("product").value.trim();
      const quantity_product = document
        .getElementById("quantity_product")
        .value.trim();

      // ¡Lógica AJAX aquí
      const datos = {
        id_client: id_client,
        id_user: id_user,
        id_product: id_product,
        quantity_product: quantity_product,
      };
      calculoTotalVenta(id_client, id_user);
      agregarProductoVenta(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)
      //registrarUser(datos);

      function agregarProductoVenta(datos) {
        $("#agregar_producto").slideUp();
        $.ajax({
          url: "../../controller/billController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "agregarProductoVenta",
            datos: datos,
          },
          success: function (response) {
            $("#product").val(null).trigger("change");

            $("#stock").val("");

            $("#quantity_product").val("");
            $("#price_product").val("");
            $("#price_product_bs").val("");
            $("#total_product").val("");
            $("#total_product_bs").val("");
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              const id_client = document.getElementById("client").value.trim();
              const id_user = document.getElementById("id_user").value.trim();
              $("#tasa_protegida").val(response.tasa_protegida);
              updateTable(id_client, id_user);

              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
              });
              Toast.fire({
                icon: "success",
                title: response.msg,
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno." + error,
              icon: "error",
            });
          },
        });
      }
    });

    function disabledMethod() {
      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const datos = {
        id_client: id_client,
        id_user: id_user,
      };

      $.ajax({
        url: "../../controller/billController.php", // ruta del archivo PHP
        type: "POST",
        dataType: "json", //tipo de dato que se recibe
        data: {
          function: "obtenerDetallesVenta",
          datos: datos,
        },
        success: function (response) {
          const method1 = document.getElementById("method1");
          const method2 = document.getElementById("method2");
          const method3 = document.getElementById("method3");
          const method4 = document.getElementById("method4");
          const method5 = document.getElementById("method5");
          const method6 = document.getElementById("method6");
          const select_pago_movil =
            document.getElementById("select_pago_movil");
          const select_transferencia_directa_bs = document.getElementById(
            "select_transferencia_directa_bs"
          );
          const select_transferencia_directa_dls = document.getElementById(
            "select_transferencia_directa_dls"
          );
          const credito = document.getElementById("credito");

          if (response.length > 0) {
            method1.removeAttribute("disabled");
            method2.removeAttribute("disabled");
            method3.removeAttribute("disabled");
            method4.removeAttribute("disabled");
            method5.removeAttribute("disabled");
            method6.removeAttribute("disabled");
            select_pago_movil.removeAttribute("disabled");
            select_transferencia_directa_bs.removeAttribute("disabled");
            select_transferencia_directa_dls.removeAttribute("disabled");
            credito.removeAttribute("disabled");
          } else {
            method1.value = "";
            method2.value = "";
            method3.value = "";
            method4.value = "";
            method6.value = "";
            method6.value = "";

            method1.setAttribute("disabled", true);
            method2.setAttribute("disabled", true);
            method3.setAttribute("disabled", true);
            method4.setAttribute("disabled", true);
            method5.setAttribute("disabled", true);
            method6.setAttribute("disabled", true);
            select_pago_movil.setAttribute("disabled", true);
            select_transferencia_directa_bs.setAttribute("disabled", true);
            select_transferencia_directa_dls.setAttribute("disabled", true);
            credito.setAttribute("disabled", true);
            $("#procesar_venta").slideUp();
          }
        },
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Error",
            text: "Oops ha ocurrido un error interno.",
            icon: "error",
          });
        },
      });
    }
    // Delegar el evento click al elemento padre (la tabla)
    $("#tabla_producto_venta").on(
      "click",
      ".eliminar_producto_venta",
      function () {
        const id = $(this).data("id"); // Obtener el ID del producto del botón
        eliminar_producto_venta(id);
      }
    );

    function eliminar_producto_venta(id) {
      // Obtención de los valores del formulario
      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const id_detalle = id;

      // ¡Lógica AJAX aquí
      const datos = {
        id_client: id_client,
        id_user: id_user,
        id_detalle: id_detalle,
      };

      eliminarProductoVenta(JSON.stringify(datos)); // Convertir a JSON antes de enviar

      // Llamar a la funcion ajax (definir a continuación)
      //registrarUser(datos);

      function eliminarProductoVenta(datos) {
        $.ajax({
          url: "../../controller/billController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "eliminarProductoVenta",
            datos: datos,
          },
          success: function (response) {
            // Respuesta exitosa - manejar en caso de JSON
            if (response.success) {
              const id_client = document.getElementById("client").value.trim();
              const id_user = document.getElementById("id_user").value.trim();

              updateTable(id_client, id_user);
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
              });
              Toast.fire({
                icon: "success",
                title: response.msg,
              });
            } else {
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    }

    //!! CALCULO TOTAL DE LA VENTA
    function calculoTotalVenta(id_client, id_user) {
      //Inhabilitamos la cantidad ya que se vacia el select de los productos
      const quantity_product = document.getElementById("quantity_product");
      $("#quantity_product").val("");
      quantity_product.setAttribute("disabled", true);
      //Toma de datos
      const datos = {
        id_client: id_client,
        id_user: id_user,
      };

      $.ajax({
        url: "../../controller/billController.php", // ruta del archivo PHP
        type: "POST",
        dataType: "json", //tipo de dato que se recibe
        data: {
          function: "obtenerDetallesTotalVenta",
          datos: datos,
        },
        success: function (response) {
          let total = response.sell_price;
          let total_bs = response.sell_price_bs;
          let iva = response.iva;
          let subtotal = response.subtotal;
          let tasa_select = parseFloat(response.tasa_select);
          $("#tasa_protegida").val(tasa_select);

          if (
            total === null ||
            total_bs === null ||
            iva === null ||
            subtotal === null
          ) {
            total = "0.00";
            total_bs = "0.00";
            iva = "0.00";
            subtotal = "0.00";
            let vuelto1 = "0.00";
            let vuelto2 = "0.00";
            $("#vuelto1").text(vuelto1);
            $("#vuelto2").text(vuelto2);
          }

          //Calculo del total de la venta
          $("#totalventa").text(total);
          $("#totalventa2").text(total);
          $("#totalventa3").text(total_bs);
          $("#subtotalventa").text(subtotal);
          $("#ivatotalventa").text(iva);

          //Logica vueltos
          //Bolivares
          let method1 = parseFloat($("#method1").val()) || 0;
          let method3 = parseFloat($("#method3").val()) || 0;
          let method4 = parseFloat($("#method4").val()) || 0;
          let method5 = parseFloat($("#method5").val()) || 0;
          //Dolares
          let method2 = parseFloat($("#method2").val()) || 0;
          let method6 = parseFloat($("#method6").val()) || 0;

          let pago_movil = document.getElementById("select_pago_movil");
          let banco_pago_movil = pago_movil.selectedOptions[0];
          let banco4 = banco_pago_movil.text;

          let transf_direct_bs = document.getElementById(
            "select_transferencia_directa_bs"
          );
          let banco_transf_directa_bs = transf_direct_bs.selectedOptions[0];
          let banco5 = banco_transf_directa_bs.text;

          let transf_directa_dls = document.getElementById(
            "select_transferencia_directa_dls"
          );
          let banco_transf_directa_dls = transf_directa_dls.selectedOptions[0];
          let banco6 = banco_transf_directa_dls.text;

          //Quitamos coma para que permita miles
          let totalVentaText = total_bs;
          let totalVentaSinComas = totalVentaText.replace(",", "");
          let totalVenta = parseFloat(totalVentaSinComas);
          let totalPago = 0;

          if (banco4 == "Selecciona un banco") {
            method4 = 0;
          }

          if (banco5 == "Selecciona un banco") {
            method5 = 0;
          }

          if (banco6 == "Selecciona un banco") {
            method6 = 0;
          }

          if (totalVenta > 0) {
            // Convertir dolares a bolivares
            let tasa_actual = tasa_select;
            let totalDolares = (method2 + method6) * tasa_actual;

            // Sumar todos los valores
            totalPago = totalDolares + method1 + method3 + method4 + method5;

            //Vueltos
            let restantebsdec = totalPago - totalVenta;
            let restantedec = restantebsdec / tasa_actual;
            let restantebs = restantebsdec.toFixed(2);
            let restante = restantedec.toFixed(2);

            //Calculo del total del restante
            $("#vuelto1").text(restante);
            $("#vuelto2").text(restantebs);
            let creditoscheck = document.getElementById("credito").value;
            EsCreditos(creditoscheck);
          }
        },
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Error",
            text: "Oops ha ocurrido un error interno.",
            icon: "error",
          });
        },
      });
    }

    //! ACTUALIZAR TABLA DE VENTA CON PRODUCTO AGREGADO
    function updateTable(id_client, id_user) {
      disabledMethod();

      // Destruir la instancia actual de DataTable
      $("#tabla_producto_venta").DataTable().destroy();
      //Toma de datos
      const datos = {
        id_client: id_client,
        id_user: id_user,
      };
      calculoTotalVenta(id_client, id_user);
      //Inicializar tabla
      $("#tabla_producto_venta").DataTable({
        ajax: {
          url: "../../controller/BillController.php",
          type: "POST",
          dataSrc: "",
          dataType: "json",
          data: {
            function: "obtenerDetallesVenta",
            datos: datos,
          },
        },
        columns: [
          {
            data: "id_product",
            width: "5px",
          },
          {
            data: function (data, type, row, meta) {
              return data.name + " " + data.model;
            },
          },
          {
            data: "quantity",
          },
          {
            data: "sell_price",
          },
          {
            data: "sell_price_bs",
          },
          {
            data: function (data, type, row, meta) {
              let total = data.quantity * data.sell_price;
              return total.toFixed(2);
            },
          },
          {
            data: function (data, type, row, meta) {
              let total = data.quantity * data.sell_price_bs;
              return total.toFixed(2);
            },
          },
          {
            data: null,
            render: function (data) {
              return accionesProductosVentas(data);
            },
          },
        ],
        language: spanish,
        scrollCollapse: true,
        scrollY: "13rem",
        paging: false,
        searching: false,
        info: false,
      });
    }
    //Se traen los productos y se llena el select2
    obtenerProductosSelect();
    // Funcion para obtener status
    function obtenerProductosSelect() {
      $.ajax({
        url: "../../controller/BillController.php",
        dataType: "json",
        type: "POST",
        data: {
          function: "obtenerProductos",
        },
        success: function (data) {
          // Recorrer los roles y agregarlos al Select
          $.each(data, function (i, item) {
            $("#product").append(
              "<option value='" +
                item.id +
                "'>" +
                item.id +
                " - " +
                item.name +
                " " +
                item.model +
                "</option>"
            );
          });
        },
        error: function (error) {
          console.error("Error al cargar status:", error);
        },
      });
    }

    //FIN PRODUCTO

    //PAGO

    obtenerMetodoPagoSelect();

    function obtenerMetodoPagoSelect() {
      $.ajax({
        url: "../../controller/BillController.php",
        dataType: "json",
        type: "POST",
        data: {
          function: "obtenerMetodosPago",
        },
        success: function (data) {
          // Recorrer los roles y agregarlos al Select
          $.each(data, function (i, item) {
            $(".select_multiple").append(
              "<option value='" +
                item.id +
                "'>" +
                item.payment_code +
                " - " +
                item.name +
                "</option>"
            );
          });
        },
        error: function (error) {
          console.error("Error al cargar status:", error);
        },
      });
    }

    $(".select_documento").select2({
      placeholder: "Ingrese tipo de documento",
      allowClear: false,
    });
    $(".select_retiro").select2({
      placeholder: "Ingrese tipo de retiro",
      allowClear: false,
    });
    $(".select_pago_movil").select2({
      placeholder: "Ingrese banco",
      allowClear: false,
    });
    $(".select_transferencia_directa_bs").select2({
      placeholder: "Ingrese banco",
      allowClear: false,
    });
    $(".select_transferencia_directa_dls").select2({
      placeholder: "Ingrese banco",
      allowClear: false,
    });
    //FIN PAGO

    //FACTURA

    $("#procesar_venta").click(function (e) {
      e.preventDefault();

      //!COLOCAR LUEGO DE BORRAR LA TABLA DE PRODUCTOS DE VENTAS
      // Obtención de los valores del formulario
      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      const id_documento = document
        .getElementById("select_documento")
        .value.trim();
      //!![...document.querySelectorAll('.form-control')].reduce((curr, x) => ({ ...curr, [x.getAttribute('id')]: x.value }) ,{})
      const idmethod1 = document.getElementById("idmethod1").value.trim();
      const method1 = document.getElementById("method1").value.trim();
      const idmethod2 = document.getElementById("idmethod2").value.trim();
      const method2 = document.getElementById("method2").value.trim();
      const idmethod3 = document.getElementById("idmethod3").value.trim();
      const method3 = document.getElementById("method3").value.trim();
      const idmethod4 = document.getElementById("idmethod4").value.trim();
      const method4 = document.getElementById("method4").value.trim();
      const idmethod5 = document.getElementById("idmethod5").value.trim();
      const method5 = document.getElementById("method5").value.trim();
      const idmethod6 = document.getElementById("idmethod6").value.trim();
      const method6 = document.getElementById("method6").value.trim();

      const pago_movil = document.getElementById("select_pago_movil");
      const banco_pago_movil = pago_movil.selectedOptions[0];
      const banco4 = banco_pago_movil.text;
      const transf_direct_bs = document.getElementById(
        "select_transferencia_directa_bs"
      );
      const banco_transf_directa_bs = transf_direct_bs.selectedOptions[0];
      const banco5 = banco_transf_directa_bs.text;
      const transf_directa_dls = document.getElementById(
        "select_transferencia_directa_dls"
      );
      const banco_transf_directa_dls = transf_directa_dls.selectedOptions[0];
      const banco6 = banco_transf_directa_dls.text;

      const ship = document.getElementById("select_retiro").value.trim();
      const is_credito = document.getElementById("credito").value;

      const vuelto_usd = parseFloat($("#vuelto1").text());
      const vuelto_bs = parseFloat($("#vuelto2").text());
      calculoTotalVenta(id_client, id_user);

      // ¡Lógica AJAX aquí
      const datos = {
        id_client: id_client,
        id_user: id_user,
        id_documento: id_documento,
        idmethod1: idmethod1,
        method1: method1,
        idmethod2: idmethod2,
        method2: method2,
        idmethod3: idmethod3,
        method3: method3,
        idmethod4: idmethod4,
        method4: method4,
        idmethod5: idmethod5,
        method5: method5,
        idmethod6: idmethod6,
        method6: method6,
        ship: ship,
        is_credito: is_credito,
        banco4: banco4,
        banco5: banco5,
        banco6: banco6,
      };

      //LOGICA VUELTOS
      if (is_credito == 0 && vuelto_usd > 0 && vuelto_bs > 0) {
        procesarCambioVenta(vuelto_usd, vuelto_bs);
      } else {
        procesarVenta(JSON.stringify(datos));
      }

      function procesarCambioVenta(usd, bs) {
        const selects = ["Efectivo", "Pago Movil"]
          .map(
            (tipo_pago) => `<option value="${tipo_pago}">${tipo_pago}</option>`
          )
          .join("");

        const consultar_vuelto = () =>
          Swal.fire({
            title: "¡Hay cambio!",
            html:
              '<div data-total_vuelto_bs="' +
              bs +
              '" data-total_vuelto_usd="' +
              usd +
              '"><span>USD: <strong class="usd">' +
              usd +
              "</strong> - " +
              'BS: <strong class="bs">' +
              bs +
              "</strong><br>" +
              "¿Cuánto <strong>USD y BS</strong> de cambio deseas entregar?</span><br>" +
              '<input id="swal-input1" class="swal2-input cambios usd" type="number" min="0" step="0.1" placeholder="Cantidad en USD"><hr>' +
              '<input id="swal-input2" class="swal2-input cambios2 bs" type="number" min="0" step="0.1" placeholder="Cantidad en BS"><select id="swal2-select" style="padding: 0 3.95rem" class="swal2-select swal2-input">' +
              selects +
              "</select></div>",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
          }).then((result) => {
            if (result.isConfirmed) {
              const cantidadUSD = parseFloat(
                document.getElementById("swal-input1").value
              );
              const cantidadBS = parseFloat(
                document.getElementById("swal-input2").value
              );
              const metodo_vuelto =
                document.getElementById("swal2-select").value;
              const vuelto_bs = parseFloat(
                document.querySelector("[data-total_vuelto_bs] strong.bs")
                  .innerText
              );

              //Tomar datos
              if (vuelto_bs == 0) {
                // const selector_to_object = (selector, prop) => {
                //   return [...document.querySelectorAll(selector)].reduce((curr, x) => ({
                //     ...curr,
                //     [x.getAttribute('id')]: x[prop]
                //   }), {})
                // }

                const id_client = document
                  .getElementById("client")
                  .value.trim();
                const id_user = document.getElementById("id_user").value.trim();
                const id_documento = document
                  .getElementById("select_documento")
                  .value.trim();
                const idmethod1 = document
                  .getElementById("idmethod1")
                  .value.trim();
                const method1 = document.getElementById("method1").value.trim();
                const idmethod2 = document
                  .getElementById("idmethod2")
                  .value.trim();
                const method2 = document.getElementById("method2").value.trim();
                const idmethod3 = document
                  .getElementById("idmethod3")
                  .value.trim();
                const method3 = document.getElementById("method3").value.trim();
                const idmethod4 = document
                  .getElementById("idmethod4")
                  .value.trim();
                const method4 = document.getElementById("method4").value.trim();
                const idmethod5 = document
                  .getElementById("idmethod5")
                  .value.trim();
                const method5 = document.getElementById("method5").value.trim();
                const idmethod6 = document
                  .getElementById("idmethod6")
                  .value.trim();
                const method6 = document.getElementById("method6").value.trim();
                const pago_movil = document.getElementById("select_pago_movil");
                const banco_pago_movil = pago_movil.selectedOptions[0];
                const banco4 = banco_pago_movil.text;
                const transf_direct_bs = document.getElementById(
                  "select_transferencia_directa_bs"
                );
                const banco_transf_directa_bs =
                  transf_direct_bs.selectedOptions[0];
                const banco5 = banco_transf_directa_bs.text;
                const transf_directa_dls = document.getElementById(
                  "select_transferencia_directa_dls"
                );
                const banco_transf_directa_dls =
                  transf_directa_dls.selectedOptions[0];
                const banco6 = banco_transf_directa_dls.text;

                const ship = document
                  .getElementById("select_retiro")
                  .value.trim();
                const is_credito = document.getElementById("credito").value;

                // ¡Lógica AJAX aquí
                const datos = {
                  id_client,
                  id_user,
                  id_documento,
                  idmethod1,
                  method1,
                  idmethod2,
                  method2,
                  idmethod3,
                  method3,
                  idmethod4,
                  method4,
                  idmethod5,
                  method5,
                  idmethod6,
                  method6,
                  ship,
                  is_credito,
                  banco4,
                  banco5,
                  banco6,
                  cantidadUSD,
                  cantidadBS,
                  metodo_vuelto,
                };

                // Procesar las cantidades de cambio
                procesarVenta(JSON.stringify(datos));
              } else {
                Swal.fire({
                  title: "Atencion!",
                  text: "Vuelto a entregar incorrecto!",
                  icon: "error",
                }).then(() => {
                  consultar_vuelto();
                });
              }
            }
          });
        consultar_vuelto();
      }

      function procesarVenta(datos) {
        $("#procesar_venta").slideUp();

        $.ajax({
          url: "../../controller/billController.php", // ruta del archivo PHP
          type: "POST",
          dataType: "json", //tipo de dato que se recibe
          data: {
            function: "procesarVenta",
            datos,
          },
          success: function (response) {
            $("#procesar_venta").slideUp();
            if (response.success) {
              if (response.id_documento == "1") {
                enviarDataTicket(response.id_bill);
              } else {
                enviarDataPDF(response.id_bill);
              }
            } else {
              console.log(response);
              Swal.fire({
                title: "Atencion!",
                text: response.error,
                icon: "warning",
              });
            }
          },
          error: function (error) {
            console.log(error);
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          },
        });
      }
    });

    $("#vaciar_factura").click(function (e) {
      e.preventDefault();
      const id_client = document.getElementById("client").value.trim();
      const id_user = document.getElementById("id_user").value.trim();
      calculoTotalVenta(id_client, id_user);
      const datos = {
        id_client: id_client,
        id_user: id_user,
        // data: data
      };
      $("#quantity_product").val("");
      $("#agregar_producto").slideUp();
      $.ajax({
        url: "../../controller/billController.php", // ruta del archivo PHP
        type: "POST",
        dataType: "json", //tipo de dato que se recibe
        data: {
          function: "vaciarFactura",
          datos: datos,
        },
        success: function (response) {
          // Respuesta exitosa - manejar en caso de JSON
          if (response.success) {
            $("#product").val(null).trigger("change");

            $("#stock").val("");
            $("#price_product").val("");
            $("#price_product_bs").val("");

            $("#quantity_product").val("");
            $("#price_product").val("");
            $("#price_product_bs").val("");
            $("#total_product").val("");
            $("#total_product_bs").val("");
            const id_client = document.getElementById("client").value.trim();
            const id_user = document.getElementById("id_user").value.trim();

            updateTable(id_client, id_user);
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 1000,
              timerProgressBar: true,
            });
            Toast.fire({
              icon: "success",
              title: response.msg,
            });
          } else {
            Swal.fire({
              title: "Atencion!",
              text: response.error,
              icon: "warning",
            });
          }
        },
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Error",
            text: "Oops ha ocurrido un error interno.",
            icon: "error",
          });
        },
      });
    });

    //FIN FACTURA
  }
  //! FIN VENTAS

  //! CONFIGURACIONES
  //FORMULARIO EDITAR CONFIGURACION//
  if ($("#editar_configuracion").length) {
    const id_user = document.getElementById("id_user").value.trim();

    const datos = {
      id_user: id_user,
    };

    obtener_configuracion();

    function obtener_configuracion() {
      // Hacer una llamada AJAX para obtener los datos del registro seleccionado
      $.ajax({
        url: "../../controller/configController.php",
        type: "POST",
        dataType: "json",
        data: {
          function: "obtenerConfiguracion",
          datos: datos,
        },
        success: function (response) {
          //Asignar los valores del formulario
          $("#rif").val(response.rif);
          $("#company_name").val(response.company_name);
          $("#company_email").val(response.company_email);
          $("#company_address").val(response.company_address);
          $("#company_phone").val(response.company_phone);
          $("#tickera").val(response.tickera_name);
          $("#tasa_bcv").val(response.tasa_bcv);
          $("#tasa_paralelo").val(response.tasa_paralelo);
          $("#comission_detal").val(response.comission_detal);
          $("#comission_mayor").val(response.comission_mayor);
          $("#type_comission").val(response.type_comission);
          $("#name").text(response.name);
          $("#email").text(response.email);
          $("#rol").text(response.rol);
          $("#user").text(response.user);
          $("#img_path").attr("src", response.company_img_path);

          // Convertir a JSON antes de enviar
          $("#editar_configuracion").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const tickera = document.getElementById("tickera").value.trim();
            const tasa_bcv = document.getElementById("tasa_bcv").value.trim();
            const tasa_paralelo = document
              .getElementById("tasa_paralelo")
              .value.trim();
            const comission_detal = document
              .getElementById("comission_detal")
              .value.trim();
            const comission_mayor = document
              .getElementById("comission_mayor")
              .value.trim();
            const type_comission = document
              .getElementById("type_comission")
              .value.trim();
            // ¡Lógica AJAX aquí
            const datos = {
              tickera: tickera,
              tasa_bcv: tasa_bcv,
              tasa_paralelo: tasa_paralelo,
              comission_detal: comission_detal,
              comission_mayor: comission_mayor,
              type_comission: type_comission,
            };

            editarConfiguracion(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });

          $("#editar_configuracion_empresa").click(function (e) {
            e.preventDefault();
            // Obtención de los valores del formulario
            const rif = document.getElementById("rif").value.trim();
            const company_name = document
              .getElementById("company_name")
              .value.trim();
            const company_email = document
              .getElementById("company_email")
              .value.trim();
            const company_address = document
              .getElementById("company_address")
              .value.trim();
            const company_phone = document
              .getElementById("company_phone")
              .value.trim();

            // ¡Lógica AJAX aquí
            const datos = {
              rif: rif,
              company_name: company_name,
              company_email: company_email,
              company_address: company_address,
              company_phone: company_phone,
            };

            editarConfiguracionEmpresa(JSON.stringify(datos)); // Convertir a JSON antes de enviar
          });

          function editarConfiguracion(datos) {
            $.ajax({
              url: "../../controller/configController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarConfiguracion",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "configuracion.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }

          function editarConfiguracionEmpresa(datos) {
            $.ajax({
              url: "../../controller/configController.php", // ruta del archivo PHP
              type: "POST",
              dataType: "json", //tipo de dato que se recibe
              data: {
                function: "editarConfiguracionEmpresa",
                datos: datos,
              },
              success: function (response) {
                // Respuesta exitosa - manejar en caso de JSON
                if (response.success) {
                  Swal.fire({
                    title: "Exito",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "configuracion.php";
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Atencion!",
                    text: response.error,
                    icon: "warning",
                  });
                }
              },
              error: function (error) {
                console.log(error);
                Swal.fire({
                  title: "Error",
                  text: "Oops ha ocurrido un error interno.",
                  icon: "error",
                });
              },
            });
          }
        },
        error: function (error) {
          // Mostrar mensaje de error con SweetAlert
          console.log(error);
        },
      });
    }
  }
  //! FIN CONFIGURACIONES

  //! INICIO HISTORIAL
  if ($("#tabla_historial").length) {
    $("#tabla_historial").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/productController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerHistorial",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "name_product",
        },
        {
          data: "name_user",
        },
        {
          data: "modified_column",
        },
        {
          data: "action",
        },
        {
          data: "old_value",
        },
        {
          data: "new_value",
        },
        {
          data: "date_modified",
        },
      ],
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
      order: [
        //!Ordenamos por fecha y luego por id
        [7, "desc"],
        [0, "desc"],
      ],
    });
  }
  //! FIN HISTORIAL

  //! INICIO INGRESO
  if ($("#ingresos").length) {
    // Find the datepicker input
    var datepickerInput = $('input[name="daterange"]');

    // If the input exists, execute the datepicker code
    if (datepickerInput.length > 0) {
      datepickerInput.daterangepicker({
        locale: {
          separator: " - ",
          applyLabel: "Guardar",
          cancelLabel: "Cancelar",
          fromLabel: "Desde",
          toLabel: "Hasta",
          customRangeLabel: "Personalizar",
          daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          monthNames: [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Setiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
          ],
          firstDay: 1,
        },
        opens: "left",
      });
    }

    document
      .getElementById("ingresos")
      .addEventListener("submit", function (e) {
        e.preventDefault();

        const date_range = datepickerInput.val();

        // ¡Lógica AJAX aquí
        const datos = {
          date_range: date_range,
        };

        obtenerIngresos(JSON.stringify(datos)); // Convertir a JSON antes de enviar
      });

    function obtenerIngresos(datos) {
      $.ajax({
        url: "../../controller/incomeController.php", // ruta del archivo PHP
        type: "POST",
        dataType: "json", //tipo de dato que se recibe
        data: {
          function: "obtenerIngresos",
          datos: datos,
        },
        success: function (response) {
          console.log(response);
          if (response.success) {
            // Respuesta exitosa - manejar en caso de JSON
            $("#bs")
              .css("fontWeight", "bold")
              .text(response.cash_bs + " Bs");
            $("#dolar")
              .css("fontWeight", "bold")
              .text(response.cash_dolar + " $");
            $("#punto_venta")
              .css("fontWeight", "bold")
              .text(response.card_bs + " Bs");
            $("#pago_movil")
              .css("fontWeight", "bold")
              .text(response.pago_movil + " Bs");
          } else {
            Swal.fire({
              title: "Error",
              text: "Oops ha ocurrido un error interno.",
              icon: "error",
            });
          }
        },
        error: function (error) {
          console.log(error);
          Swal.fire({
            title: "Error",
            text: "Oops ha ocurrido un error interno.",
            icon: "error",
          });
        },
      });
    }
  }
  //! FIN INGRESO

  //! INICIO NOMINA
  if ($("#tabla_nomina").length) {
    $("#tabla_nomina").DataTable({
      pageLength: 10,
      ajax: {
        url: "../../controller/payrollController.php",
        type: "POST",
        dataSrc: "",
        dataType: "json",
        data: {
          function: "obtenerSalariosEmpleados",
        },
      },
      columns: [
        {
          data: "id",
          width: "5px",
        },
        {
          data: "name",
        },
        {
          data: "type_salary",
        },
        {
          data: "period2",
        },
        {
          data: "total_salary",
        },
        {
          data: "status",
        },
        {
          data: null,
          render: function (data) {
            return accionesNomina(data);
          },
        },
      ],
      createdRow: function (row, data, dataIndex) {
        if (data.id_status == 4) {
          $("td:eq(5)", row).html(
            '<span class="badge text-bg-success text-white">' +
              data.status +
              "</span>"
          );
        } else if (data.id_status == 5) {
          $("td:eq(5)", row).html(
            '<span class="badge text-bg-warning text-white">' +
              data.status +
              "</span>"
          );
        } else {
          $("td:eq(5)", row).html(
            '<span class="badge text-bg-danger text-white">' +
              data.status +
              "</span>"
          );
        }
      },
      language: spanish,
      scrollCollapse: true,
      scrollY: "31rem",
    });

    // Find the datepicker input
    let datepickerInput = $('input[name="daterange"]');

    // If the input exists, execute the datepicker code
    if (datepickerInput.length > 0) {
      datepickerInput.daterangepicker({
        locale: {
          separator: " - ",
          applyLabel: "Guardar",
          cancelLabel: "Cancelar",
          fromLabel: "Desde",
          toLabel: "Hasta",
          customRangeLabel: "Personalizar",
          daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          monthNames: [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Setiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
          ],
          firstDay: 1,
        },
        opens: "left",
      });
    }

    document.getElementById("nomina").addEventListener("submit", function (e) {
      e.preventDefault();

      const date_range = datepickerInput.val();

      // ¡Lógica AJAX aquí
      const datos = {
        date_range: date_range,
      };

      console.log(datos);
    });

    $("#tabla_nomina").on("click", ".ver-detalles-nomina", function (e) {
      e.preventDefault();
      //! Funcion para obtener detalles en modal

      let id = $(this).attr("id");
      const datos = {
        id: id,
      };
      $("#tabla_comisiones").DataTable({
        pageLength: 10,
        ajax: {
          url: "../../controller/payrollController.php",
          type: "POST",
          dataSrc: "",
          dataType: "json",
          data: {
            function: "obtenerDetallesNomina",
            datos: datos,
          },
        },
        columns: [
          {
            data: "id",
            width: "5px",
          },
          {
            data: "comission",
          },
          {
            data: "comission_total",
          },
          {
            data: "mayor_detal",
          },
          {
            data: "estado_comision",
          },
          {
            data: "pago_nomina",
          },
          {
            data: "name",
          },
        ],
        createdRow: function (row, data, dataIndex) {
          const pagarNominaButton = document.getElementById("pagar_nomina");
          let salary = parseFloat(data.salary);
          let suma_total_comisiones = parseFloat(data.suma_total_comisiones);
          $("#suma").text(suma_total_comisiones);
          $("#salary").text(salary);
          $("#total_salary").text(suma_total_comisiones + salary);
          if (data.estado_comision == "Procesado") {
            $("td:eq(4)", row).html(
              '<span class="badge text-bg-success text-white">' +
                data.estado_comision +
                "</span>"
            );
          } else {
            $("td:eq(4)", row).html(
              '<span class="badge text-bg-warning text-black">' +
                data.estado_comision +
                "</span>"
            );
          }
          if (data.pago_nomina == "Pagado") {
            pagarNominaButton.style.display = "none"; // Hide the button
            $("td:eq(5)", row).html(
              '<span class="badge text-bg-success text-white">' +
                data.pago_nomina +
                "</span>"
            );
          } else {
            $("td:eq(5)", row).html(
              '<span class="badge text-bg-warning text-black">' +
                data.pago_nomina +
                "</span>"
            );
          }
        },
        language: spanish,
        scrollCollapse: true,
        searching: false,
        bLengthChange: false,
        destroy: true,
      });

      //!logica para pagar nomina y seguir mostrando detalles
      $("#pagar_nomina").on("click", function (e) {
        Swal.fire({
          title: "Atención",
          text: "¿Está seguro de haber pagado esta nómina?",
          icon: "warning",
          showCancelButton: true, // <- Agregamos la propiedad showCancelButton
          confirmButtonColor: "#3085d6", // <- Color del botón de confirmación (opcional)
          cancelButtonColor: "#d33", // <- Color del botón de cancelación (opcional)
          confirmButtonText: "Sí, pagar nomina",
          cancelButtonText: "Cancelar",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "../../controller/payrollController.php",
              type: "POST",
              dataSrc: "",
              dataType: "json",
              data: {
                function: "pagarNominaEmpleado",
                datos: datos,
              },
              success: function (response) {
                if (response.success) {
                  Swal.fire({
                    title: "Éxito!",
                    text: response.msg,
                    icon: "success",
                  }).then((result) => {
                    location.reload(); // Reload the page
                  });
                } else {
                  Swal.fire({
                    title: "Error",
                    text: response.error,
                    icon: "error",
                  });
                }
              },
              error: function (error) {
                console.error("Error sending AJAX request:", error);
                Swal.fire({
                  title: "Error",
                  text: "Ocurrió un error al actualizar el estado de la nómina",
                  icon: "error",
                });
              },
            });
          }
        });
      });
    });
  }
  //! FIN NOMINA
});
