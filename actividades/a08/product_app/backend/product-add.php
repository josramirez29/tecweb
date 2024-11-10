<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
$data = array(
    'status'  => 'error',
    'message' => 'Ya existe un producto con ese nombre'
);

if(!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // Verificar si se está realizando una validación del nombre
    if (isset($jsonOBJ->nombre) && !isset($jsonOBJ->accion)) {
        // VALIDAR SI EL NOMBRE YA EXISTE EN LA BASE DE DATOS
        $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
        $result = $conexion->query($sql);
        
        if ($result->num_rows > 0) {
            // Si el producto ya existe
            $data['status'] = 'error';
            $data['message'] = 'Ya existe un producto con ese nombre';
        } else {
            // Si el nombre es único
            $data['status'] = 'success';
            $data['message'] = 'El nombre está disponible';
        }

        $result->free();
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    // Verificación de agregar producto
    if (isset($jsonOBJ->accion) && $jsonOBJ->accion == 'agregar') {
        $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
        $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            // Insertar el nuevo producto
            $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] = "Producto agregado correctamente.<br>";
                $data['message'] .= "El nombre cumple con los requerimientos.<br>";
                $data['message'] .= "La marca cumple con los requerimientos.<br>";
                $data['message'] .= "El modelo cumple con los requerimientos.<br>";
                $data['message'] .= "El producto cumple con los requerimientos.<br>";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . $conexion->error;
            }
        }

        $result->free();
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}

// Cierra la conexión
$conexion->close();
?>
