<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Archivo</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="cadenaBuscar">Cadena a buscar:</label>
        <input type="text" id="cadenaBuscar" name="cadenaBuscar"><br><br>

        <label for="cadenaReemplazar">Cadena para reemplazar:</label>
        <input type="text" id="cadenaReemplazar" name="cadenaReemplazar"><br><br>

        <label for="cadenaAñadir">Añadir esta cadena al final del archivo (opcional):</label>
        <input type="text" id="cadenaAñadir" name="cadenaAñadir"><br><br>

        <input type="submit" value="Modificar Archivo">
    </form>
</body>
</html>
<?php
//Verificamos si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rutaArchivo = "archivo.txt";
    $cadenaBuscar = $_POST['cadenaBuscar'];
    $cadenaReemplazar = $_POST['cadenaReemplazar'];
    $cadenaAñadir = $_POST['cadenaAñadir'];

    //Verificamos si el archivo existe
    if (file_exists($rutaArchivo)) {
        //Leemos el contenido del archivo
        $contenido = file_get_contents($rutaArchivo);

        //Verificamos si la cadena a buscar existe en el contenido del archivo
        if (!empty($cadenaBuscar)) {
            if (stripos($contenido, $cadenaBuscar) !== false) {
                //La cadena existe, procedemos a reemplazar
                $contenido = str_ireplace($cadenaBuscar, $cadenaReemplazar, $contenido);
                //Añadimos la nueva cadena al final si se proporcionó
                if (!empty($cadenaAñadir)) {
                    $contenido .= "\n" . $cadenaAñadir;
                }
                //Guardamos los cambios en el archivo
                if (file_put_contents($rutaArchivo, $contenido) !== false) {
                    echo "Se han realizado las modificaciones y se ha guardado el archivo correctamente";
                } else {
                    echo "Error al intentar escribir en el archivo";
                }
            } else {
                //La cadena a buscar no existe en el archivo
                echo "La cadena a buscar no ha sido encontrada en el archivo.";
            }
        } else {
            echo "Por favor, proporciona una cadena a buscar.";
        }
    } else {
        //Si el archivo no existe, se crea y se escribe el contenido inicial
        $contenidoInicial = !empty($cadenaAñadir) ? $cadenaAñadir : "Contenido inicial del archivo";
        if (file_put_contents($rutaArchivo, $contenidoInicial) !== false) {
            echo "Se ha creado el archivo y se ha escrito el contenido inicial correctamente";
        } else {
            echo "Error al crear el archivo";
        }
    }
} else {
    //Si el formulario no se ha enviado, mostramos un mensaje
    echo "Por favor, envíe el formulario.";
}
?>
