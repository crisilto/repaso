//Tienes un array de objetos que representan diferentes tipos de frutas con propiedades nombre, color, y cantidad. 
//Escribe una función que transforme este array en un objeto donde cada propiedad sea el nombre de una fruta y su valor sea la cantidad 
//total de esa fruta en el array.

const objetos = [
    {nombre: "Manzana", color: "rojo", cantidad: 10},
    {nombre: "Pera", color: "rojo", cantidad: 10},
    {nombre: "Plátano", color: "rojo", cantidad: 10}
];

function frutas(objetos){
    const frutas = {}; //Inicializamos un objeto vacío para almacenar el resultado
    objetos.forEach(fruta => { //Iteramos sobre cada objeto en el array 'objetos'
        frutas[fruta.nombre] = fruta.cantidad; //Asignamos el nombre de la fruta como clave y la cantidad como valor en el objeto 'frutas'
    });
    return frutas; //Retornamos el objeto 'frutas' con las cantidades de cada fruta
}

console.log(frutas(objetos));
