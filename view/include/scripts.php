<!-- SCRIPT BOTON DEL NAVBAR -->

<script>
    /*SCRIPT BOTON SIDE MENU*/
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    let srcBtn = document.querySelector('.bx-search');

    btn.onclick = function() {
        sidebar.classList.toggle('active');
    }

    // Función para verificar el ancho de la pantalla y aplicar la clase "d-none" según corresponda
    function toggleSidebarVisibility() {
        if (window.innerWidth <= 991) {
            sidebar.classList.add('d-none'); // Agrega la clase "d-none"
        } else {
            sidebar.classList.remove('d-none'); // Elimina la clase "d-none"
        }
    }

    // Ejecuta la función al cargar la página y cuando se redimensiona la ventana
    toggleSidebarVisibility();
    window.addEventListener('resize', toggleSidebarVisibility);
</script>


<!-- SCRIPT CHART JS-->
<script>
    /*SCRIPT CHART JS*/
    $(document).ready(function() {
        // Verificamos si existe el elemento 'myChart' 
        if ($('#myChart').length > 0) {
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Juan', 'Ricardo', 'Robert', 'Jorge'],
                    datasets: [{
                        label: 'Ventas Concluidas',
                        data: [12, 19, 3, 5],
                        borderColor: '#d64343',
                        borderWidth: 2,
                        backgroundColor: ['#ad28286c', '#2866ad6c', '#28ad816c', '#ad5d286c'],
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    animations: {
                        radius: {
                            duration: 400,
                            easing: 'linear',
                            loop: (context) => context.active
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }

                }
            });
        }

        if ($('#myChart2').length > 0) {
            const ctx = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Juan', 'Ricardo', 'Robert', 'Jorge'],
                    datasets: [{
                        label: 'Ventas Concluidas',
                        data: [12, 19, 3, 5],
                        borderColor: '#d64343',
                        borderWidth: 2,
                        backgroundColor: ['#ad28286c', '#2866ad6c', '#28ad816c', '#ad5d286c'],
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    animations: {
                        radius: {
                            duration: 400,
                            easing: 'linear',
                            loop: (context) => context.active
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    family: 'Poppins',
                                    size: 14
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }

                }
            });
        }
    });
</script>

<script>
    function restrictInput(inputField, event) {
        // Allow backspace, tab, escape, delete, arrow keys (left, up, right, down)
        if (event.key === 'Backspace' || event.key === 'Tab' || event.key === 'Escape' || event.key === 'Delete' ||
            event.key === 'ArrowLeft' || event.key === 'ArrowUp' || event.key === 'ArrowRight' || event.key === 'ArrowDown') {
            return true;
        }

        // Allow numbers, commas, and not decimal point (.)
        if (event.key >= '0' && event.key <= '9' || event.key === ',' ) {
            return true;
        }

        // Prevent other characters
        event.preventDefault();
        return false;
    }
</script>