<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de entradas</title>
</head>

<body>
    <!--Implementa la validación de entradas de usuario utilizando funciones de PHP, como filter_var() para validar direcciones de correo 
    electrónico o números enteros.-->
    <header>
        <h1>Validación de entradas de usuario</h1>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" id="correo" required>
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])) {
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
            $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $mensaje = nl2br($mensaje);
            mail($correo, "Mensaje de $nombre", $mensaje);
        }
    }
    ?>
</body>

</html>