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

function ejemplo9() {
    var col = prompt('Ingresa el color con que quieras pintar el fondo de la ventana (rojo, verde, azul):', '');

    switch (col) {
        case 'rojo':
            document.bgColor = '#ff0000';
            break;
        case 'verde':
            document.bgColor = '#00ff00';
            break;
        case 'azul':
            document.bgColor = '#0000ff';
            break;
        default:
            document.write('Color no válido. Intenta con rojo, verde o azul.');
    }
}

function ejemplo10() {
    var x = 1;
    while (x <= 100) {
        document.write(x);
        document.write('<br>');
        x = x + 1;
    }
}

function ejemplo11() {
    var x = 1;
    var suma = 0;
    var valor;

    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }

    document.write("La suma de los valores es " + suma + "<br>");
}

function ejemplo12() {
    var valor;
    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        
        if (!isNaN(valor)) {
            document.write('El valor ' + valor + ' tiene ');

            if (valor < 10) {
                document.write('1 dígito');
            } else if (valor < 100) {
                document.write('2 dígitos');
            } else {
                document.write('3 dígitos');
            }

            document.write('<br>');
        } else {
            document.write('Por favor, ingresa un número válido.<br>');
        }

    } while (valor !== 0);
}

function ejemplo13() {
    for (var f = 1; f <= 10; f++) {
        document.write(f + " ");
    }
}

function ejemplo14() {
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
}

function ejemplo15() {
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
}


function procedimiento(valor1,valor2) {
    var inicio;
    for(inicio=valor1; inicio<=valor2; inicio++) {
    document.write(inicio+' ');
}
}

function ejemplo16() {
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    procedimiento(valor1,valor2);
}

function convertirCastellano(x) {
    if (x === 1) return "Uno";
    else if (x === 2) return "Dos";
    else if (x === 3) return "Tres";
    else if (x === 4) return "Cuatro";
    else if (x === 5) return "Cinco";
    else return "valor incorrecto";
}

function ejemplo17() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.write(r);
}

function convertirCastellano2(x) {
    switch (x) {
        case 1: return "Uno";
        case 2: return "Dos";
        case 3: return "Tres";
        case 4: return "Cuatro";
        case 5: return "Cinco";
        default: return "Valor incorrecto";
    }
}

function ejemplo18() {
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano2(valor);
    document.write(r);
}
