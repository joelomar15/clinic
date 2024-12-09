<?php
function obtenerNombreMes($numeroMes)
{
    $meses = [
        1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio",
        7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
    ];

    // Verifica que el número del mes sea válido
    if ($numeroMes >= 1 && $numeroMes <= 12) {
        return $meses[$numeroMes];
    } else {
        return "Mes inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rol de Pagos -
        <?php echo $datos[0]["nombre"] . ' ' . $datos[0]["apellido"]; ?>
    </title>
    <!-- Agrega estilos CSS aquí -->
    <style>
        /* Estilos para el cuerpo del documento */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla1 {
            width: 90%;
            margin-left: 5%;
        }

        .tabla1 tr td {
            border: none;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Logo -->


    <!-- Número de factura aleatorio -->
    <center>
        <h2>Gestión de Recursos Humanos</h2>
    </center>
    <br>

    <table class="tabla1" width="100%">
        <tr>
            <td width="70%"><!-- Datos del empleado -->
                <h3>Datos del Empleado:</h3>
                <p><b>Nombre:</b>
                    <?php echo $datos[0]["nombre"]; ?>
                </p>
                <p><b>Apellido:</b>
                    <?php echo $datos[0]["apellido"]; ?>
                </p>
                <p><b>Cédula:</b>
                    <?php echo $datos[0]["cedula"]; ?>
                </p>
                <p><b>Email:</b>
                    <?php echo $datos[0]["email"]; ?>
                </p>
            </td>
            <td style="text-align: right;">
                <img src="<?php echo base_url() . "template/logo.png"; ?>" width="50%" height="20%">
            </td>
        </tr>
    </table>



    <!-- Anticipos -->
    <h3>Descripción:</h3>
    <table>
        <thead>
            <tr>
                <th>Nº</th>
                <th>Empleado</th>
                <th>Mes</th>
                <th>Año</th>
                <th>Fecha de Registro</th>
                <!-- Más encabezados si es necesario -->
            </tr>
        </thead>
        <tbody>
            <!-- Filas de anticipos -->
            <tr>
                <td>1</td>
                <td>
                    <?php echo $datos[0]["nombre"] . ' ' . $datos[0]["apellido"]; ?>
                </td>
                <td>
                    <?php echo obtenerNombreMes($datos[0]["mes"]); ?>
                </td>
                <td>
                    <?php echo $datos[0]["anio"]; ?>
                </td>
                <td>
                    <?php echo $datos[0]["fechaPago"]; ?>
                </td>
                <!-- Más datos si es necesario -->
            </tr>
            <!-- Más filas de anticipos si es necesario -->
        </tbody>
    </table>

<br><br>
    <!-- Monto Total -->
    <h3>Monto Total: $
        <?php echo $datos[0]["montoPagar"]; ?>
    </h3>

</body>

</html>