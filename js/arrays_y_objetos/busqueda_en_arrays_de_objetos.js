//Tienes un array de objetos que representan a distintos usuarios con propiedades id, nombre, y email. 
//Escribe una función que busque un usuario por su id y retorne el objeto de usuario completo.

const objeto = [
    {id: 1, nombre: "Juan", email: "juan@example."},
    {id: 2, nombre: "María", email: "maria@example."},
    {id: 3, nombre: "Pedro", email: "pedro@example."},
    {id: 4, nombre: "Jose", email: "jose@example."},
    {id: 5, nombre: "Juan", email: "juan@example."}
];

function buscarUsuario(id){
    return objeto.find(persona => persona.id === id);
}

console.log(buscarUsuario(2));