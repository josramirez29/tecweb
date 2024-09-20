<?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
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