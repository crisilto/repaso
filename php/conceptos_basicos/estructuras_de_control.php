<?php
//Escribe un programa PHP que utilice estructuras de control como if, else, elseif, switch y while para realizar diversas tareas, 
//como mostrar mensajes condicionales o iterar sobre un array.

//if / elseif / else
$numero = 10;
if($numero > 10){
    echo "El número es mayor que 10 <br>";
}else if($numero < 10){
    echo "El número es menor que 10 <br>";
}else{
    echo "El número es igual a 10 <br>";
}

//switch
$dia = 'martes';
switch($dia){
    case 'lunes':
        echo "El día es lunes <br>";
        break;
    case'martes':
        echo "El día es martes <br>";
        break;
    case'miercoles':
        echo "El día es miercoles <br>";
        break;
    case 'jueves':
        echo "El día es jueves <br>";
        break;
    case 'viernes':
        echo "El día es viernes <br>";
        break;
    case'sabado':
        echo "El día es sabado <br>";
        break;
    case 'domingo':
        echo "El día es domingo <br>";
        break;
    default:
        echo "El día no existe <br>";
        break;
}

//foreach
$frutas = array('manzana', 'pera', 'kiwi', 'melón');
echo "Las frutas son: <br>";
foreach($frutas as $fruta){
    echo $fruta. "<br>";
}

//for
$deportes = array('futbol', 'basket', 'tenis', 'tenis');
echo "Los deportes son: <br>";
for ($i=0; $i < count($deportes); $i++) { 
    echo $deportes[$i]. "<br>";
}

//while
$comidas = array('pizza', 'pasta', 'burrito', 'burrito');
$i = 0;
echo "Las comidas son: <br>";
while($i < count($comidas)){
    echo $comidas[$i]. "<br>";
    $i++;
}