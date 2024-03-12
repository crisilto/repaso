<?php
//Crea un script PHP que permita a los usuarios cargar archivos desde su dispositivo y guardarlos en el servidor. 
//Asegúrate de manejar adecuadamente la subida de archivos, incluida la validación del tipo y tamaño del archivo.
//Configuración de la carpeta donde se guardarán los archivos
$directorioSubida = "uploads/";
//Verificamos si el directorio de subida existe, si no, lo creamos
if(!file_exists($directorioSubida)){
    mkdir($directorioSubida, 0777, true); //Permisos 0777 para que sea accesible por todos los usuarios
}

//Verificamos si se ha enviado un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    $archivoSubido = $directorioSubida . basename($_FILES['archivo']['name']);
    $tipoArchivo = $_FILES['archivo']['type'];
    $tamañoArchivo = $_FILES['archivo']['size'];

    //Validamos el tipo de archivo (por ejemplo, solo se permiten imágenes)
    $permitidos = array("image/jpeg", "image/png", "image/gif");
    if (!in_array($tipoArchivo, $permitidos)) {
        echo "Error: Solo se permiten archivos de tipo JPG, PNG o GIF";
        exit();
    }

    //Validamos el tamaño del archivo (por ejemplo, no permitir archivos de más de 5MB)
    $tamañoMaximo = 5 * 1024 * 1024; //5MB en bytes
    if ($tamañoArchivo > $tamañoMaximo) {
        echo "Error: El archivo es demasiado grande. El máximo permitido es de 5MB";
        exit();
    }

    //Movemos el archivo cargado al directorio de subida
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivoSubido)) {
        echo "El archivo ha sido subido correctamente";
    } else {
        echo "Error al subir el archivo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulación de archivos</title>
</head>

<body>
    <header>
        <h1>Manipulación de archivos</h1>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo:</label><br>
        <input type="file" name="archivo" id="archivo" accept="image/jpeg, image/png, image/gif"><br>
        <input type="submit" value="Cargar archivo">
    </form>
</body>

</html>