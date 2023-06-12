<!DOCTYPE html>
<html>
<head>
    <title>Transmilenio - Estadísticas</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Transmilenio - Estadísticas</h1>

    <?php
    // Información de los buses
    $buses = array(
        array("ruta" => "a", "pasajeros" => 50, "consumo_gasolina" => 10),
        array("ruta" => "b", "pasajeros" => 30, "consumo_gasolina" => 8),
        array("ruta" => "c", "pasajeros" => 40, "consumo_gasolina" => 12),
        // Agrega más buses si es necesario
    );

    // Cantidad de buses por ruta
    $cantidadBusesPorRuta = array(
        "a" => 0,
        "b" => 0,
        "c" => 0
    );

    // Cantidad de pasajeros movilizados por ruta
    $cantidadPasajerosPorRuta = array(
        "a" => 0,
        "b" => 0,
        "c" => 0
    );

    // Cantidad de combustible consumido por los buses y por ruta
    $cantidadCombustiblePorRuta = array(
        "a" => 0,
        "b" => 0,
        "c" => 0
    );

    // Calcular las cantidades
    foreach ($buses as $bus) {
        $ruta = $bus["ruta"];
        $pasajeros = $bus["pasajeros"];
        $consumoGasolina = $bus["consumo_gasolina"];

        // Cantidad de buses por ruta
        $cantidadBusesPorRuta[$ruta]++;

        // Cantidad de pasajeros movilizados por ruta
        $cantidadPasajerosPorRuta[$ruta] += $pasajeros;

        // Cantidad de combustible consumido por los buses y por ruta
        $cantidadCombustiblePorRuta[$ruta] += $consumoGasolina;
    }
    ?>

    <h2>Cantidad de buses por ruta</h2>
    <table>
        <tr>
            <th>Ruta</th>
            <th>Cantidad de Buses</th>
        </tr>
        <?php foreach ($cantidadBusesPorRuta as $ruta => $cantidadBuses) { ?>
            <tr>
                <td><?php echo $ruta; ?></td>
                <td><?php echo $cantidadBuses; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Cantidad de pasajeros movilizados por ruta</h2>
    <table>
        <tr>
            <th>Ruta</th>
            <th>Cantidad de Pasajeros</th>
        </tr>
        <?php foreach ($cantidadPasajerosPorRuta as $ruta => $cantidadPasajeros) { ?>
            <tr>
                <td><?php echo $ruta; ?></td>
                <td><?php echo $cantidadPasajeros; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Cantidad de combustible consumido por los buses y por ruta</h2>
    <table>
        <tr>
            <th>Ruta</th>
            <th>Cantidad de Combustible (galones)</th>
        </tr>
            <?php foreach ($cantidadCombustiblePorRuta as $ruta => $cantidadCombustible) { ?>
        <tr>
            <td><?php echo $ruta; ?></td>
            <td><?php echo $cantidadCombustible; ?></td>
        </tr>
            <?php } ?>
    </table>

</body>
</html>
