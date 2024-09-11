<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4 - Variables en PHP</title>
</head>
<h1>Práctica 4 - Variables en PHP</h1>
<body>
<h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        // Definimos variables y validamos cuáles son válidas
        $_myvar = "válida";
        $_7var = "válida";
        //myvar = "inválida"; // No es válida porque le falta el $
        $myvar = "válida";
        $var7 = "válida";
        $_element1 = "válida";
        //$house*5 = "inválida"; // Contiene un símbolo inválido
        // Mostramos las variables válidas en una lista
        echo "<li>\$_myvar: $_myvar</li>";
        echo "<li>\$_7var: $_7var</li>";
        echo "<li>\$myvar: $myvar</li>";
        echo "<li>\$var7: $var7</li>";
        echo "<li>\$_element1: $_element1</li>";
        
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';
        echo '<li>$_myvar es correcta porque comienza con un guión bajo, lo cual es permitido en los nombres de variables.</li>';
        echo '<li>$_7var es válida ya que empieza con un guión bajo, lo que sigue las reglas para nombrar variables en PHP.</li>';
        echo '<li>myvar no es válida porque le falta el signo de dólar ($), que es necesario para identificar variables en PHP.</li>';
        echo '<li>$myvar es válida porque comienza con una letra, que es el formato correcto para las variables en PHP.</li>';
        echo '<li>$var7 es correcta porque empieza con una letra y luego contiene números, lo cual es aceptable en los nombres de variables.</li>';
        echo '<li>$_element1 es válida ya que comienza con un guión bajo, lo que cumple con las reglas para definir variables.</li>';
        echo '<li>$house*5 es incorrecta porque incluye un símbolo no permitido (*), lo cual no es válido en nombres de variables.</li>';
        echo '</ul>';
        //Liberar variables
        unset($_myvar, $_7var, $myvar, $var7, $_element1, $house);
    ?>
    <p>Las variables inválidas son:</p>
    <ul>
        <li>myvar: Inválida porque falta el símbolo de $</li>
        <li>$house*5: Inválida porque contiene un carácter especial (*)</li>
    </ul>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p>$a = “ManejadorSQL”; $b = 'MySQL’; $c = &$a;</p>
    <h3>Bloque 1: Asignaciones Iniciales</h3>
    <h4>a-Asignaciones Iniciales</h4>
    <?php
    // Asignaciones iniciales
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    // a) Mostrar contenido de cada variable
    echo '<p>Valores iniciales:</p>';
    echo '<ul>';
    echo "<li>\$a = $a</li>";
    echo "<li>\$b = $b</li>";
    echo "<li>\$c = $c</li>";
    echo '</ul>';
    ?>
    <h3>Bloque 2: Asignaciones Nuevas</h3>
    <h4>b-Nuevas Asignaciones y Mostrar contenido</h4>
    <?php
    // b) Nuevas asignaciones
    $a = "PHP server";
    $b = &$a;

    // c) Mostrar contenido de cada variable
    echo '<p>Valores después de las nuevas asignaciones:</p>';
    echo '<ul>';
    echo "<li>\$a = $a</li>";
    echo "<li>\$b = $b</li>";
    echo "<li>\$c = $c</li>"; // $c sigue siendo una referencia a $a
    echo '</ul>';

    // d) Explicación de lo que ocurrió en el segundo bloque de asignaciones
    echo '<h4>d-Explicación:</h4>';
    echo '<p>En el segundo bloque de asignaciones, cuando le asignamos un nuevo valor a <strong>$a</strong>, ese cambio afectó también a <strong>$c</strong>, ya que <strong>$c</strong> es una referencia a <strong>$a</strong>, por lo que ambos contienen el mismo valor, al asignar <strong>$b = &$a</strong>, <strong>$b</strong> también se convierte en una referencia a <strong>$a</strong>, por lo que cualquier cambio en <strong>$a</strong> afectará a <strong>$b</strong> y a <strong>$c</strong>.</p>';
    // Liberar variables
    unset($a, $b, $c);
    ?>
    
</body>
</html>