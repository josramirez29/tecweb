// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
};

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

$(document).ready(function() {

    console.log('JQuery está trabajando!')
    listadoProductos();

    function listadoProductos(){
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response){
                let productos = JSON.parse(response);
                if(Object.keys(productos).length > 0) {
                    let template = '';

                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>
                                    <a href="#" class="product-item">${producto.nombre}</a>
                                </td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    document.getElementById("products").innerHTML = template;
                }
            }
        });
    }

    //Función buscarProducto ()
    $('#search').keyup(function(e) {
        e.preventDefault();

        // Obtener el valor de búsqueda usando jQuery
        var search = $('#search').val(); 

        //Solicitud AJAX
        $.ajax({
            url: './backend/product-search.php',
            type: 'GET',
            data: { search: search },
            success: function(response) {
                let productos = JSON.parse(response);

                if (Object.keys(productos).length > 0) {
                    let template = '';
                    let template_bar = '';

                    productos.forEach(producto => {
                        let descripcion = `
                            <li>precio: ${producto.precio}</li>
                            <li>unidades: ${producto.unidades}</li>
                            <li>modelo: ${producto.modelo}</li>
                            <li>marca: ${producto.marca}</li>
                            <li>detalles: ${producto.detalles}</li>
                        `;

                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" data-id="${producto.id}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;

                        template_bar += `<li>${producto.nombre}</li>`;
                    });

                    document.getElementById("product-result").className = "card my-4 d-block";
                    document.getElementById("container").innerHTML = template_bar;
                    document.getElementById("products").innerHTML = template;
                } else {
                    // Si no se encuentran productos...
                    document.getElementById("product-result").className = "card my-4 d-none";
                    document.getElementById("container").innerHTML = ""; // Limpia la barra de estado
                    document.getElementById("products").innerHTML = ""; // Limpia la tabla de productos
                }
            },
            error: function() {
                alert("Hubo un error al realizar la búsqueda.");
            }
        });
    });

    //Función agregarProducto()
    $('#product-form').submit(function(e) {
        e.preventDefault();
        var productoJsonString = document.getElementById('description').value;
        var finalJSON = JSON.parse(productoJsonString);
        finalJSON['nombre'] = document.getElementById('name').value;
        productoJsonString = JSON.stringify(finalJSON, null, 2);

        // Validación para el nombre del producto
        if (!finalJSON.nombre || finalJSON.nombre.length == 0) {
            alert('El nombre del producto es obligatorio');
            return false;
        }

        // Validación para el modelo del producto
        if (!finalJSON.modelo || finalJSON.modelo.length == 0) {
            alert('El modelo es obligatorio');
            return false;
        }
        if (!/^[a-zA-Z0-9 ]+$/.test(finalJSON.modelo) || finalJSON.modelo.length > 25) {
            alert('El modelo tiene que ser alfanumérico y su extensión menor a 25 caracteres');
            return false;
        }

        // Validación para el precio del producto
        if (!finalJSON.precio || finalJSON.precio.length == 0) {
            alert('El precio es obligatorio');
            return false;
        }
        if (finalJSON.precio < 99.99) {
            alert('El precio debe ser mayor a $99.99');
            return false;
        }

        // Validación para los detalles del producto
        if (finalJSON.detalles && finalJSON.detalles.length > 250) {
            alert('Los detalles deben tener una extensión máxima de 250 caracteres');
            return false;
        }

        // Validación para la imagen del producto
        if (!finalJSON.imagen || finalJSON.imagen.length == 0) {
            finalJSON.imagen = 'img/default.png';  // Asigna una imagen por defecto
        }



        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(finalJSON),

            success: function(response) {
                console.log(response);
                let respuesta = JSON.parse(response);
                let template_bar = '';
                template_bar += `
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        `;

                document.getElementById("product-result").className = "card my-4 d-block";
                document.getElementById("container").innerHTML = template_bar;

                listadoProductos();
                init();
                edit = false;
                $('#submit').text('Agregar Producto');
                $('#name').val('');
            }
        });
    });

    //Función eliminarProducto()
    $(document).on('click', '.product-delete', function() {
        if( confirm("¿Deseas eliminar este producto?") ) {
            var id = event.target.parentElement.parentElement.getAttribute("productId");
            $.ajax({
                url: './backend/product-delete.php?id='+id,
                type: 'GET',
                data: {id},

                success: function(response){
                    let respuesta = JSON.parse(response);
                    let template_bar = '';
                    template_bar += `
                                <li style="list-style: none;">status: ${respuesta.status}</li>
                                <li style="list-style: none;">message: ${respuesta.message}</li>
                            `;
                    document.getElementById("product-result").className = "card my-4 d-block";
                    document.getElementById("container").innerHTML = template_bar;

                    listadoProductos();
                }
            });
        }
    });


});