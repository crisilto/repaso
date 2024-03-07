//Define un objeto que represente un libro, incluyendo propiedades como título, autor, año, y un método que muestre un resumen del libro.

const libro = {
    titulo: "Crepúsculo",
    autor: "Stephenie Meyer",
    año: 2006,
    parametrosLibro: function() {
        console.log(`El libro ${this.titulo} fue escrito por ${this.autor} en el año ${this.año}`)
    }
}

libro.parametrosLibro();