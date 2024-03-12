<?php
//Agrega manejo de errores a tu script PHP para mostrar mensajes de error claros cuando los usuarios ingresan datos incorrectos en el formulario.

//Definimos variables para almacenar mensajes de error
$nombreError = $correoError = $mensajeError = "";

//Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Verificamos el campo Nombre
    if (empty($_POST["nombre"])) {
        $nombreError = "El nombre es requerido";
    } else {
        $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //Verificamos el campo Correo electrónico
    if (empty($_POST["correo"])) {
        $correoError = "El correo electrónico es requerido";
    } else {
        $correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $correoError = "El formato del correo electrónico es inválido";
        }
    }

    //Verificamos el campo Mensaje
    if (empty($_POST["mensaje"])) {
        $mensajeError = "El mensaje es requerido";
    } else {
        $mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mensaje = nl2br($mensaje);
    }

    //Si no hay errores, se envía el correo electrónico
    if (
        empty($nombreError) && empty($correoError) && empty($mensajeError)
    ) {
        mail($correo, "Mensaje de $nombre", $mensaje);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de entradas</title>
</head>

<body>
    <header>
        <h1>Validación de entradas de usuario</h1>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <span style="color: red;"><?php echo $nombreError; ?></span><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" id="correo" required>
        <span style="color: red;"><?php echo $correoError; ?></span><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
        <span style="color: red;"><?php echo $mensajeError; ?></span><br>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>