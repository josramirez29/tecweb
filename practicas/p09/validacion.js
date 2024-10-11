        function validarFormulario() {
            // Validar Nombre (requerido, máx. 100 caracteres)
            var nombre = document.forms["productoForm"]["nombre"].value;
            if (nombre === "" || nombre.length > 100) {
                alert("El nombre es requerido y debe tener 100 caracteres o menos.");
                return false;
            }

            // Validar Marca (requerido)
            var marca = document.forms["productoForm"]["marca"].value;
            if (marca === "") {
                alert("La marca es requerida.");
                return false;
            }

            /// Validar Modelo (requerido, alfanumérico, máx. 25 caracteres, permitiendo espacios y guiones)
            var modelo = document.forms["productoForm"]["modelo"].value;
            if (modelo === "" || !/^[a-zA-Z0-9\s\-\.]+$/.test(modelo) || modelo.length > 25) {
                alert("El modelo es requerido, debe ser alfanumérico, puede incluir espacios o guiones, y tener 25 caracteres o menos.");
                return false;
            }


            // Validar Precio (requerido, mayor a 99.99)
            var precio = document.forms["productoForm"]["precio"].value;
            if (precio === "" || parseFloat(precio) <= 99.99) {
                alert("El precio es requerido y debe ser mayor a 99.99.");
                return false;
            }

            // Validar Unidades (requerido, >= 0)
            var unidades = document.forms["productoForm"]["unidades"].value;
            if (unidades === "" || parseInt(unidades) < 0) {
                alert("Las unidades son requeridas y deben ser un número mayor o igual a 0.");
                return false;
            }

            // Validar Detalles (opcional, máx. 250 caracteres)
            var detalles = document.forms["productoForm"]["detalles"].value;
            if (detalles.length > 250) {
                alert("Los detalles deben tener 250 caracteres o menos.");
                return false;
            }

            // Validar Imagen (ruta opcional con valor por defecto si está vacía)
            var imagen = document.forms["productoForm"]["imagen"].value;
            if (imagen === "") {
                document.forms["productoForm"]["imagen"].value = "img/default.jpg";
            }

            return true;
        }