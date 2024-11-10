$(document).ready(function() {
    let edit = false;

    console.log('JQuery está trabajando!');
    list();

    // Función para listar los productos
    function list() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                let productos = JSON.parse(response);
                if (productos.length > 0) {
                    let template = '';

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
                    $('#products').html(template);
                }
            }
        });
    }

    // Función para la búsqueda de productos
    $('#search').keyup(function(e) {
        e.preventDefault();
        let search = $('#search').val();

        $.ajax({
            url: './backend/product-search.php',
            type: 'GET',
            data: { search: search },
            success: function(response) {
                let productos = JSON.parse(response);
                let template = '';
                let template_bar = '';

                if (productos.length > 0) {
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
                                <td>
                                    <a href="#" class="product-item">${producto.nombre}</a>
                                </td>
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

                    $("#product-result").removeClass("d-none").addClass("d-block");
                    $("#container").html(template_bar);
                    $("#products").html(template);
                } else {
                    $("#product-result").removeClass("d-block").addClass("d-none");
                    $("#container").html("");
                    $("#products").html("");
                }
            },
            error: function() {
                alert("Error, no se pudo hacer la búsqueda");
            }
        });
    });

    // Función para agregar productos
    $('#product-form').submit(function(e) {
        e.preventDefault();
    
        let json = {
            id: $('#productId').val(),
            nombre: $('#form-name').val(),
            marca: $('#form-brand').val(),
            modelo: $('#form-model').val(),
            precio: $('#form-price').val(),
            detalles: $('#form-details').val(),
            unidades: $('#form-units').val(),
            imagen: $('#form-img').val(),
            accion: 'agregar' 
        };
    
        let errores = [];
        let success = [];
    
        // Validaciones
        //Nombre
        if (!json.nombre || json.nombre.length == 0) {
            errores.push('El nombre es obligatorio');
        } else if (json.nombre.length > 100) {
            errores.push('El numero de caracteres máximo para el nombre del producto es de 100');
        }
        else {
            success.push('El nombre cumple con los requerimientos');
        }
        
        //Marca
        if (!json.marca || json.marca.length == 0) {
            errores.push('La marca es obligatoria');
        }
        else {
            success.push('La marca cumple con los requerimientos');
        }

        //Modelo
        if (!json.modelo || json.modelo.length == 0) {
            errores.push('El modelo es obligatorio');
        } else if (!/^[a-zA-Z0-9 ]+$/.test(json.modelo) || json.modelo.length > 25) {
            errores.push('El modelo debe ser alfanumérico y menor a 25 caracteres.');
        }
        else {
            success.push('El modelo cumple con los requerimientos');
        }
    
        //Precio
        if (!json.precio || json.precio < 99.99) {
            errores.push('El precio es obligatorio y debe ser mayor a $99.99');
        }

        else {
            success.push('El precio cumple con los requerimientos');
        }
    
        //Detalles
        if (json.detalles && json.detalles.length > 250) {
            errores.push('El numero máximo de caracteres para los detalles es de 250');
        }
    
        if (json.unidades == null || json.unidades < 1) {
            errores.push('El número de unidades es obligatorio y debe ser al menos 1');
        }

        else {
            success.push('Los detalles cumplen con los requerimientos');
        }
         
        // Asignar una imagen por defecto
        if (!json.imagen || json.imagen.length == 0) {
            json.imagen = 'img/default.png';
        }
        
        if (errores.length > 0) {
            let template_bar = '<ul>';
            template_bar += '<li style="list-style: none;">status: Error</li>';
            errores.forEach(error => {
                template_bar += `<li style="list-style: none;">message: ${error}</li>`;
            });
            template_bar += '</ul>';
            $("#product-result").removeClass("d-none").addClass("d-block");
            $("#container").html(template_bar);
        } else {
            let url = edit ? './backend/product-edit.php' : './backend/product-add.php'; // Aquí cambia dependiendo si es edición o nuevo
            
            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(json),
                success: function(response) {
                    let respuesta = JSON.parse(response);
                    let template_bar = `
                        <ul>
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        </ul>
                    `;
                    $("#product-result").removeClass("d-none").addClass("d-block");
                    $("#container").html(template_bar);
                    list();
                    edit = false;
                    $('#product-form').trigger('reset');
                    $('#submit-button').text('Agregar Producto');
                }
            });
        }
    });    

    // Función para eliminar un producto
    $(document).on('click', '.product-delete', function() {
        if (confirm("De verdad deseas eliminar el Producto")) {
            let id = $(this).closest('tr').attr('productId');
            $.ajax({
                url: './backend/product-delete.php?id=' + id,
                type: 'GET',
                success: function(response) {
                    let respuesta = JSON.parse(response);
                    let template_bar = `
                        <ul>
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        </ul>
                    `;
                    $("#product-result").removeClass("d-none").addClass("d-block");
                    $("#container").html(template_bar);
                    list();
                }
            });
        }
    });

    // Función para editar un producto
    $(document).on('click', '.product-item', function() {
        let id = $(this).closest('tr').attr('productId');
        $.post('./backend/product-single.php', { id }, function(response) {
            const product = JSON.parse(response);
            $('#productId').val(id);
            $('#form-name').val(product[0].nombre);
            $('#form-brand').val(product[0].marca);
            $('#form-model').val(product[0].modelo);
            $('#form-price').val(product[0].precio);
            $('#form-details').val(product[0].detalles);
            $('#form-units').val(product[0].unidades);
            $('#form-img').val(product[0].imagen);

            edit = true;
            $('#submit-button').text('Editar Producto');
        });
    });

    // Función para validar el nombre del producto al escribir
    $('#form-name').keyup(function(e) {
        e.preventDefault();
        let name = $('#form-name').val();

        $.ajax({
            url: './backend/product-single.php',
            type: 'GET',
            data: { name: name },
            success: function(response) {
                let template_bar = '';
                if (response.length > 2) {
                    template_bar = `
                        <ul>
                            <li style="list-style: none;">status: Error</li>
                            <li style="list-style: none;">Ya existe un producto con ese nombre</li>
                        </ul>
                    `;
                } else {
                    template_bar = `
                        <ul>
                            <li style="list-style: none;">status: Success</li>
                            <li style="list-style: none;">Sin coincidencias en la BD, nombre válido</li>
                        </ul>
                    `;
                }
                $("#product-result").removeClass("d-none").addClass("d-block");
                $("#container").html(template_bar);
            }
        });
    });
});
