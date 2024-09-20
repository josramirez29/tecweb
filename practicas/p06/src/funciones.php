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

// Arreglo del parque vehicular con 15 autos
$vehiculos = array(
    'UBN6338' => array(
        'Auto' => array(
            'marca' => 'HONDA',
            'modelo' => 2020,
            'tipo' => 'camioneta',
        ),
        'Propietario' => array(
            'nombre' => 'Alfonzo Esparza',
            'ciudad' => 'Puebla, Pue.',
            'direccion' => 'C.U., Jardines de San Manuel',
        ),
    ),
    'UBN6339' => array(
        'Auto' => array(
            'marca' => 'MAZDA',
            'modelo' => 2019,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'Ma. del Consuelo Molina',
            'ciudad' => 'Puebla, Pue.',
            'direccion' => '97 oriente',
        ),
    ),
    'ABC1234' => array(
        'Auto' => array(
            'marca' => 'NISSAN',
            'modelo' => 2021,
            'tipo' => 'hatchback',
        ),
        'Propietario' => array(
            'nombre' => 'Rodrigo Vidal',
            'ciudad' => 'México, CDMX',
            'direccion' => 'Av. Insurgentes 123',
        ),
    ),
    'XYZ5678' => array(
        'Auto' => array(
            'marca' => 'TOYOTA',
            'modelo' => 2022,
            'tipo' => 'camioneta',
        ),
        'Propietario' => array(
            'nombre' => 'Sergio Pérez',
            'ciudad' => 'Guadalajara, Jal.',
            'direccion' => 'Colonia Centro',
        ),
    ),
    'ABC1234' => array(
        'Auto' => array(
            'marca' => 'Mazda',
            'modelo' => 2018,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'Carlos Sainz',
            'ciudad' => 'Monterrey, NL',
            'direccion' => 'Calle 10',
        ),
    ),
    'DEF5678' => array(
        'Auto' => array(
            'marca' => 'Ford',
            'modelo' => 2019,
            'tipo' => 'hatchback',
        ),
        'Propietario' => array(
            'nombre' => 'Ivon Tepoz',
            'ciudad' => 'Puebla, Pue.',
            'direccion' => 'Av. 5 de Mayo',
        ),
    ),
    'GHI9012' => array(
        'Auto' => array(
            'marca' => 'Volkswagen',
            'modelo' => 2020,
            'tipo' => 'camioneta',
        ),
        'Propietario' => array(
            'nombre' => 'Emiliano Velez',
            'ciudad' => 'Guadalajara, Jal.',
            'direccion' => 'Calle Hidalgo',
        ),
    ),
    'JKL3456' => array(
        'Auto' => array(
            'marca' => 'Seat',
            'modelo' => 2021,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'Valeria Arciga',
            'ciudad' => 'Mérida, Yuc.',
            'direccion' => 'Albert Einstein',
        ),
    ),
    'MNO7890' => array(
        'Auto' => array(
            'marca' => 'Dodge',
            'modelo' => 2022,
            'tipo' => 'hatchback',
        ),
        'Propietario' => array(
            'nombre' => 'Sofía Carson',
            'ciudad' => 'Tijuana, BC',
            'direccion' => 'Mexico 68',
        ),
    ),
    'PQR1234' => array(
        'Auto' => array(
            'marca' => 'Mazda',
            'modelo' => 2016,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'Leilani Morales',
            'ciudad' => 'Veracruz, Ver.',
            'direccion' => 'Calle del Mar',
        ),
    ),
    'STU5678' => array(
        'Auto' => array(
            'marca' => 'Ford',
            'modelo' => 2017,
            'tipo' => 'camioneta',
        ),
        'Propietario' => array(
            'nombre' => 'Elena Villa',
            'ciudad' => 'Querétaro, Qro.',
            'direccion' => 'Calle de los Arcos',
        ),
    ),
    'VWX9012' => array(
        'Auto' => array(
            'marca' => 'Volkswagen',
            'modelo' => 2018,
            'tipo' => 'hatchback',
        ),
        'Propietario' => array(
            'nombre' => 'Marco Antonio Solis',
            'ciudad' => 'Oaxaca, Oax.',
            'direccion' => 'Calle de la Paz',
        ),
    ),
    'YZA3456' => array(
        'Auto' => array(
            'marca' => 'Seat',
            'modelo' => 2020,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'Paola Durante',
            'ciudad' => 'Pachuca, Hgo.',
            'direccion' => 'Calle de los Héroes',
        ),
    ),
    'BCD7890' => array(
        'Auto' => array(
            'marca' => 'Dodge',
            'modelo' => 2021,
            'tipo' => 'camioneta',
        ),
        'Propietario' => array(
            'nombre' => 'Gala Montes',
            'ciudad' => 'Chihuahua, Chih.',
            'direccion' => 'Calle de la Libertad',
        ),
    ),
    'EFG3456' => array(
        'Auto' => array(
            'marca' => 'Mazda',
            'modelo' => 2023,
            'tipo' => 'hatchback',
        ),
        'Propietario' => array(
            'nombre' => 'Isabel Lascurain',
            'ciudad' => 'Durango, Dgo.',
            'direccion' => 'Calle Constitución',
        ),
    ),
    'HIJ5678' => array(
        'Auto' => array(
            'marca' => 'Ford',
            'modelo' => 2020,
            'tipo' => 'sedan',
        ),
        'Propietario' => array(
            'nombre' => 'José Luis Hernández',
            'ciudad' => 'Toluca, Edomex',
            'direccion' => 'Calle de la Reforma',
        ),
    ),
);

if (isset($_POST['matricula']) && $_POST['matricula'] != "") {
    // Consulta por matrícula
    $matricula = $_POST['matricula'];
    if (isset($vehiculos[$matricula])) {
        $vehiculo = $vehiculos[$matricula];
        echo "<h3>Información del vehículo con matrícula: $matricula</h3>";
        echo "<p>Marca: " . $vehiculo['Auto']['marca'] . "</p>";
        echo "<p>Modelo: " . $vehiculo['Auto']['modelo'] . "</p>";
        echo "<p>Tipo: " . $vehiculo['Auto']['tipo'] . "</p>";
        echo "<p>Propietario: " . $vehiculo['Propietario']['nombre'] . "</p>";
        echo "<p>Ciudad: " . $vehiculo['Propietario']['ciudad'] . "</p>";
        echo "<p>Dirección: " . $vehiculo['Propietario']['direccion'] . "</p>";
    } else {
        echo "<p>No se encontró un vehículo con la matrícula $matricula.</p>";
    }
} elseif (isset($_POST['todos'])) {
    // Mostrar todos los vehículos
    echo "<h3>Lista de todos los vehículos registrados</h3>";
    foreach ($vehiculos as $matricula => $vehiculo) {
        echo "<h4>Matrícula: $matricula</h4>";
        echo "<p>Marca: " . $vehiculo['Auto']['marca'] . "</p>";
        echo "<p>Modelo: " . $vehiculo['Auto']['modelo'] . "</p>";
        echo "<p>Tipo: " . $vehiculo['Auto']['tipo'] . "</p>";
        echo "<p>Propietario: " . $vehiculo['Propietario']['nombre'] . "</p>";
        echo "<p>Ciudad: " . $vehiculo['Propietario']['ciudad'] . "</p>";
        echo "<p>Dirección: " . $vehiculo['Propietario']['direccion'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>Por favor, ingrese una matrícula o consulte todos los vehículos.</p>";
}

?>