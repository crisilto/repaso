//Escribe una función que reciba un array de nombres y devuelva un array de objetos, donde cada objeto tenga una propiedad nombre y un id único 
//(puedes simplemente usar el índice del array más 1 como id).
const nombres = [
    "Juan",
    "María",
    "Pedro",
    "Jose",
    "Juan"
];

function transformarNombresAObjetos(nombres){
    const nombresObjetos = nombres.map((nombre, index) => {
        return {
            nombre: nombre,
            id: index + 1
        };
    });
    return nombresObjetos;
}

const nombresObjetos = transformarNombresAObjetos(nombres);