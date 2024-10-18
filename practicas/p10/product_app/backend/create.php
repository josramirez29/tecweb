<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

// VALIDAR SI EL PRODUCTO YA EXISTE
    $nombre = mysqli_real_escape_string($conexion, $jsonOBJ->nombre);
    $modelo = mysqli_real_escape_string($conexion, $jsonOBJ->modelo);
    $checkQuery = "SELECT * FROM productos WHERE (modelo = '{$modelo}') AND eliminado = 0";
    $checkResult = $conexion->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // PRODUCTO YA EXISTE
        echo "Error: El producto ya existe.";
    } else {
        // SE REALIZA LA INSERCIÓN A LA BASE DE DATOS
        $precio = mysqli_real_escape_string($conexion, $jsonOBJ->precio);
        $unidades = mysqli_real_escape_string($conexion, $jsonOBJ->unidades);
        $modelo = mysqli_real_escape_string($conexion, $jsonOBJ->modelo);
        $marca = mysqli_real_escape_string($conexion, $jsonOBJ->marca);
        $detalles = mysqli_real_escape_string($conexion, $jsonOBJ->detalles);
        $imagen = mysqli_real_escape_string($conexion, $jsonOBJ->imagen);

        $insertQuery = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen) 
                        VALUES ('{$nombre}', '{$precio}', '{$unidades}', '{$modelo}', '{$marca}', '{$detalles}', '{$imagen}')";

        if ($conexion->query($insertQuery) === TRUE) {
            echo "Éxito: Producto agregado correctamente.";
        } else {
            echo "Error: " . $conexion->error;
        }
    }

    // CERRAR CONEXIÓN
    $conexion->close();
}
?>
