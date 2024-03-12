<?php
//Define una serie de funciones en PHP para realizar tareas comunes, como calcular el área de un círculo, validar un correo electrónico 
//o generar un saludo personalizado.

//area circulo
function area_circulo($radio){
    return pow($radio, 2) * pi();
}

//validar correo electrónico
function validar_correo($correo){
    return filter_var($correo, FILTER_VALIDATE_EMAIL);
}

//generar saludo personalizado
function generar_saludo($nombre){
    return "Hola $nombre";
}

//uso
$radio = 10;
echo "El área del circulo cuyo radio es $radio es de " . area_circulo($radio) . "<br>";

$mi_correo = 'cris@gmail.com';
echo "Validación del correo electrónico $mi_correo: " . validar_correo($mi_correo) . "<br>";

$mi_nombre = 'Cristina';
echo generar_saludo($mi_nombre) . "! <br>";