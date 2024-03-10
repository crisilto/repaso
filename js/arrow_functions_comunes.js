//!Generar un número aleatorio
const numeroAleatorio = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;
numeroAleatorio(1, 10); //Generará un número entre 1 y 10.

//!Verificar si un número es par
const esPar = (numero) => numero % 2 === 0;
esPar(4); //true
esPar(5); //false

//!Verificar si un número es impar
const esImpar = (numero) => numero % 2 !== 0;
esImpar(4); //false
esImpar(5); //true

//!Comprobar si un número es primo
const esPrimo = (numero) => {
    for (let i = 2; i <= Math.sqrt(numero); i++) {
        if (numero % i === 0) return false;
    }
    return true;
}
esPrimo(4); //false
esPrimo(5); //true

//!Capitalizar una cadena
const capitalizar = (cadena) => cadena.split(' ').map(palabra => palabra.charAt(0).toUpperCase() + palabra.slice(1)).join(' ');
console.log(capitalizar("hola mundo")); // Hola Mundo


//!Filtrar elementos únicos de un arreglo
const filtrarUnicos = (arreglo) => [...new Set(arreglo)];
console.log(filtrarUnicos([1, 2, 3, 4, 4, 5, 5])); //[1, 2, 3, 4, 5]

//!Ordenar un arreglo de objetos por una propiedad
const ordenar = (arr, prop) => arr.sort((a, b) => a[prop] > b[prop] ? 1 : -1); //De menor a mayor
const ordenar2 = (arr, prop) => arr.sort((a, b) => a[prop] < b[prop] ? 1 : -1); //De mayor a menor

//!Formatear fechas
const formatearFecha = (fecha) => {
    let dia = fecha.getDate();
    let mes = fecha.getMonth();
    let año = fecha.getFullYear();
    return `${dia}/${mes}/${año}`;
};
//console.log(formatearFecha(new Date(2021(año), 5(mes), 18(dia)))); //18/05/2021

//!Convertir un string a boolean
const stringABoolean = (str) => str.toLowerCase() === "true";
console.log(stringABoolean("true")); //true
console.log(stringABoolean("false")); //false

//!Filtrar elementos por una condición
const filtrarPorCondicion = (arr, condicion) => arr.filter(condicion);
const numeros = [1, 2, 3, 4, 5, 6];
const numerosPares = filtrarPorCondicion(numeros, (numero) => numero % 2 === 0);
console.log(numerosPares); //[2, 4, 6] 

//!Sumar todos los elementos de un arreglo
const sumarElementos = (arr) => arr.reduce((acc, valorActual) => acc + valorActual, 0);
console.log(sumarElementos([1, 2, 3, 4])); //10

//!Debounce 
//La técnica debounce es útil para limitar la tasa a la que se dispara una función. 
//Por ejemplo, se puede usar para reducir la cantidad de llamadas a una función de búsqueda mientras el usuario escribe en un campo de texto.
const debounce = (func, delay) => {
    let debounceTimer;
    return function () {
        const context = this, args = arguments;
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => func.apply(context, args), delay);
    };
};
const loguearInput = debounce(() => console.log("Input logueado!"), 2000)
//loguearInput se ejecutará 2 segundos después de la última llamada a la función.

//!Comprobar si todos los elementos de un arreglo cumplen una condición
const todosCumplen = (arr, condicion) => arr.every(condicion);
const mayoresDeEdad = [23, 24, 25, 26, 27, 28, 29, 29];
console.log(todosCumplen(mayoresDeEdad, edad => edad >= 18)); //true

//!Encontrar el primer elemento en un arreglo que cumpla una condición
const encontrarPrimero = (arr, condicion) => arr.find(condicion);
const productos = [
    { id: 1, nombre: "Notebook", precio: 1000 },
    { id: 2, nombre: "Laptop", precio: 1500 },
    { id: 3, nombre: "Tablet", precio: 1000 },
    { id: 4, nombre: "Silla", precio: 1600 }
];
console.log(encontrarPrimero(productos, producto => producto.precio > 1000)); //{id: 2, nombre: "Laptop", precio: 1500}

//!Crear un objeto a partir de dos arreglos
const crearObjeto = (keys, values) => keys.reduce((obj, key, index) => ({ ...obj, [key]: values[index] }), {});
const claves = ['id', 'nombre', 'precio'];
const valores = [1, 'Teclado', 19.99];
console.log(crearObjeto(claves, valores)); // { id: 1, nombre: "Teclado", precio: 19.99 }

//!Copia profunda de objetos o arreglos
const copiaProfunda = (obj) => JSON.parse(JSON.stringify(obj));
const original = { nombre: "Ana", detalles: { edad: 25 } };
const copia = copiaProfunda(original);
copia.detalles.edad = 30; //Esto no modifica "original"
console.log(original); //{nombre: "Ana", detalles: {edad: 25}}
console.log(copia); //{ nombre: "Ana", detalles: {edad: 30}}

//!Generar un slug a partir de un string
const generarSlug = (cadena) => {
    //Primero, normalizamos la cadena para descomponer los acentos
    //Usamos 'NFD' para la normalización de descomposición de compatibilidad canónica
    //y luego eliminamos los caracteres diacríticos con una expresión regular
    const sinAcentos = cadena.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    //Luego, convertimos a minúsculas, reemplazamos espacios por guiones
    //y eliminamos todo lo que no sea alfanumérico o guión
    return sinAcentos
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
};
console.log(generarSlug("Hola Mundo, ¿Cómo estás?")); //"hola-mundo-como-estas"
