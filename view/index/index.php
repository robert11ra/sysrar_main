<!DOCTYPE html>
<html lang="es">

<head>

    <title>SYSRAR - Inicio</title>

    <?php include '../include/head.php' ?>

</head>

<body id="tasa">
    <?php include '../include/nav.php' ?>

    <div id="gif-carga" class="container-fluid ocultar cont-desktop">
        <div class="main-container d-flex flex-column">
            <div class="col ps-4" id="dashboard">
                <h3 class="m-0">Inicio</h3>
                <p class="text-muted">Dashboard</p>
            </div>

            <div class="row mt-3 p-3">
                <ul class="nav nav-dash nav-tabs rounded mb-4 p-1" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Inicio</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Productos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Reportes</button>
                    </li>
                </ul>
                <div class="tab-content p-0" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row justify-content-center">

                            <div class="col-12 col-md-6 col-xl-3 col-xxl-3 mb-3">
                                <div class="card card-dash border shadow-sm px-1 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash m-0 d-flex">
                                        <div class="col-10">
                                            <p class="fs-5 m-0">Ordenes de Compra</p>
                                        </div>
                                        <div class="col-2 text-center"><i class="dash-i fa-solid fa-chevron-right arrow-dash"></i></div>
                                        <div class="col-12 mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount">$50.154.658<span class="profit-pill win ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $47.854.214</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 col-xxl-3 mb-3">
                                <div class="card card-dash border shadow-sm px-1 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash m-0 d-flex">
                                        <div class="col-10">
                                            <p class="fs-5 m-0">Ventas Totales</p>
                                        </div>
                                        <div class="col-2 text-center"><i class="dash-i fa-solid fa-chevron-right arrow-dash"></i></div>
                                        <div class="col-12 mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 col-xxl-3 mb-3">
                                <div class="card card-dash border shadow-sm px-1 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash m-0 d-flex">
                                        <div class="col-10">
                                            <p class="fs-5 m-0">Ingresos Totales</p>
                                        </div>
                                        <div class="col-2 text-center"><i class="dash-i fa-solid fa-chevron-right arrow-dash"></i></div>
                                        <div class="col-12 mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$50.154.658<span class="profit-pill win ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $47.854.214</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 col-xxl-3 mb-3">
                                <div class="card card-dash border shadow-sm px-1 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash m-0 d-flex">
                                        <div class="col-10">
                                            <p class="fs-5 m-0">Ganancias Totales</p>
                                        </div>
                                        <div class="col-2 text-center"><i class="dash-i fa-solid fa-chevron-right arrow-dash"></i></div>
                                        <div class="col-12 mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6 col-xl-7 mb-3">
                                <div class="card border shadow-sm px-3 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash">
                                        <div class="col-5 col-lg-8">
                                            <p class="fs-5 m-0">Analisis de Ventas</p>
                                        </div>
                                        <div class="col-7 col-lg-4 chart-link">
                                            <p>Ver Detalles <i class="fa-solid fa-chevron-right arrow-dash"></i></p>
                                        </div>
                                    </a>
                                    <div class="d-flex flex-wrap chart-dash link-dash mb-5">
                                        <div class="px-2 one mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                        <div class="px-2 one mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                        <div class="px-2 two mt-3">
                                            <div class="card-d-info">
                                                <div class="input-group mb-3">
                                                    <i class="btn btn-light border fa-regular pt-2 fa-calendar"></i>
                                                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                                        <option value="today">Hoy</option>
                                                        <option value="week" selected>Esta semana</option>
                                                        <option value="month">Este mes</option>
                                                        <option value="year">Este año</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <canvas id="myChart" style="height: auto;"></canvas>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-5 mb-3">
                                <div class="card border shadow-sm pt-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash px-4 mb-4">
                                        <div class="col-9">
                                            <p class="fs-5 m-0">Entregas programadas</p>
                                        </div>
                                        <div class="col-3 fs-5 text-end">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </a>
                                    <div class="col-12 main-item-height">
                                        <div class="d-flex flex-wrap px-3 mb-5">
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Lun, 25 Mar</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">07:00 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Viveres</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Robert Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                        <div class="row">
                            <div class="col-12 col-lg-6 col-xl-7 mb-3">
                                <div class="card border shadow-sm px-3 py-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash">
                                        <div class="col-5 col-lg-8">
                                            <p class="fs-5 m-0">Analisis de Ventas</p>
                                        </div>
                                        <div class="col-7 col-lg-4 chart-link">
                                            <p>Ver Detalles <i class="fa-solid fa-chevron-right arrow-dash"></i></p>
                                        </div>
                                    </a>
                                    <div class="d-flex flex-wrap chart-dash link-dash mb-5">
                                        <div class="px-2 one mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                        <div class="px-2 one mt-3">
                                            <div class="card-d-info">
                                                <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                                <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                            </div>
                                        </div>
                                        <div class="px-2 two mt-3">
                                            <div class="card-d-info">
                                                <div class="input-group mb-3">
                                                    <i class="btn btn-light border fa-regular pt-2 fa-calendar"></i>
                                                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                                        <option value="today">Hoy</option>
                                                        <option value="week" selected>Esta semana</option>
                                                        <option value="month">Este mes</option>
                                                        <option value="year">Este año</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-height: 50vh;">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-5 mb-3">
                                <div class="card border shadow-sm pt-3">
                                    <a href="usuarios/usuarios.php" class="row link-dash px-4 mb-4">
                                        <div class="col-9">
                                            <p class="fs-5 m-0">Entregas programadas</p>
                                        </div>
                                        <div class="col-3 fs-5 text-end">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </a>
                                    <div class="col-12 main-item-height">
                                        <div class="d-flex flex-wrap px-3 mb-5">
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Lun, 25 Mar</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">07:00 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Viveres</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Robert Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                            <div class="item-container">
                                                <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                                    <p class="text-muted m-0">Mar, 18 Abr</p>
                                                    <p class="fw-bold m-0" style="font-size: 1.35rem;">09:30 AM</p>
                                                </div>
                                                <a href="#" class="col-12 col-md-8 col-lg-9 order-one  item-deliver">
                                                    <p class="fw-bold fs-5 mb-0">Cargamento de Carne</p>
                                                    <p class="text-muted">Encargado: <span class="text-black">Adrian Rincon</span></p>
                                                    <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- <div class="row g-1 align-items-stretch">
                            <div class="col-12 col-lg-6 col-xl-7 card border shadow-sm p-3 d-flex flex-wrap mb-3">
                                <a href="usuarios/usuarios.php" class="row link-dash">
                                    <div class="col-5 col-lg-8">
                                        <p class="fs-5 m-0">Analisis de Ventas</p>
                                    </div>
                                    <div class="col-7 col-lg-4 chart-link">
                                        <p>Ver Detalles <i class="fa-solid fa-chevron-right arrow-dash"></i></p>
                                    </div>
                                </a>
                                <div class="d-flex flex-wrap chart-dash link-dash mb-5">
                                    <div class="px-2 one mt-3">
                                        <div class="card-d-info">
                                            <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                            <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                        </div>
                                    </div>
                                    <div class="px-2 one mt-3">
                                        <div class="card-d-info">
                                            <p class="info-amount ">$12.145.547<span class="profit-pill lose ms-3"><i class="fa-solid pe-1 fa-arrow-trend-up"></i> 25.2%</span></p>
                                            <p class="text-prev fw-bold mb-0">vs Ultimo Mes: <span class="text-black"> $15.475.221</span></p>
                                        </div>
                                    </div>
                                    <div class="px-2 two mt-3">
                                        <div class="card-d-info">
                                            <div class="input-group mb-3">
                                                <i class="btn btn-light border fa-regular pt-2 fa-calendar"></i>
                                                <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                                                    <option value="today">Hoy</option>
                                                    <option value="week" selected>Esta semana</option>
                                                    <option value="month">Este mes</option>
                                                    <option value="year">Este año</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <canvas id="myChart2" style="height: auto;"></canvas>
                            </div>

                            <div class="div-2 col-12 col-lg-6 col-xl-5 card border shadow-sm p-3 d-flex mb-3">
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                                <div class="item-container">

                                    <a href="#" class="col-12 col-md-8 col-lg-9 order-one item-deliver">
                                        <p class="fw-bold fs-5 mb-0">Pantalla Samsung A10 OLED</p>
                                        <p class="text-muted">Piezas: <span class="text-black">42 und</span></p>
                                        <i class="fa-solid fa-chevron-right arrow-dash"></i>
                                    </a>
                                    <div class="col-12 col-md-4 col-lg-3 order-two item-time-container text-center">
                                        <p class="text-muted m-0">Total</p>
                                        <p class="fw-bold m-0" style="font-size: 1.35rem;">$ 560.69</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                </div>

            </div>
        </div>
    </div>
</body>


<!-- LINK BOOTSTRAP 5 JS Y JQUERY-->
<?php include '../include/footer.php' ?>
<?php include '../include/scripts.php' ?>

<!-- Footer end -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>