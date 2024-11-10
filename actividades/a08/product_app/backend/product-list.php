<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {

        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }
    
    $conexion->close();
    
    //Conversión de array a JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>