<?php
//Crea un script PHP que declare diferentes tipos de variables (enteros, cadenas, booleanos, arrays) y realiza operaciones básicas con ellas (suma, concatenación, comparaciones).

//Declaramos diferentes tipos de variables
$n1 = 10; //Entero
$n2 = 5; //Entero
$f1 = 'Hola'; //Cadena
$f2 = 'mundo'; //Cadena
$booleano = true; //Booleano
$array_numeros = array(1, 2, 3, 4, 5, 6, 7, 8); //Array de enteros
$array_nombres = array('Juan', 'Pedro', 'María'); //Array de cadenas

//Realizamos operaciones básicas
$suma = $n1 + $n2; //Suma de enteros
$concatenacion = $f1 . ' ' . $f2; //Concatenación de cadenas
$comparacion = $n1 > $n2 ? "El número $n1 es mayor que el número $n2" : "El número $n2 es mayor que el número $n1"; //Comparación de enteros

//Mostramos los resultados
echo "La suma de $n1 y $n2 es: $suma <br>";
echo "La concatenación de '$f1' y '$f2' es: $concatenacion <br>";
echo "$comparacion <br>";
?>