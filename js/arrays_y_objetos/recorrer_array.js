//Crea un array con tus películas favoritas y muestra cada una con un bucle.

const peliculas = ["Harry Potter", "Saw", "Iron Man", "Destino final"];

//Recorrer array con for (simple)
for (let i = 0; i < peliculas.length; i++) {
    console.log(peliculas[i])
}

//Recorrer array con for...of
for (const pelicula of peliculas) {
    console.log(pelicula);
}