//Implementa una función que calcule el número de Fibonaccien la posición n utilizando recursividad. 
//La secuencia de Fibonacci comienza con dos números 0 y 1, y cada número siguiente es la suma de los dos anteriores.

function fibonacciRecursivo(n){
    if (n === 0) return 0;
    if (n === 1) return 1;

    return fibonacciRecursivo(n - 1) + fibonacciRecursivo(n - 2);
}

//Ejemplos
console.log(fibonacciRecursivo(0)); //0
console.log(fibonacciRecursivo(1)); //1
console.log(fibonacciRecursivo(2)); //1
console.log(fibonacciRecursivo(3)); //2
console.log(fibonacciRecursivo(4)); //3
console.log(fibonacciRecursivo(5)); //5
console.log(fibonacciRecursivo(6)); //8

function fibonacciIterativo(n){
    //Primeros dos números de la secuencia Fibonacci
    let a = 0, b = 1, siguiente;

    //Casos base directos
    if(n === 0) return a;
    if(n === 1) return b;

    //Calculamos el número Fibonacci iterativamente
    for (let i = 2; i <= n; i++) {
        siguiente = a + b; //Calculamos el siguiente número de Fibonacci
        a = b; //Actualizamos a con el valor de b
        b = siguiente; //Actualizamos b con el valor del siguiente número
    }

    return b; //b ahora representa el n-ésimo número de Fibonacci
}

//Ejemplo
console.log(fibonacciIterativo(0)); // 0
console.log(fibonacciIterativo(1)); // 1
console.log(fibonacciIterativo(2)); // 1
console.log(fibonacciIterativo(3)); // 2
console.log(fibonacciIterativo(4)); // 3
console.log(fibonacciIterativo(5)); // 5
console.log(fibonacciIterativo(6)); // 8
console.log(fibonacciIterativo(10)); // 55