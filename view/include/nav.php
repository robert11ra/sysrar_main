<!-- Inicio Menú Ordenador -->
<div class="sidebar" id="menu-principal">
    <ul class="nav" id="tasa">
        <div class="logo_content"> <!-- LOGO -->
            <i class='bx bx-menu' id='btn'></i>
            <div class="logo">
                <div class="logo_name">&nbsp; SYS - RAR</div>
            </div>
        </div>
    </ul>
    <div class="profile mt-3 ps-2">
        <div class="profile-img">
            <img src="../../public/img/user.png">
        </div>
        <div class="profile-container">
            <p class="ps-3 m-0 profile-name fw-bold"><?php echo $_SESSION['name']; ?></p>
            <p class="ps-3 m-0 profile-name text-muted"><?php echo $_SESSION['rol']; ?></p>
        </div>
    </div>

</div>
<!-- Fin Menú Ordenador -->

<!-- Inicio Menú Móvil -->
<button class="btn btn-canva" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><i class='bx bx-menu'></i></button>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
    <div class="offcanvas-header close-canva">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="sidebar active canva" id="menu-movil">
        <ul class="nav" id="tasa">
            <div class="logo_content">
                <div class="logo">
                    <div class="logo_name">&nbsp; SYS - RAR</div>
                </div>
            </div>
        </ul>
        <div class="profile mt-3 ps-2">
            <div class="profile-img">
                <img src="../../public/img/user.png">
            </div>
            <div class="profile-container">
                <p class="ps-3 m-0 profile-name fw-bold"><?php echo $_SESSION['name']; ?></p>
                <p class="ps-3 m-0 profile-name text-muted"> <?php echo $_SESSION['rol']; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Fin Menú Móvil -->

<!-- Inicio Script Dinamismo entre Menu Móvil y Menú Ordenador -->
<script>
    const paginas = {
        inicio: {
            nombre: "Inicio",
            icon: "bx bxs-dashboard", // Icono para el menú principal
            url: "../index/index.php",
            submenu: false
        },
        usuarios: {
            nombre: "Usuarios",
            icon: "fas fa-users", // Icono para el menú principal
            url: "../usuarios/usuarios.php",
            submenu: true,
            submenus: {
                nuevoUsuario: {
                    nombre: "Nuevo Usuario",
                    icon: "fas fa-plus",
                    url: "../usuarios/nuevo_usuario.php",
                },
                listaUsuarios: {
                    nombre: "Lista de Usuarios",
                    icon: "fa-solid fa-users", // Icono para el submenú
                    url: "../usuarios/usuarios.php",
                },
                // permisoUsuarios: {
                //     nombre: "Permisos de Usuarios",
                //     icon: "fa-solid fa-users-gear", // Icono para el submenú
                //     url: "usuarios/permisos_usuarios.php",
                // },
            },
        },
        clientes: {
            nombre: "Clientes",
            icon: "fa-solid fa-user", // Icono para el submenú
            url: "../clientes/clientes.php",
            submenu: true,
            submenus: {
                nuevoCliente: {
                    nombre: "Nuevo Cliente",
                    icon: "fas fa-plus",
                    url: "../clientes/nuevo_cliente.php",
                },
                listaClientes: {
                    nombre: "Lista de Clientes",
                    icon: "fa-solid fa-user", // Icono para el submenú
                    url: "../clientes/clientes.php",
                },
            },
        },
        productos: {
            nombre: "Productos",
            icon: "fas fa-cubes",
            url: "../productos/productos.php",
            submenu: true,
            submenus: {
                nuevoProducto: {
                    nombre: "Nuevo Producto",
                    icon: "fa-solid fa-plus",
                    url: "../productos/nuevo_producto.php",
                },
                listaProductos: {
                    nombre: "Lista de Productos",
                    icon: "fa-solid fa-warehouse",
                    url: "../productos/productos.php",
                },
                seguimientoProducto: {
                    nombre: "Seguimiento de Producto",
                    icon: "fa-solid fa-person-hiking",
                    url: "../productos/seguimiento_producto.php",
                },
                productosAgotados: {
                    nombre: "Productos Agotados",
                    icon: "fa-solid fa-battery-quarter",
                    url: "../productos/productos_agotados.php",
                },
                masVendidos: {
                    nombre: "Mas Vendidos",
                    icon: "fa-solid fa-dollar-sign",
                    url: "../productos/mas_vendidos.php",
                },
            },
        },
        proveedores: {
            nombre: "Proveedores",
            icon: "fas fa-users",
            url: "../proveedores/proveedores.php",
            submenu: true,
            submenus: {
                nuevoProveedor: {
                    nombre: "Nuevo Proveedor",
                    icon: "fa-solid fa-plus",
                    url: "../proveedores/nuevo_proveedor.php",
                },
                listaProveedores: {
                    nombre: "Lista de Proveedores",
                    icon: "fa-solid fa-warehouse",
                    url: "../proveedores/proveedores.php",
                },
            },
        },
        ventas: {
            nombre: "Ventas",
            icon: "fas fa-file-archive",
            url: "../ventas/facturas.php",
            submenu: true,
            submenus: {
                nuevaFactura: {
                    nombre: "Nueva Factura",
                    icon: "fa-solid fa-plus",
                    url: "../ventas/nueva_factura.php",
                },
                // nuevaFacturaDevolucion: {
                //     nombre: "Nueva Devolucion",
                //     icon: "fa-solid fa-plus-minus",
                //     url: "../ventas/nueva_devolucion.php",
                // },
                facturas: {
                    nombre: "Facturas",
                    icon: "fa-solid fa-file-circle-check",
                    url: "../ventas/facturas.php",
                },
                facturasPendientes: {
                    nombre: "Facturas Pendientes",
                    icon: "fa-solid fa-file-circle-exclamation",
                    url: "../ventas/facturas_pendientes.php",
                },
                facturasAnuladas: {
                    nombre: "Facturas Anuladas",
                    icon: "fa-solid fa-file-circle-minus",
                    url: "../ventas/facturas_anuladas.php",
                },
                mercanciaApartada: {
                    nombre: "Mercancia Apartada",
                    icon: "fa-solid fa-boxes-packing",
                    url: "../ventas/apartado.php",
                }
            },
        },
        contabilidad: {
            nombre: "Contabilidad",
            icon: "fa-solid fa-calculator",
            url: "#",
            submenu: true,
            submenus: {
                ingresos: {
                    nombre: "Ingresos",
                    icon: "fa-solid fa-money-check-dollar",
                    url: "../contabilidad/ingresos.php",
                },
                asistencia: {
                    nombre: "Asistencia",
                    icon: "fa-solid fa-clipboard-question",
                    url: "../contabilidad/asistencia.php",
                },
                cuentasPagar: {
                    nombre: "Cuentas por Pagar",
                    icon: "fa-solid fa-receipt",
                    url: "../contabilidad/cuentas_pagar.php",
                },
                cuentasCobrar: {
                    nombre: "Cuentas por Cobrar",
                    icon: "fa-solid fa-file-invoice-dollar",
                    url: "../contabilidad/cuentas_cobrar.php",
                },
                nomina: {
                    nombre: "Nomina",
                    icon: "fa-solid fa-hand-holding-dollar",
                    url: "../contabilidad/nomina.php",
                },
            },
        },
        tasaDolar: {
            nombre: "Tasa $",
            icon: "fas fa-dollar-sign dolar",
            url: '#',
            submenu: true,
            submenus: {
                tasatoday: {
                    nombre: "",
                    id: "id_dolar"
                },
                tasaBCV: {
                    nombre: "",
                    id: "id_dolar2"
                }
            },
        },
        historial: {
            nombre: "Historial",
            icon: "fa-solid fa-rectangle-list",
            url: "../historial/historial.php",
            submenu: true,
            submenus: {
                historial: {
                    nombre: "Historial",
                    icon: "fa-solid fa-rectangle-list",
                    url: "../historial/historial.php",
                }
            },
        },
        cerrarSesion: {
            nombre: "Cerrar Sesión",
            icon: "fas fa-sign-out-alt",
            url: "../log_out.php",
            submenu: false
        },
        configuracion: {
            nombre: "Configuración",
            icon: "fas fa-cogs",
            url: "../configuracion/configuracion.php",
            submenu: true,
            submenus: {
                configuracion: { // Solo es necesario un nivel, puedes repetir el nombre
                    nombre: "Configuración",
                    icon: "fas fa-cogs",
                    url: "../configuracion/configuracion.php",
                },
            },
        },
    };

    // Obtienes una referencia al contenedor del menú
    const menuContainer = document.getElementById('menu-principal');
    const navList = menuContainer.querySelector('.nav'); // Obtiene la lista <ul>

    // Función para crear elementos del menú
    function crearElementoMenu(page) {
        const li = document.createElement('li');
        const iconLinks = document.createElement('div');
        iconLinks.classList.add('icon-links');

        if (page.url) {
            const link = document.createElement('a');
            link.href = page.url;
            // Agrega el icono
            link.innerHTML = `<i class="${page.icon}"></i><span class="link_name">${page.nombre}</span>`;
            iconLinks.appendChild(link);
        } else {
            const iconSpan = document.createElement('span');
            iconSpan.classList.add('icon-name');
            iconSpan.innerHTML = `<i class="${page.icon}"></i>`;
            const nameSpan = document.createElement('span');
            nameSpan.classList.add('link_name');
            nameSpan.textContent = page.nombre;
            iconSpan.appendChild(nameSpan); // Se agrega el 'link_name' dentro de 'icon_name'
            iconLinks.appendChild(iconSpan);
        }

        li.appendChild(iconLinks);

        if (page.submenu) {
            // Si tiene submenús, crea el elemento 'arrow'
            const arrow = document.createElement('i');
            arrow.classList.add('fas', 'fa-chevron-down', 'arrow');
            iconLinks.appendChild(arrow);
        }
        return li;
    }



    // Itera sobre los elementos del objeto 'paginas'
    for (const pageName in paginas) {
        const page = paginas[pageName];

        // Crea el elemento principal del menú
        const mainMenuItem = crearElementoMenu(page);

        // Determina si tiene submenús
        if (page.submenus) {
            function crearSubMenu(submenuItems) {
                const subMenu = document.createElement('ul');
                subMenu.classList.add('sub-menu');

                // Obtiene el nombre del submenú directamente del objeto 'page'
                const subMenuNombre = page.nombre;

                const subHeader = document.createElement('h6');
                subHeader.classList.add('sub-header');
                subHeader.textContent = subMenuNombre;
                subMenu.appendChild(subHeader);

                for (const submenuItemName in submenuItems) {
                    const submenuItem = submenuItems[submenuItemName];
                    const li = document.createElement('li');


                    if (submenuItem.url) {
                        const link = document.createElement('a');
                        link.href = submenuItem.url;
                        // Cambia la clase del icono según sea necesario
                        link.innerHTML = `<i class="${submenuItem.icon}"></i> ${submenuItem.nombre}`;
                        li.appendChild(link);
                    } else if (submenuItem.id) {
                        // Si tiene un ID, se lo asigna al elemento 'span'
                        const span = document.createElement('span');
                        span.classList.add('ps-3');
                        span.id = submenuItem.id;
                        span.textContent = submenuItem.nombre;
                        li.appendChild(span);
                    } else {
                        const span = document.createElement('span');
                        span.classList.add('ps-3');
                        span.textContent = submenuItem.nombre;
                        li.appendChild(span);
                    }
                    subMenu.appendChild(li);
                }

                return subMenu;
            }

            const subMenu = crearSubMenu(page.submenus);
            mainMenuItem.appendChild(subMenu);
        }

        // Agrega el elemento creado al contenedor de la lista
        navList.appendChild(mainMenuItem);
    }

    // Obtienes el contenedor de la lista del menú móvil
    const menuMovilContainer = document.getElementById('menu-movil');
    const navListMovil = menuMovilContainer.querySelector('.nav');

    // Función para crear el menú móvil (basada en la estructura del menú principal)
    function crearMenuMovil(paginas) {
        // Itera sobre los elementos del objeto 'paginas'
        for (const pageName in paginas) {
            const page = paginas[pageName];

            // Crea el elemento principal del menú
            const mainMenuItem = crearElementoMenu(page);

            // Determina si tiene submenús
            if (page.submenus) {
                const subMenu = crearSubMenu(page.submenus, page);
                mainMenuItem.appendChild(subMenu);

                // Lógica para mostrar/ocultar submenús en el menú móvil

            }

            // Agrega el elemento creado al contenedor de la lista del menú móvil
            navListMovil.appendChild(mainMenuItem);
        }
    }

    // Llama a la función para crear el menú
    crearMenuMovil(paginas);
</script>
<!-- FIN Script Dinamismo entre Menu Móvil y Menú Ordenador -->


<!-- Inicio Script Flechas de los SubMenús -->
<script>
    // Obtener todas las flechas y submenús
    const arrows = document.querySelectorAll('.arrow');
    const subMenus = document.querySelectorAll('.sub-menu');

    // Recorrer cada flecha y aplicar el evento de clic
    for (let i = 0; i < arrows.length; i++) {
        const arrow = arrows[i];
        const subMenu = subMenus[i];

        arrow.addEventListener('click', () => {
            // Mostrar u ocultar el submenú
            subMenu.classList.toggle('show');

            // Rotar la flecha
            arrow.classList.toggle('rotate');
        });
    }
</script>
<!-- FIN Script Flechas de los SubMenús -->