<?php

$llamadas = [
    ["zona" => "América del norte", "minutos" => 5],
    ["zona" => "América Central", "minutos" => 3],
    ["zona" => "Europa", "minutos" => 7],
    ["zona" => "América del Sur", "minutos" => 10],
    ["zona" => "Asia", "minutos" => 4],
    ["zona" => "África", "minutos" => 2],
    ["zona" => "Oceanía", "minutos" => 6]
];


$precios = [
    "América del norte" => ["primeros_minutos" => 1500, "minutos_adicionales" => 1000],
    "América Central" => ["primeros_minutos" => 2000, "minutos_adicionales" => 1500],
    "América del Sur" => ["primeros_minutos" => 3500, "minutos_adicionales" => 3000],
    "Europa" => ["primeros_minutos" => 3000, "minutos_adicionales" => 2500],
    "Asia" => ["primeros_minutos" => 6000, "minutos_adicionales" => 4500],
    "África" => ["primeros_minutos" => 5000, "minutos_adicionales" => 3000],
    "Oceanía" => ["primeros_minutos" => 4000, "minutos_adicionales" => 2800]
];

$totalLlamadasPorZona = [];
$cantidadLlamadasEuropa = 0;
$totalPagoAmCentral = 0;
$totalRecogido = 0;
$pagosPorUsuario = [];


foreach ($llamadas as $llamada) {
    $zona = $llamada['zona'];
    $minutos = $llamada['minutos'];


    $costo = $minutos <= 3 ? $precios[$zona]['primeros_minutos'] : ($precios[$zona]['primeros_minutos'] + ($minutos - 3) * $precios[$zona]['minutos_adicionales']);


    if (!isset($totalLlamadasPorZona[$zona])) {
        $totalLlamadasPorZona[$zona] = 1;
    } else {
        $totalLlamadasPorZona[$zona]++;
    }

    if ($zona == "Europa") {
        $cantidadLlamadasEuropa++;
    }

    if ($zona == "América Central") {
        $totalPagoAmCentral += $costo;
    }

    $totalRecogido += $costo;

    $pagosPorUsuario[] = [
        "zona" => $zona,
        "minutos" => $minutos,
        "costo" => $costo
    ];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Costo de Llamadas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Calculadora de Costo de Llamadas</h1>

        <h2 class="mt-4">Tabla de Costos por Minuto</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Zona</th>
                    <th>Precio por Minuto (3 primeros minutos)</th>
                    <th>Precio por Minuto (4 en adelante)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>América del Norte</td>
                    <td>1500</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>América Central</td>
                    <td>2000</td>
                    <td>1500</td>
                </tr>
                <tr>
                    <td>América del Sur</td>
                    <td>3500</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>Europa</td>
                    <td>3000</td>
                    <td>2500</td>
                </tr>
                <tr>
                    <td>Asia</td>
                    <td>6000</td>
                    <td>4500</td>
                </tr>
                <tr>
                    <td>África</td>
                    <td>5000</td>
                    <td>3000</td>
                </tr>
                <tr>
                    <td>Oceanía</td>
                    <td>4000</td>
                    <td>2800</td>
                </tr>
            </tbody>
        </table>

        <h2 class="mt-4">Calcular Costo de Llamada</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="minutos">Minutos:</label>
                <input type="number" class="form-control" id="minutos" name="minutos" required>
            </div>
            <div class="form-group">
                <label for="zona">Zona:</label>
                <select class="form-control" id="zona" name="zona" required>
                    <option value="americadelnorte">América del Norte</option>
                    <option value="americacentral">América Central</option>
                    <option value="americadelsur">América del Sur</option>
                    <option value="europa">Europa</option>
                    <option value="asia">Asia</option>
                    <option value="africa">África</option>
                    <option value="oceania">Oceanía</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $minutos = $_POST['minutos'];
            $zona = $_POST['zona'];


            $costosPorMinuto = array(
                'americadelnorte' => array('precio_fijo' => 1500, 'precio_adicional' => 1000),
                'americacentral' => array('precio_fijo' => 2000, 'precio_adicional' => 1500),
                'americadelsur' => array('precio_fijo' => 3500, 'precio_adicional' => 3000),
                'europa' => array('precio_fijo' => 3000, 'precio_adicional' => 2500),
                'asia' => array('precio_fijo' => 6000, 'precio_adicional' => 4500),
                'africa' => array('precio_fijo' => 5000, 'precio_adicional' => 3000),
                'oceania' => array('precio_fijo' => 4000, 'precio_adicional' => 2800)
            );

            $precioFijo = $costosPorMinuto[$zona]['precio_fijo'];
            $precioAdicional = $costosPorMinuto[$zona]['precio_adicional'];
            $costo = $minutos <= 3 ? $precioFijo : $precioFijo + ($minutos - 3) * $precioAdicional;

 
            echo '<h2 class="mt-4">Resultado</h2>';
            echo '<p>Minutos: ' . $minutos . '</p>';
            echo '<p>Zona: ' . ucwords(str_replace('del', 'del ', $zona)) . '</p>';
            echo '<p>Costo: $' . $costo . '</p>';


            $consultaActual = array(
                'minutos' => $minutos,
                'zona' => $zona,
                'costo' => $costo
            );

            $consultasAnteriores = isset($_SESSION['consultas']) ? $_SESSION['consultas'] : array();

  
            array_push($consultasAnteriores, $consultaActual);


            $_SESSION['consultas'] = $consultasAnteriores;

            if (!empty($consultasAnteriores)) {
                echo '<h2 class="mt-4">Consultas Anteriores</h2>';
                echo '<table class="table table-bordered">';
                echo '<thead class="thead-dark">';
                echo '<tr>';
                echo '<th>Minutos</th>';
                echo '<th>Zona</th>';
                echo '<th>Costo</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($consultasAnteriores as $consulta) {
                    echo '<tr>';
                    echo '<td>' . $consulta['minutos'] . '</td>';
                    echo '<td>' . ucwords(str_replace('del', 'del ', $consulta['zona'])) . '</td>';
                    echo '<td>' . $consulta['costo'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>
</body>
</html>

