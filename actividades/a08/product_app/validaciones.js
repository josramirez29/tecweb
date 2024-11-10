// Función para validar el nombre
function validarNombre() {
    const nombre = document.getElementById('form-name').value;
    if (nombre.trim() === "") {
        alert("El nombre es obligatorio");
        return false;
    }
    return true;
}

// Función para validar la marca
function validarMarca() {
    const marca = document.getElementById('form-brand').value;
    if (marca === "") {
        alert("La marca es obligatoria");
        return false;
    }
    return true;
}

// Función para validar el modelo
function validarModelo() {
    const modelo = document.getElementById('form-model').value;
    if (modelo.trim() === "") {
        alert("El modelo es obligatorio");
        return false;
    }
    return true;
}

// Función para validar el precio
function validarPrecio() {
    const precio = document.getElementById('form-price').value;
    if (precio.trim() === "" || isNaN(precio) || parseFloat(precio) <= 0) {
        alert("El precio tiene que ser mayor a 0");
        return false;
    }
    return true;
}

// Función para validar las unidades
function validarUnidades() {
    const unidades = document.getElementById('form-units').value;
    if (unidades.trim() === "" || isNaN(unidades) || parseInt(unidades) <= 0) {
        alert("Las unidades deben tener un valor mayor a 0");
        return false;
    }
    return true;
}
