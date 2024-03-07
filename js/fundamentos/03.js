//Calcula el área de un rectángulo, triángulo y círculo, recibiendo los datos necesarios del usuario.

function areaRectangulo(largo, ancho){
    return largo*ancho;
}

function areaTriangulo(base, altura){
    return (base*altura)/2;
}

function areaCirculo(radio){
    return Math.PI * Math.pow(radio, 2);
}

console.log(`Tengo un rectángulo que mide 10 de largo y 5 de ancho, su area es de ${areaRectangulo(10,5)}`)
console.log(`Tengo un triángulo cuya base mide 5 y su altura mide 8, su area es de ${areaTriangulo(5,8)}`)
console.log(`Tengo un círculo que tiene un radio de 6, su area es de ${areaCirculo(6)}`)