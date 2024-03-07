//Desarrolla una función que calcule el factorial de un número.
//Iterativo
function factorial(n){
    let total = 1;
    for (let i = n; i > 0; i--){
        total *= i;
    }
    return total;
}

console.log(`El factorial de 5 es ${factorial(5)}`);

//Recursivo
function factorialRecursivo(n) {
    // Condición base: si n es 0, el factorial de 0 es 1
    if (n === 0) {
      return 1;
    }
  
    // Llamada recursiva: n! = n * (n-1)!
    // Aquí la función se llama a sí misma con n-1, hasta que n sea 0
    return n * factorialRecursivo(n - 1);
  }

console.log(`El factorial de 5 es ${factorialRecursivo(5)}`)
  