<?php
libxml_use_internal_errors(true); 

$documentoXML = new DOMDocument(); 

$contenidoXML = file_get_contents('catalogovod.xml'); 

$documentoXML->loadXML($contenidoXML, LIBXML_NOBLANKS); 

$archivoXSD = 'catalogovod.xsd'; 

if (!$documentoXML->schemaValidate($archivoXSD)) { 
    $errores = libxml_get_errors(); 
    $mensajeErrores = ''; 

    foreach ($errores as $error) {
        $mensajeErrores .= $error->message . "<br />";
    }

    echo "<h3>Se encontraron errores en la validación del XML:</h3>";
    echo "<div style='color: red;'>$mensajeErrores</div>";

    exit();
} 

header('Content-Type: text/xml');


echo $documentoXML->saveXML();
?>