<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4 - Variables en PHP</title>
</head>
<body>
<h1>Práctica 4 - Variables en PHP</h1>
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
    <p>$a = “ManejadorSQL”; $b = 'MySQL’; $c = &amp;$a;</p>
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

<h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación, verificar la evolución del tipo de estas variables (imprime todos los componentes de los arreglos):</p>
    <p>$a = "PHP5"; $z[] = &amp;$a; $b = "5a version de PHP"; $c = $b*10; $a .= $b;</p>
    <?php
    // Inicialización de las variables
    $a = "PHP5";
    echo "<p>Asignación inicial: \$a = 'PHP5'</p>";
    echo "<p>Valor de \$a: $a</p>";

    // Referencia de $a al arreglo de $z
    $z[] = &$a;
    echo "<p>Asignación: \$z[] = &\$a</p>";
    echo "<p>Contenido de \$z: "; print_r($z); echo "</p>";

    // Asignación de $b
    $b = "5a version de PHP";
    echo "<p>Asignación: \$b = '5a version de PHP'</p>";
    echo "<p>Valor de \$b: $b</p>";

    // Multiplicación en $c = $b * 10
    @$c = $b * 10; //Opción 1: PHP toma el valor aproximado (más cercano), en este caso 5
    echo "<p>Asignación: \$c = \$b * 10</p>";
    echo "<p>Valor de \$c: $c</p>";

    // Asignación de $a .= $b
    $a .= $b;
    echo "<p>Asignación: \$a .= \$b</p>";
    echo "<p>Valor de \$a: $a</p>";
    echo "<p>Contenido actualizado de \$z (referencia a \$a): "; print_r($z); echo "</p>";

    // Multiplicación de $b *= $c
    $b = (int) $b * $c; //Opción 2: Se extrae sólo la parte númerica de b porque marcaba error
    echo "<p>Asignación: \$b *= \$c</p>";
    echo "<p>Valor de \$b: $b</p>";

    // Modificación de $z[0] = "MySQL"
    $z[0] = "MySQL";
    echo "<p>Asignación: \$z[0] = 'MySQL'</p>";
    echo "<p>Actualización del contenido de \$z: "; print_r($z); echo "</p>";
    echo "<p>Valor final de \$a: $a</p>";
    // Liberar variables
    unset($a, $b, $c, $z);
    ?>

    <h3>Explicación:</h3>
    <p>
        Al asignar una referencia de <strong>$a</strong> a <strong>$z[0]</strong>, cualquier modificación en <strong>$a</strong> se reflejará en <strong>$z[0]</strong>, 
        cuando se modifica el valor de <strong>$a</strong> asignando <strong>$b</strong> ($a .= $b), el cambio también aparece en <strong>$z[0]</strong> debido a la referencia. 
        Pero cuando le asignamos un nuevo valor a <strong>$z[0]</strong> ("MySQL"), la referencia se ve afectada y <strong>$a</strong> ya no se modifica cuando hay cambios en <strong>$z[0]</strong>.
    </p>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS o del modificador global de PHP.</p>
    <?php
    // Definir las variables globales
    global $a, $b, $c, $z;

    // Asignaciones (de los ejercicios anteriores)
    //Es necesario que las variables estén declaradas en el ámbito global si no no funcionaba y marcaba error.
    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    $c = (int) $b * 10;
    $a .= $b;
    $b = (int) $b * $c;
    $z[0] = "MySQL";
    // Mostrar los valores de las variables utilizando $GLOBALS
    echo '<ul>';
    echo "<li>Valor de \$a (en el ámbito global): " . $GLOBALS['a'] . "</li>";
    echo "<li>Valor de \$b (en el ámbito global): " . $GLOBALS['b'] . "</li>";
    echo "<li>Valor de \$c (en el ámbito global): " . $GLOBALS['c'] . "</li>";
    echo "<li>Contenido del arreglo \$z (en el ámbito global): "; print_r($GLOBALS['z']); echo "</li>";
    echo '</ul>';
    // Liberar variables
    unset($GLOBALS['a'], $GLOBALS['b'], $GLOBALS['c'], $GLOBALS['z']);
    ?>
    <h3>Explicación:</h3>
    <p>
        Utilizando <strong>$GLOBALS</strong>, es posible acceder a cualquier variable global dentro del script. Es decir, contiene una referencia a cada variable disponible en el espectro de las variables del script.
        En este ejercicio, se utilizó $GLOBALS para recuperar las variables <strong>$a</strong>, <strong>$b</strong>, <strong>$c</strong> y el arreglo <strong>$z</strong> de la matriz global, esto nos permite ver sus valores actuales.
    </p>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <p>$a = “7 personas”; $b = (integer) $a; $a = “9E3”; $c = (double) $a;</p>
    <?php
    // Asignación inicial
    $a = "7 personas";
    echo "<p>Asignación inicial: \$a = '7 personas'</p>";
    echo "<p>Valor de \$a: $a</p>";

    // Conversión a entero de la variable $a para asignarla a $b
    $b = (integer) $a;
    echo "<p>Conversión de \$a a entero: \$b = \$a</p>";
    echo "<p>Valor de \$b: $b</p>"; // Valor de $b ya convertido en entero

    // Asignación de $a nueva
    $a = "9E3";
    echo "<p>Asignación: \$a = '9E3'</p>";
    echo "<p>Valor de \$a: $a</p>";

    // Conversión de $a a double
    $c = (double) $a;
    echo "<p>Conversión de \$a a double: \$c = \$a</p>";
    echo "<p>Valor de \$c: $c</p>"; // Muestra el valor convertido a double
    // Liberar variables
    unset($a, $b, $c);
    ?>

    <h3>Explicación:</h3>
    <p>
        La variable <strong>$a</strong> inicialmente tenía el valor: "7 personas", pero al convertirla a entero, sólo se toma en cuenta el <strong>7</strong> y se ignora el texto, por lo que a <strong>$b</strong> se le asignó el valor de <strong>7</strong>.
        Después, a <strong>$a</strong> se le asignó el valor: "9E3", que representa <strong>9000</strong> en notación científica (lo investigué)
        y es por eso que se tuvo que convertir este valor a double, para que al final, <strong>$c</strong> se conviertiera en <strong>9000.0</strong>.
    </p>

    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas usando la función var_dump(<span>datos</span>).</p>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e en uno que se pueda mostrar con un echo:</p>
    <p>$a = “0”; $b = “TRUE”; $c = FALSE; $d = ($a OR $b); $e = ($a AND $c); $f = ($a XOR $b);</p>
    <?php
    // Asignación de valores iniciales
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    // Mostrar los valores usando var_dump()
    echo "<h4>Valores usando var_dump()</h4>";
    echo "<p>Valor de \$a: "; var_dump($a); echo "</p>";
    echo "<p>Valor de \$b: "; var_dump($b); echo "</p>";
    echo "<p>Valor de \$c: "; var_dump($c); echo "</p>";
    echo "<p>Valor de \$d: "; var_dump($d); echo "</p>";
    echo "<p>Valor de \$e: "; var_dump($e); echo "</p>";
    echo "<p>Valor de \$f: "; var_dump($f); echo "</p>";

    // Conversion de valores booleanos $c y $e para poder mostrarlos con echo
    echo "<h4>Conversión de valores booleanos para poder mostrarlos con echo</h4>";

    // Función intval() para convertir booleanos a enteros

    echo "<p>Valor de \$c convertido a entero (con intval): " . intval($c) . "</p>";
    echo "<p>Valor de \$e convertido a entero (con intval): " . intval($e) . "</p>";
    // Liberar variables
    unset($a, $b, $c, $d, $e, $f);
    ?>
    <h3>Explicación:</h3>
    <p>La función <strong>var_dump()</strong> muestra información estructurada sobre una o más expresiones incluyendo su tipo y valor.</p>
    <p> Para convertir <strong>$c</strong> y <strong>$e</strong> de booleanos a un formato que se pudiera mostrar con echo, se optó
        por usar <strong>intval()</strong>, para convertirlos  a enteros (0 para false y 1 para true).
    </p>

    <h2>Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
    <p>a. La versión de Apache y PHP.</p>
    <p>b. El nombre del sistema operativo (servidor).</p>
    <p>c. El idioma del navegador (cliente).</p>

    <?php
    // a) Versión de Apache y PHP
    $apache_version = $_SERVER['SERVER_SOFTWARE'];
    $php_version = phpversion();

    // b) Nombre del sistema operativo del servidor
    $server_os = PHP_OS;

    // c) Idioma del navegador (cliente)
    $client_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

    // Mostrar los resultados
    echo "<ul>";
    echo "<li>Versión de Apache: $apache_version</li>";
    echo "<li>Versión de PHP: $php_version</li>";
    echo "<li>Sistema operativo del servidor: $server_os</li>";
    echo "<li>Idioma del navegador (cliente): $client_language</li>";
    echo "</ul>";

    // Liberar variables
    unset($apache_version, $php_version, $server_os, $client_language);
    ?>
    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml11" alt="XHTML 1.1 válido" height="31" width="88" /></a>
    </p>
</body>
</html>