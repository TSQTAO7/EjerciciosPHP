<?php

// Punto 1: Imprimir todos los múltiplos de 3 que hay entre 1 y 100.
for ($i = 1; $i <= 100; $i++) {
  if ($i % 3 == 0) {
    echo $i . " ";
  }
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 2: Imprimir los números impares entre 0 y 100.
for ($i = 1; $i <= 100; $i += 2) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 3: Imprimir los números del 1 al 3.
for ($i = 1; $i <= 3; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 4: Imprimir los números del 1 al 9.
for ($i = 1; $i <= 9; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 5: Imprimir los números del 1 al 10,000.
for ($i = 1; $i <= 10000; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 6: Imprimir los números del 5 al 10.
for ($i = 5; $i <= 10; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 7: Imprimir los números del 5 al 15.
for ($i = 5; $i <= 15; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 8: Imprimir los números del 5 al 15,000.
for ($i = 5; $i <= 15000; $i++) {
  echo $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 9: Imprimir "hola" 200 veces.
for ($i = 0; $i < 200; $i++) {
  echo "hola ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 10: Imprimir los cuadrados de los números del 1 al 30.
for ($i = 1; $i <= 30; $i++) {
  echo $i * $i . " ";
}
echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 11: Multiplicar los 20 primeros números naturales.
$resultado = 1;
for ($i = 1; $i <= 20; $i++) {
  $resultado *= $i;
}
echo "El resultado de la multiplicación es: " . $resultado . "\n";
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 12: Sumar los cuadrados de los cien primeros números naturales.
$suma = 0;
for ($i = 1; $i <= 100; $i++) {
  $suma += ($i * $i);
}
echo "La suma de los cuadrados de los cien primeros números naturales es: " . $suma . "\n";
echo "<br>";
echo "<br>";
echo "<br>";
?>
// Punto 13: Escribir un programa en PHP que lea un número entero desde teclado y realiza la suma de los 100 números siguientes, mostrando el resultado en pantalla.
<!DOCTYPE html>
<html>
<head>
    <title>Suma de los siguientes 100 números</title>
</head>
<body>
    <h1>Suma de los siguientes 100 números</h1>

    <form method="post" action="">
        <label for="numero">Ingresa un número entero:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Calcular suma</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener el número entero desde el formulario
        $numero = intval($_POST['numero']);

        // Inicializar la variable de suma
        $suma = 0;

        // Realizar la suma de los siguientes 100 números
        for ($i = $numero; $i < $numero + 100; $i++) {
            $suma += $i;
        }

        // Mostrar el resultado en pantalla
        echo "<p>La suma de los 100 números siguientes a $numero es: $suma</p>";
    }
    ?>
    <br><br><br>
</body>
</html>
<?php
// Punto 14: Implemente una sentencia switch que escriba un mensaje en cada caso (10 opciones). Inclúyala en un bucle de prueba for (5 repeticiones). Utilice también un break tras cada caso y pruébelo.

// Bucle de prueba for (5 repeticiones)
for ($i = 1; $i <= 5; $i++) {
    echo "Iteración: $i<br>";

    // Generar un número aleatorio del 1 al 10
    $opcion = rand(1, 10);

    // Sentencia switch con 10 opciones
    switch ($opcion) {
        case 1:
            echo "Opción 1 seleccionada<br>";
            break;
        case 2:
            echo "Opción 2 seleccionada<br>";
            break;
        case 3:
            echo "Opción 3 seleccionada<br>";
            break;
        case 4:
            echo "Opción 4 seleccionada<br>";
            break;
        case 5:
            echo "Opción 5 seleccionada<br>";
            break;
        case 6:
            echo "Opción 6 seleccionada<br>";
            break;
        case 7:
            echo "Opción 7 seleccionada<br>";
            break;
        case 8:
            echo "Opción 8 seleccionada<br>";
            break;
        case 9:
            echo "Opción 9 seleccionada<br>";
            break;
        case 10:
            echo "Opción 10 seleccionada<br>";
            break;
        default:
            echo "Opción inválida<br>";
            break;
    }
    echo "<br>";
}
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 15: Dada la serie de números naturales de Fibonacci: Sucesión: 1, 1, 2, 3, 5, 8, 13, 21... diseñar un algoritmo que pida un número natural y calcule e imprima la serie hasta el número ingresado.


// Función para calcular la serie de Fibonacci hasta un número dado
function fibonacci($numero)
{
    // Casos base
    if ($numero == 1) {
        return [1];
    }
    if ($numero == 2) {
        return [1, 1];
    }

    // Inicializar los primeros dos números de la serie
    $fibonacci = [1, 1];

    // Calcular los siguientes números de Fibonacci
    for ($i = 2; $i < $numero; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el número natural desde el formulario
    $numeroNatural = intval($_POST['numero']);

    // Calcular la serie de Fibonacci hasta el número ingresado
    $serieFibonacci = fibonacci($numeroNatural);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Serie de Fibonacci</title>
</head>
<body>
    <h1>Serie de Fibonacci</h1>

    <form method="post" action="">
        <label for="numero">Ingresa un número natural:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Calcular serie</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php if (isset($serieFibonacci)): ?>
            <p>Serie de Fibonacci hasta el número <?php echo $numeroNatural; ?>:</p>
            <p>
                <?php
                foreach ($serieFibonacci as $numero) {
                    echo $numero . " ";
                }
                ?>
            </p>
        <?php else: ?>
            <p>Debes ingresar un número natural válido.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
<?php
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 16: Hacer un programa que muestre el factorial de los diez primeros números naturales.

for ($i = 1; $i <= 10; $i++) {
  $factorial = 1;

  for ($j = 1; $j <= $i; $j++) {
    $factorial *= $j;
  }

  echo "El factorial de " . $i . " es: " . $factorial . "\n <br>";
}
echo "<br>";
echo "<br>";
echo "<br>";

// Punto 17: Realizar un algoritmo que muestre los valores de todas las piezas del dominó de forma ordenada: 0-0 0-1 1-1 0-2 1-2 2-2

for ($i = 0; $i <= 6; $i++) {
  for ($j = $i; $j <= 6; $j++) {
    echo $i . "-" . $j . " ";
  }
}

echo "\n";
echo "<br>";
echo "<br>";
echo "<br>";

?>

