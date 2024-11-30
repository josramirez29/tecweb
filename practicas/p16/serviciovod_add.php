<?php
libxml_use_internal_errors(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $xml = new DOMDocument();
    $archivoXML = file_get_contents('catalogovod.xml');

    if (!$archivoXML) {
        exit("Error: No se pudo cargar el archivo XML.");
    }

    $xml->loadXML($archivoXML, LIBXML_NOBLANKS);

    $catalogo = $xml->documentElement;

    // Agregar perfil
    $nuevoPerfil = crearNodoConAtributos(
        $xml,
        'perfil',
        ['usuario' => $_POST['usuario'], 'idioma' => $_POST['size']]
    );

    // Buscar o crear sección de perfiles
    $cuenta = $catalogo->getElementsByTagName('cuenta')->item(0);
    $seccionPerfiles = $cuenta->getElementsByTagName('perfiles')->item(0) ?: $xml->createElement('perfiles');
    $cuenta->appendChild($seccionPerfiles);
    $seccionPerfiles->appendChild($nuevoPerfil);

    // Agregar películas
    agregarSeccionContenido(
        $xml,
        $catalogo,
        'peliculas',
        'USA',
        $_POST['pel-genero'],
        [$_POST['pel-titulo1'], $_POST['pel-titulo2']],
        [$_POST['pel-duracion1'], $_POST['pel-duracion2']]
    );

    // Agregar series 
    agregarSeccionContenido(
        $xml,
        $catalogo,
        'series',
        'USA',
        $_POST['ser-genero'],
        [$_POST['ser-titulo1'], $_POST['ser-titulo2']],
        [$_POST['ser-duracion1'], $_POST['ser-duracion2']]
    );

    // Guardar archivo modificado
    $archivoModificado = 'catalogovod_modificado.xml';
    if ($xml->save($archivoModificado)) {
        echo "El archivo modificado ha sido creado: <a href='$archivoModificado'>Descargar archivo</a>";
    } else {
        echo "Error: No se pudo guardar el archivo modificado.";
    }
} else {
    echo "Error: Solicitud no válida.";
}


function crearNodoConAtributos($xml, $nombreNodo, $atributos)
{
    $nodo = $xml->createElement($nombreNodo);
    foreach ($atributos as $clave => $valor) {
        $nodo->setAttribute($clave, htmlspecialchars($valor));
    }
    return $nodo;
}

//Agregar sección de contenido
function agregarSeccionContenido($xml, $catalogo, $tipoContenido, $region, $generoNombre, $titulos, $duraciones)
{
    $contenido = $catalogo->getElementsByTagName('contenido')->item(0);
    $nuevaSeccion = $xml->createElement($tipoContenido);
    $nuevaSeccion->setAttribute('region', $region);

    $nuevoGenero = $xml->createElement('genero');
    $nuevoGenero->setAttribute('nombre', htmlspecialchars($generoNombre));

    foreach ($titulos as $index => $titulo) {
        $nuevoTitulo = $xml->createElement('titulo', htmlspecialchars($titulo));
        $nuevoTitulo->setAttribute('duracion', htmlspecialchars($duraciones[$index]));
        $nuevoGenero->appendChild($nuevoTitulo);
    }

    $nuevaSeccion->appendChild($nuevoGenero);
    $contenido->appendChild($nuevaSeccion);
}
?>
