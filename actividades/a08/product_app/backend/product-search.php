<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA HABER RECIBIDO EL PARÁMETRO DE BÚSQUEDA
    if (isset($_GET['search'])) {
        $search = $conexion->real_escape_string($_GET['search']);

        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        if ($result = $conexion->query($sql)) {
            // SE OBTIENEN LOS RESULTADOS DIRECTAMENTE
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($conexion));
        }
        $conexion->close();
    } 

    //Conversión de array a JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>