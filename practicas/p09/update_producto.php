<?php
//Se conecta con MySQL
$link = mysqli_connect("localhost", "root", "mamarre123", "marketzone");

// Verificar si se reciben los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del producto
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = mysqli_real_escape_string($link, $_POST['precio']);
    $unidades = mysqli_real_escape_string($link, $_POST['unidades']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $imagen = mysqli_real_escape_string($link, $_POST['imagen']);
    
    // Actualiza el producto si el id fue enviado
    if (!empty($id) && !empty($nombre)) {
        $sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', 
                precio='$precio', unidades='$unidades', detalles='$detalles', 
                imagen='$imagen' WHERE id='$id'";
        
        if (mysqli_query($link, $sql)) {
            echo "Registro actualizado.";
        } else {
            echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
        }
    } else {
        echo "El nombre del producto no puede estar vacío o el ID no puede estar vacío.";
    }    
}
echo '<br/><br/>';
echo '<a href="get_productos_xhtml_v2.php" style="text-decoration: none;">';
echo '<button>Ir a Productos XHTML</button>';
echo '</a>';

echo '<a href="get_productos_vigentes_v2.php" style="text-decoration: none;">';
echo '<button>Ir a Productos Vigentes</button>';
echo '</a>';

mysqli_close($link);
?>