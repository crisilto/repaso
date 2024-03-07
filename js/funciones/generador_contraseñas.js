//Desarrolla una función que genere contraseñas aleatorias. La función debe permitir especificar la longitud de la contraseña y 
//opcionalmente incluir números, símbolos o mayúsculas.

function contraseñaAleatoria(longitud, incluirNumeros = true, incluirSimbolos = true, incluirLetrasMayusculas = true){
    const letrasMinusculas = 'abcdefghijklmnñopqrstuvwxyz';
    const numeros = '0123456789';
    const simbolos = '!@#$%^&*()_+{}:"<>?[];,./\'';
    const letrasMayusculas = letrasMinusculas.toUpperCase();

    let caracteresPermitidos = letrasMinusculas;
    if (incluirNumeros) caracteresPermitidos += numeros;
    if (incluirSimbolos) caracteresPermitidos += simbolos;
    if (incluirLetrasMayusculas) caracteresPermitidos += letrasMayusculas;

    let contraseña = '';
    for (let i = 0; i < longitud; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteresPermitidos.length);
        contraseña += caracteresPermitidos[indiceAleatorio];
    }

    return contraseña;
}

console.log(contraseñaAleatoria(5)); //Es lo mismo que indicar true true true ya que se inicializa con todo en true
console.log(contraseñaAleatoria(5, true, true, true)); //Lo mismo que si no se especificara nada
console.log(contraseñaAleatoria(5, false, false, false)); //Únicamente 5 caracteres de letras en minúscula
console.log(contraseñaAleatoria(5, true, true, false)); //Letras minúsculas con números y símbolos
console.log(contraseñaAleatoria(5, true, false, false)); //Letras minúsculas con números
console.log(contraseñaAleatoria(5, false, true, true)); //Letras minúsculas y mayúsculas con símbolos
console.log(contraseñaAleatoria(5, false, true, false)); //Letras minúsculas con símbolos
console.log(contraseñaAleatoria(5, false, false, true)); //Letras minúsculas y mayúculas
