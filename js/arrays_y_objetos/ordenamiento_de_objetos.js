//Dado un array de objetos que representan libros con propiedades titulo, autor, y añoDePublicacion, escribe una función que ordene 
//los libros por su año de publicación, del más reciente al más antiguo.

const objetos = [
    {titulo: "Harry Potter y el legado maldito", autor: "JK Rowling", añoDePublicacion: 2016},
    {titulo: "Harry Potter y la Orden del Fénix", autor: "JK Rowling", añoDePublicacion: 2003},
    {titulo: "Harry Potter y el cáliz de fuego", autor: "JK Rowling", añoDePublicacion: 2000},
    {titulo: "Harry Potter y la cámara secreta", autor: "JK Rowling", añoDePublicacion: 1998},
    {titulo: "Harry Potter y la piedra filosofal", autor: "JK Rowling", añoDePublicacion: 1997},
];

function ordenarPorAñoDePublicacion(objetos){
    return objetos.sort((a, b) => b.añoDePublicacion - a.añoDePublicacion);
}

console.log(ordenarPorAñoDePublicacion(objetos));