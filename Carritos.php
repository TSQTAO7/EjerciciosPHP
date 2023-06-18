<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
    // Número de pilotos
    define("NUM_PILOTOS", 23);

    // Arreglos con los tiempos obtenidos por los pilotos en cada prueba
    $tiempos_primer_dia = array();
    $tiempos_segundo_dia = array();

    // Generar tiempos aleatorios para cada piloto en los dos días de prueba
    for ($i = 0; $i < NUM_PILOTOS; $i++) {
        $tiempos_dia1 = array();
        $tiempos_dia2 = array();

        // Generar tiempos aleatorios para el primer día
        for ($j = 0; $j < 2; $j++) {
            $tiempos_dia1[] = mt_rand(60000, 70000) / 1000; // Genera un número aleatorio entre 60 y 70 segundos con tres decimales
        }

        // Generar tiempos aleatorios para el segundo día
        for ($j = 0; $j < 2; $j++) {
            $tiempos_dia2[] = mt_rand(60000, 70000) / 1000;
        }

        $tiempos_primer_dia[] = $tiempos_dia1;
        $tiempos_segundo_dia[] = $tiempos_dia2;
    }

    // Calcular promedios de tiempos de cada piloto en los dos días de prueba
    $promedios = array();
    for ($i = 0; $i < NUM_PILOTOS; $i++) {
        $promedio_dia1 = array_sum($tiempos_primer_dia[$i]) / count($tiempos_primer_dia[$i]);
        $promedio_dia2 = array_sum($tiempos_segundo_dia[$i]) / count($tiempos_segundo_dia[$i]);
        $promedios[] = ($promedio_dia1 + $promedio_dia2) / 2;
    }

    // Identificar las vueltas ideales para cada piloto
    $vueltas_ideales = array();
    for ($i = 0; $i < NUM_PILOTOS; $i++) {
        $vuelta_ideal = min(min($tiempos_primer_dia[$i]), min($tiempos_segundo_dia[$i]));
        $vueltas_ideales[] = $vuelta_ideal;
    }

    // Encontrar el piloto con la vuelta ideal más rápida
    $ganador_indice = array_search(min($vueltas_ideales), $vueltas_ideales);
    ?>

    <table>
        <tr>
            <th>Piloto</th>
            <th>Promedio (s)</th>
            <th>Vuelta ideal (s)</th>
        </tr>
        <?php for ($i = 0; $i < NUM_PILOTOS; $i++) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo number_format($promedios[$i], 3); ?></td>
            <td><?php echo number_format($vueltas_ideales[$i], 3); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
