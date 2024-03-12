<?php
//Usando PDO, realiza la conexión a la base de datos, una consulta y utiliza la función PDOStatement::fetch() para procesar los resultados 
//de las consultas SQL y mostrarlos de manera adecuada en la página web.

$host = "localhost";
$db_name = "concesionario";
$user = "root";
$pass = "";

try {
    //Creamos la conexión
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Preparamos y ejecutamos la consulta
    $stmt = $conn->prepare("SELECT id, nombre, email FROM usuarios");
    $stmt->execute();

    //Establecemos el modo de fetch a asociativo
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //Mostramos los resultados de la consulta
    echo "<h2>Lista de Usuarios</h2>";
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>" . $row["id"] . " - " . $row["nombre"] . " - " . $row["email"] . "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Cerramos la conexión
$conn = null;
?>
