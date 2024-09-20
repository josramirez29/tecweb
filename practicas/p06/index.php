<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h1>Práctica 6 - Uso de funciones y variables GET y POST en PHP</h1>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SI es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

<h2>Ejercicio 2</h2>
    <p>Escribir programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por: impar, par, impar</p>
    <?php
        function aleatorio(){
            return rand(1,100);
        }
        function par($numero){
            return $numero % 2 == 0;
        }
        function impar($numero){
            return $numero%2 != 0;
        }
        $iteraciones=0;
        $matriz= array();

        while(true){
            $num1 = aleatorio();
            $num2 = aleatorio();
            $num3 = aleatorio();
            $iteraciones++;
            $matriz[]= array($num1,$num2,$num3);
            if (impar($num1) && par($num2) && impar($num3)){
                break;
            }
        }
        $filas = count($matriz);
        $numeros = $filas * 3;
        echo "La matriz generada es: <br>";
        foreach ($matriz as $fila){
            foreach($fila as $dato){
            echo $dato. ', ';
        }
        echo "<br>";
    }
        echo "<br>";
        echo "Número de iteraciones: $iteraciones <br>";
        echo "Cantidad de números generados: $numeros";
    $matriz = array();
    ?>

<h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <ul>
        <li>Crear una variante de este script utilizando el ciclo do-while.</li>
        <li>El número dado se debe obtener vía GET.</li>
    </ul>
<fieldset>
<legend>Número a comprobar</legend>
<form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
    Número: <input type="text" name="numero"><br>
    <input type="submit">
</form>
<br>
<?php
if(isset($_POST["numero"]))
{
    echo "Número dado: " . $_POST["numero"] . '<br>';

    // Validación de que el número dado es un entero
    if(is_numeric($_POST["numero"]) && intval($_POST["numero"]) > 0) {
        $numeroDado = intval($_POST["numero"]);

        // Ciclo while
        $encontrado = false;
        while (!$encontrado) {
            $aleatorio = rand(1, 100);
            if ($aleatorio % $numeroDado == 0) {
                echo "Número encontrado con while: $aleatorio es múltiplo de $numeroDado<br>";
                $encontrado = true;
            }
        }

        // Ciclo do-while
        do {
            $aleatorio = rand(1, 100);
        } while ($aleatorio % $numeroDado != 0);

        echo "Número encontrado con do-while: $aleatorio es múltiplo de $numeroDado";
    } else {
        echo "Por favor, ingresa un número entero válido.";
    }
}
?>
</fieldset>

<h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice.</p>

<?php
// Crear el arreglo con índices de 97 a 122, y valores correspondientes a las letras
$arreglo = array();
for ($i = 97; $i <= 122; $i++) {
    $arreglo[$i] = chr($i);
}

// Mostrar el arreglo en una tabla utilizando foreach
echo "<table border='1'>";
echo "<tr><th>Índice</th><th>Valor</th></tr>";

foreach ($arreglo as $key => $value) {
    echo "<tr>";
    echo "<td>$key</td>";
    echo "<td>$value</td>";
    echo "</tr>";
}

echo "</table>";
?>

<h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado.</p>

<fieldset>
<legend>Formulario de Edad y Sexo</legend>
<form action="http://localhost/tecweb/practicas/p06/index.php" method="post">
    Edad: <input type="number" name="edad" required><br>
    Sexo: 
    <input type="radio" name="sexo" value="femenino" required> Femenino
    <input type="radio" name="sexo" value="masculino" required> Masculino<br>
    <input type="submit" value="Enviar">
</form>

<?php
if (isset($_POST["edad"]) && isset($_POST["sexo"])) {
    $edad = intval($_POST["edad"]);
    $sexo = $_POST["sexo"];

    // Validación
    if ($sexo == "femenino" && $edad >= 18 && $edad <= 35) {
        echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
    } else {
        echo "<p>Error: No cumple con los criterios requeridos.</p>";
    }
} else {
    echo "<p>Por favor, complete todos los campos del formulario.</p>";
}
?>


</body>
</html>