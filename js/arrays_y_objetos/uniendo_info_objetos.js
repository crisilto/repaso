//Tienes dos arrays de objetos donde uno contiene información sobre libros (título y autor), y el otro contiene información sobre 
//la disponibilidad de los libros (título y estado de disponibilidad). Escribe una función que combine estos dos arrays en un solo array 
//de objetos que incluya el título, autor y estado de disponibilidad de cada libro.


//Array con información de libros (título y autor)
const libros = [
    { titulo: "Crepúsculo", autor: "Stephanie Meyer" },
    { titulo: "Don Quijote de la Mancha", autor: "Miguel de Cervantes"}
];

//Array con información sobre la disponibilidad de los libros (título y disponibilidad)
const disponibilidad = [
    { titulo: "Crepúsculo", disponible: true },
    { titulo: "Don Quijote de la Mancha", disponible: false }
];


//Función para combinar ambos arrays en un solo array de objetos
function combinarInformacion(libros, disponibilidad){
    const librosCombinados = libros.map(libro => {
        //Encontrar la disponibilidad correspondiente al libro actual
        const libroDisponible = disponibilidad.find(item => item.titulo === libro.titulo);

        //Combinar la información en un nuevo objeto
        return{
            titulo: libro.titulo,
            autor: libro.autor,
            disponible: libroDisponible ? libroDisponible.disponible : false
        }
    });

    return librosCombinados;
}

//Ejemplo
const resultado = combinarInformacion(libros, disponibilidad);
console.log(resultado);