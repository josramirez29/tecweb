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

</body>
</html>