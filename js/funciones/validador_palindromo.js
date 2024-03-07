//Crea una función que determine si una cadena de texto es un palíndromo (se lee igual hacia adelante que hacia atrás). 
//La función debe ser capaz de ignorar espacios, signos de puntuación y no diferenciar entre mayúsculas y minúsculas.

function esPalindromo(texto){
    //Normalizar el texto: remover espacios, signos de puntuación y convertir a minúsculas
    const textoNormalizado = texto.toLowerCase().replace(/[\W_]/g, '');

    //Invertimos el texto normalizado
    const textoInvertido = textoNormalizado.split('').reverse().join('');

    //Comparamos el texto normalizado con el invertido
    return textoNormalizado === textoInvertido;
}

//Uso
console.log(esPalindromo("Anita lava la tina")); //true
console.log(esPalindromo("No es un palindromo")); //false
console.log(esPalindromo("A man, a plan, a canal, Panama")); //true