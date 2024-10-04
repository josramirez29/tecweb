<?php
// Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$marca  = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$precio = $_POST['precio'] ?? 0.0;
$detalles = $_POST['detalles'] ?? '';
$unidades = $_POST['cantidad'] ?? 0;
$imagen   = $_POST['imagen'] ?? '';

//SE CREA EL OBJETO DE CONEXION
@$link = new mysqli('localhost', 'root', 'mamarre123', 'marketzone');	

/** Comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

//Validar que no exista un producto con el mismo nombre, marca y modelo
$check_sql = "SELECT COUNT(*) as total FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
$result = $link->query($check_sql);
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    echo 'El producto ya existe en la base de datos.';
} else {
    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
        VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

    if ($link->query($sql)) {
        echo 'Producto insertado con ID: ' . $link->insert_id;
    } else {
        echo 'El producto no pudo ser insertado =(';
    }
}

$link->close();
?>
