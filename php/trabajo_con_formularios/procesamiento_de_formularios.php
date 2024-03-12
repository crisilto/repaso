<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de formularios</title>
</head>

<body>
    <!--Crea un formulario HTML con campos para nombre, correo electrónico y mensaje. Luego, utiliza PHP para procesar los datos enviados desde 
    el formulario, validarlos y mostrar un mensaje de confirmación al usuario.-->
    <header>
        <h1>Procesamiento de formularios</h1>
    </header>

    <?php
    //Función para validar el formulario
    function validar_formulario($nombre, $correo, $mensaje)
    {
        $validacion = true;
        if (empty($nombre) || empty($correo) || empty($mensaje)) {
            $validacion = false;
        }
        return $validacion;
    }

    //Procesamiento del formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $mensaje = $_POST["mensaje"];

        //Validación del formulario
        if (validar_formulario($nombre, $correo, $mensaje)) {
            echo "<p>Gracias $nombre, tu mensaje ha sido enviado con éxito.</p>";
        } else {
            echo "<p>Por favor, completa todos los campos del formulario.</p>";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="correo">Correo:</label>
        <input type="text" id="correo" name="correo"><br>

        <label for="mensaje">Mensaje:</label>
        <input type="text" id="mensaje" name="mensaje"><br>

        <input type="submit" value="Enviar">
    </form>


</body>

</html>