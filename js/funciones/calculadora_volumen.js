//Crea funciones para calcular el volumen de distintas formas geométricas como cubos, cilindros y esferas. Recuerda las fórmulas:
//Cubo: V = lado^3
//Cilindro: V = PI * radio^2 * altura
//Esfera: V = 4/3PI * radio^3

function volumenCubo(lado){
    return Math.pow(lado, 3);
}
console.log(`El volumen de un cubo, el cual cada lado mide 3, es de ${volumenCubo(3)}`)

function volumenCilindro(radio, altura){
    return Math.PI * Math.pow(radio, 2) * altura;
}
console.log(`El volumen de un cilindro, cuyo radio mide 3 y su altura es de 5, es de ${volumenCilindro(3, 5)}`)

function volumenEsfera(radio){
    return (4/3*Math.PI) * Math.pow(radio, 3);
}
console.log(`El volumen de una esfera, cuyo radio mide 5, es de ${volumenEsfera(5)}`)
