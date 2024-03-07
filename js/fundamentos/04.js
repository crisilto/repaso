//Implementa un programa que lea dos números y muestre la suma, resta, multiplicación, y división.

function operaciones(a,b){
    const suma = a+b;
    const resta = a-b;
    const multiplicacion = a*b;
    let division;

    if(b === 0){
        division = "No se puede dividir por cero";
    }else{
        division = a/b;
    }

    console.log(`Suma= ${suma}.\nResta= ${resta}.\nMultiplicación= ${multiplicacion}.\nDivisión= ${division}.`)
}

operaciones(10,5)