<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
	/** SE CREA EL OBJETO DE CONEXION */
	@$link = new mysqli('localhost', 'root', 'mamarre123', 'marketzone');	

	/** comprobar la conexión */
	if ($link->connect_errno) 
	{
		die('Falló la conexión: '.$link->connect_error.'<br/>');
	}

	/** Crear la consulta que devuelve todos los productos no eliminados */
	if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0") ) 
	{
		$productos = [];
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$productos[] = $row;
		}
		/** útil para liberar memoria asociada a un resultado con demasiada información */
		$result->free();
	}

	$link->close();
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos Vigentes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTOS VIGENTES</h3>

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
						<td><?= $row['nombre'] ?></td>
						<td><?= $row['marca'] ?></td>
						<td><?= $row['modelo'] ?></td>
						<td><?= $row['precio'] ?></td>
						<td><?= $row['unidades'] ?></td>
						<td><?= ($row['detalles']) ?></td>
						<td><img src="img/<?= $row['imagen'] ?>" alt="Imagen del producto" style="width: 100px;"></td>
						<!-- Nueva celda con el botón para modificar -->
						<td>
							<button onclick="modificarProducto('<?= $row['id'] ?>', '<?= $row['nombre'] ?>', '<?= $row['marca'] ?>', '<?= $row['modelo'] ?>', '<?= $row['precio'] ?>', '<?= $row['unidades'] ?>', '<?= $row['detalles'] ?>', '<?= $row['imagen'] ?>')">Modificar</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		<?php else : ?>

			 <script>
                alert('No hay productos vigentes disponibles.');
             </script>

		<?php endif; ?>
		
		<script>
			// Función para redirigir al formulario de edición pasando los datos del producto como parámetros
			function modificarProducto(id, nombre, marca, modelo, precio, unidades, detalles, imagen) {
				var urlForm = "formulario_productos_v2.html";
				var queryString = `?id=${id}&nombre=${encodeURIComponent(nombre)}&marca=${encodeURIComponent(marca)}&modelo=${encodeURIComponent(modelo)}&precio=${precio}&unidades=${unidades}&detalles=${encodeURIComponent(detalles)}&imagen=${encodeURIComponent(imagen)}`;
				window.location.href = urlForm + queryString;
			}
		</script>


	</body>
</html>
