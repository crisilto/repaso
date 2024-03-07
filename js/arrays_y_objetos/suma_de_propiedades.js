//Dado un array de objetos que representan productos con propiedades nombre, cantidad y precioPorUnidad, escribe una función que calcule 
//el costo total de todos los productos.

const product = [
    {nombre: "Notebook", cantidad: 10, precioPorUnidad: 2500},
    {nombre: "Laptop", cantidad: 10, precioPorUnidad: 1500},
    {nombre: "Tablet", cantidad: 10, precioPorUnidad: 1000}
];

function costoTotal(productos){
    let costoTotal = 0;
    productos.forEach(producto => {
        costoTotal += producto.cantidad * producto.precioPorUnidad;
    });
    return costoTotal;
}

console.log(`El costo total de los productos es ${costoTotal(product)}`);