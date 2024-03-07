//Dado un array de objetos que representan personas con propiedades nombre, edad, y ocupacion, escribe una función que retorne un nuevo array 
//de objetos que contengan solo a las personas mayores de 18 años y que sean estudiantes.

const personas = [
    { nombre: "Ana", edad: 19, ocupacion: "estudiante" },
    { nombre: "Juan", edad: 22, ocupacion: "ingeniero" },
    { nombre: "Luisa", edad: 20, ocupacion: "estudiante" },
    { nombre: "Jorge", edad: 17, ocupacion: "estudiante" },
    { nombre: "Carlos", edad: 23, ocupacion: "estudiante" }
];

function filtrarEstudiantesMayores(personas){
    return personas.filter(persona => persona.edad > 18 && persona.ocupacion === "estudiante");
}

const estudiantesMayores = filtrarEstudiantesMayores(personas);
console.log(estudiantesMayores);