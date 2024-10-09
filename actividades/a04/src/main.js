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

function ejemplo4() {
    var valor1 = prompt('Introducir primer número:', '');
    var valor2 = prompt('Introducir segundo número:', '');

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    document.write('La suma es ');
    document.write(suma);
    document.write('<br>');
    document.write('El producto es ');
    document.write(producto);
}

function ejemplo5() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');

    if (nota >= 4) {
        document.write(nombre + ' está aprobado con un ' + nota);
    }
}

function ejemplo6() {
    var num1 = prompt('Ingresa el primer número:', '');
    var num2 = prompt('Ingresa el segundo número:', '');

    num1 = parseInt(num1);
    num2 = parseInt(num2);

    if (num1 > num2) {
        document.write('El mayor es ' + num1);
    } else {
        document.write('El mayor es ' + num2);
    }
}

function ejemplo7() {
    var nota1 = prompt('Ingresa 1ra. nota:', '');
    var nota2 = prompt('Ingresa 2da. nota:', '');
    var nota3 = prompt('Ingresa 3ra. nota:', '');

    // Convertimos los strings en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro = (nota1 + nota2 + nota3) / 3;

    if (pro >= 7) {
        document.write('Aprobado');
    } else if (pro >= 4) {
        document.write('Regular');
    } else {
        document.write('Reprobado');
    }
}

function ejemplo8() {
    var valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '');

    // Convertimos a entero
    valor = parseInt(valor);

    switch (valor) {
        case 1:
            document.write('Uno');
            break;
        case 2:
            document.write('Dos');
            break;
        case 3:
            document.write('Tres');
            break;
        case 4:
            document.write('Cuatro');
            break;
        case 5:
            document.write('Cinco');
            break;
        default:
            document.write('Debe ingresar un valor comprendido entre 1 y 5.');
    }
}

