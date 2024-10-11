<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <?php
    // Verificar si "tope" ha sido pasado con un GET
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    }

    // Verificar si se ha proporcionado el parámetro "tope"
    if (!empty($tope))
    {
        // Se crea el objeto de conexión
        @$link = new mysqli('localhost', 'root', 'mamarre123', 'marketzone');    

        // Comprobar la conexión
        if ($link->connect_errno) 
        {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        // Crear la consulta que devuelve todos los productos con unidades <= tope
        if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= '{$tope}'") ) 
        {
            $productos = [];
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $productos[] = $row;
            }
            $result->free();
        }

        $link->close();
    }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h3>PRODUCTOS CON UNIDADES MENORES O IGUALES A <?= htmlentities($tope) ?></h3>

        <br/>
        
        <?php if( !empty($productos) ) : ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Modificar</th> <!-- Nueva columna -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td class="row-data"><?= $row['nombre'] ?></td>
                        <td class="row-data"><?= $row['marca'] ?></td>
                        <td class="row-data"><?= $row['modelo'] ?></td>
                        <td class="row-data"><?= $row['precio'] ?></td>
                        <td class="row-data"><?= $row['unidades'] ?></td>
                        <td><?= ($row['detalles']) ?></td>
                        <td><img src="img/<?= $row['imagen'] ?>" alt="Imagen del producto" style="width: 100px;"></td>
                        <!-- Nueva fila con el botón para modificar -->
                        <td>
    						<button onclick="modificarProducto('<?= $row['id'] ?>', '<?= $row['nombre'] ?>', '<?= $row['marca'] ?>', '<?= $row['modelo'] ?>', '<?= $row['precio'] ?>', '<?= $row['unidades'] ?>', '<?= $row['detalles'] ?>', '<?= $row['imagen'] ?>')">Modificar</button>
						</td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php elseif(!empty($tope)) : ?>

             <script>
                alert('No se encontraron productos con unidades menores o iguales a ' + <?= htmlentities($tope) ?>);
             </script>

        <?php endif; ?>
        
        <script>
            function modificarProducto(id, nombre, marca, modelo, precio, unidades, detalles, imagen) {
                // Redirige al formulario pasándole los parámetros del producto
                var urlForm = "formulario_productos_v2.html";
                var queryString = `?id=${id}&nombre=${nombre}&marca=${marca}&modelo=${modelo}&precio=${precio}&unidades=${unidades}&detalles=${detalles}&imagen=${imagen}`;
                window.location.href = urlForm + queryString;
            }
        </script>
    </body>
</html>
