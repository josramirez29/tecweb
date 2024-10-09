function getDatos() {
    var nombre = prompt('Nombre: ', '');
    var edad = prompt('Edad: ', 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre: '+ nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad: '+ edad + '</h3>';
}

function ejemplo1() {
    document.write('Hola Mundo');
}

function ejemplo2() {
    var nombre = 'Jos';
    var edad = 20;
    var altura = 1.60;
    var casado = false;
    document.write( nombre );
    document.write( '<br>' );
    document.write( edad );
    document.write( '<br>' );
    document.write( altura );
    document.write( '<br>' );
    document.write( casado );
}

function ejemplo3() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var edad = prompt('Ingresa tu edad:', '');
    
    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre: '+ nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad: '+ edad + '</h3>';

    document.write('Hola ');
    document.write(nombre);
    document.write(', así que tienes ');
    document.write(edad);
    document.write(' años.');
}

