<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo_<?php echo $client['id_bill']; ?></title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            position: relative;
            width: 100%;
            /* Adjust the width as needed */
            font-size: small;

            margin: 0 auto;
            /* Center the container horizontally */
        }

        .config,
        .client {
            position: absolute;
            padding: 15px;
            top: 50px;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .config {
            width: 45%;
            left: 0;
        }

        .client {
            width: 55%;
            right: -30px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 5px;
        }

        strong {
            font-weight: bold;
        }

        table {
            width: 100%;
            padding: 0 10px 0 10px;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .invoice-title {
            display: block;
            text-align: left;
            padding-left: 15px;
            font-size: 2rem;
            font-weight: bold;
            margin: 0px 0 20px 0;
        }

        .info-box p {
            margin: 0;
        }

        .total-row {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .client-info p {
            display: inline-block;
            width: 48%;
            /* Adjust as needed */
        }

        .client-info p.left {
            text-align: left;
        }


        .client-info p.full-width {
            width: 100%;
            text-align: left;
        }

        footer {
            text-align: center;
        }

        #logo {
            width: 200px;
            height: auto;
        }

        .anulada {
            color: red;
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-title">Recibo #<?php echo $client['id_bill']; ?></div>

        <div class="info-box">
            <div class="config">
                <p><strong><?php echo $config['company_name']; ?></strong></p>
                <p><?php echo $config['rif']; ?></p>
                <p><?php echo $config['company_address']; ?></p>
                <p><?php echo $config['company_phone']; ?></p>
            </div>

            <div class="client client-info">
                <p class="left"><strong>Nombre:</strong> <?php echo $client['client_name']; ?></p>
                <p class="left"><strong>Estado:</strong> <?php echo $client['status']; ?></p>
                <p class="left"><strong>Cedula:</strong> <?php echo $client['client_ced']; ?></p>
                <p class="left"><strong>Vendedor:</strong> <?php echo $client['user_name']; ?></p>
                <p class="left"><strong>Telefono:</strong> <?php echo $client['client_phone']; ?></p>
                <p class="left"><strong>Fecha:</strong> <?php echo $client['date_created']; ?></p>
                <p class="left"><strong>Venta:</strong> <?php echo $client['client_type']; ?></p>
                <p class="left"><strong>Retiro:</strong> <?php echo $client['retiro']; ?></p>
            </div>
        </div>
        <?php if ($client['comments']) {
        ?>
            <p class="anulada">ANULADA</p>
        <?php } ?>
        <table style="margin-top: 10rem;" class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unit. ($)</th>
                    <th>Precio Unit. (Bs)</th>
                    <th>Total ($)</th>
                    <th>Total (Bs)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['product_name']; ?></td>
                        <td><?php echo $producto['quantity']; ?></td>
                        <td><?php echo $producto['sell_price']; ?></td>
                        <td><?php echo $producto['sell_price_bs']; ?></td>
                        <td><?php echo $producto['product_total']; ?></td>
                        <td><?php echo $producto['product_totalbs']; ?></td>
                    </tr>
                <?php } ?>
                <tr class="total-row">
                    <td>Cantidad de productos:</td>
                    <td><?php echo $producto['total_quantity']; ?></td>
                    <td colspan="2" style="text-align: right;">Total:</td>
                    <td><?php echo $client['total'] ?></td>
                    <td><?php echo $client['total_bs'] ?></td>
                </tr>
            </tbody>
        </table>

        <table style="margin-top: 3rem; width: 60%;" class="table">
            <thead>
                <tr>
                    <th>Metodos de pago</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($payments as $payment) {
                ?>
                    <tr>
                        <th><?php echo $payment['payment_method']; ?></th>
                        <?php
                        if ($payment['currency'] == '1') {
                        ?>
                            <td><?php echo $payment['monto'] . ' (' . $payment['cambio'] . '$)'; ?></td>
                        <?php
                        } else {
                        ?>
                            <td><?php echo $payment['monto']; ?></td>

                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                if ($client['status'] == 'Pendiente') {
                ?>
                    <tr>
                        <th>Pendiente</th>
                        <td><?php echo $pendiente . '($) - ' . $pendiente_bs . '(Bs)'; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        if ($cashbacks[0]['back_usd'] != '0' || $cashbacks[0]['back_bs'] != '0') {


        ?>
            <table style="margin-top: 3rem; width: 40%;" class="table">
                <thead>
                    <tr>
                        <th>Cambio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cashbacks as $cashback) {
                        if (!$cashback['method_bs']) {
                            $cashback['method_bs'] = '';
                        } else {
                            if ($cashback['back_bs'] == '0') {
                                $cashback['method_bs'] = '';
                            } else {
                                $cashback['method_bs'] = ' - ' . $cashback['method_bs'];
                            }
                        }
                    ?>
                        <tr>
                            <td><?php echo $cashback['back_usd'] . ' ($)'; ?></td>
                        </tr>
                        <?php if ($cashback['back_bs'] > '0') {
                        ?>
                            <tr>
                                <td><?php echo $cashback['back_bs'] . ' (Bs' . $cashback['method_bs'] . ')'; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
    <footer>
        <?php if ($client['comments']) {
        ?>
            <p class="anulada">ANULADA</p>
            <p>Motivo:<?php echo $client['comments']; ?></p>
            <p><strong>Nota: Productos han sido devueltos al inventario</strong></p>
        <?php } else { ?>
            <h1>Gracias por su compra!</h1>
        <?php }; ?>
    </footer>


</body>

</html>