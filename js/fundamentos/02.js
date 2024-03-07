//Escribe un script que convierta grados Celsius a Fahrenheit y viceversa.

function celsiusAFahrenheit(c){
    return (c * 9/5) + 32;
}

function fahrenheitACelsius(f){
    return (f - 32) * 5/9;
}

let myC = 30;
let myF = 64.4;

console.log(`${myC} grados celsius son ${celsiusAFahrenheit(myC)} grados fahrenheit`)
console.log(`${myF} grados fahrenheit son ${fahrenheitACelsius(myF)} grados celsius`)
