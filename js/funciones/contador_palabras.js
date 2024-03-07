//Escribe una función que reciba un texto y retorne el número de palabras que contiene. Considera que las palabras están separadas por espacios.

function contarPalabras(texto) {
    //Dividimos el texto en un arreglo de palabras usando el espacio como separador
    const palabras = texto.split(' ');

    //Filtramos el arreglo para eliminar posibles espacios vacíos que puedan contar como palabras
    const palabrasFiltradas = palabras.filter(palabra => palabra.length > 0);

    //Retornamos la cantidad de palabras
    return palabrasFiltradas.length;
}

//Ejemplo
const texto = 'Este es un ejemplo de texto con varias palabras.';
console.log(`El texto: '${texto}' contiene ${contarPalabras(texto)} palabras.`); //Devuelve 9
