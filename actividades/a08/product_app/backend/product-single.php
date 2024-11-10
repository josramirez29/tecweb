<?php
    include_once __DIR__.'/database.php';
    $data = array();

    if (isset($_POST['id'])) {
        $id = $conexion->real_escape_string($_POST['id']);
        
        $sql = "SELECT * FROM productos WHERE id = '{$id}'";
        if ($result = $conexion->query($sql)) {

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