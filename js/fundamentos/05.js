//Escribe un script que determine si un número es par o impar.

function esPar(n) {
    if (n % 2 === 0) {
        console.log(`El número ${n} es par.`);
    } else {
        console.log(`El número ${n} es impar.`);
    }
}

esPar(4); 
esPar(7); 
