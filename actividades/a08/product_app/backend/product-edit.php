<?php
include_once __DIR__.'/database.php';

$producto = file_get_contents('php://input');
$data = array(
    'status'  => 'error',
    'message' => 'Hay un error, vuelve a intentarlo'
);
if (!empty($producto)) {
    // Convertir JSON a objeto
    $jsonOBJ = json_decode($producto);

    if (isset($jsonOBJ->id)) {

        $id = $jsonOBJ->id;
        $sql = "SELECT * FROM productos WHERE id = '{$id}' AND eliminado = 0";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {

            $sql = "UPDATE productos SET
                        nombre = '{$jsonOBJ->nombre}',
                        marca = '{$jsonOBJ->marca}',
                        modelo = '{$jsonOBJ->modelo}',
                        precio = {$jsonOBJ->precio},
                        detalles = '{$jsonOBJ->detalles}',
                        unidades = {$jsonOBJ->unidades},
                        imagen = '{$jsonOBJ->imagen}'
                    WHERE id = '{$id}' AND eliminado = 0";
 
            if ($conexion->query($sql)) {
                $data['status'] = "success";
                $data['message'] = "Producto actualizado correctamente";
            } else {
                $data['message'] = "ERROR: No se pudo ejecutar $sql. " . mysqli_error($conexion);
            }
        } else {
 
            $data['message'] = "No se encontró el producto con el id especificado.";
        }
        $result->free();

    } else {

        $data['message'] = "El nombre del producto no fue proporcionado en el JSON.";
    }
    // Se cierra la conexión
    $conexion->close();
}
//Conversión de array a JSON
echo json_encode($data, JSON_PRETTY_PRINT);
?>