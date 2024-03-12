<?php
//Usando mysql, realiza la conexión a la base de datos, una consulta y utiliza la función mysqli_fetch_assoc() para procesar los resultados 
//de las consultas SQL y mostrarlos de manera adecuada en la página web.
$host = "localhost";
$db_name = "concesionario";
$user = "root";
$pass = "";

//Creamos la conexión
$conn = new mysqli($host, $user, $pass, $db_name);

//Verificamos la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Preparamos la consulta
$sql = "SELECT id, nombre, email FROM usuarios";
$result = $conn->query($sql);

//Verificamos si la consulta ha sido correcta
if($result === false) {
    die("Error al ejecutar la consulta: ". $conn->error);
}

//Verificamos si se encontraron filas
if ($result->num_rows > 0) {
    //Mostramos los resultados
    echo "<h2>Lista de Usuarios</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
    //Recuperamos y mostramos cada fila de resultados
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
//Cerramos la conexión
$conn->close();
