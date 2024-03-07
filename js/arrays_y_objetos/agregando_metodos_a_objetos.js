//Define un objeto que represente una calculadora con propiedades valorActual y métodos para sumar, restar, multiplicar y dividir. 
//Los métodos deben modificar valorActual para reflejar el resultado de la operación y deben permitir encadenamiento de métodos.

const calculadora = {
    valorActual: 0,
    sumar: function(nuevoValor){
        this.valorActual += nuevoValor;
        return this;
    },
    restar: function(nuevoValor){
        this.valorActual -= nuevoValor;
        return this;
    },
    multiplicar: function(nuevoValor){
        this.valorActual *= nuevoValor;
        return this;
    },
    dividir: function(nuevoValor){
        this.valorActual /= nuevoValor;
        return this;
    },
    obtenerValor: function(){
        return this.valorActual;
    }
}

calculadora.sumar(10).multiplicar(2).restar(5).dividir(3);
console.log(calculadora.obtenerValor());