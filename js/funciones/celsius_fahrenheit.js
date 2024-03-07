//Crea una función que convierta de grados Celsius a Fahrenheit.

function celsiusToFahrenheit(celsius){
    return (celsius * 9/5) + 32;
}

const myCelsius = 30;
let myFahrenheit = celsiusToFahrenheit(myCelsius);
console.log(`${myCelsius} celsius are ${myFahrenheit} fahrenheit`)