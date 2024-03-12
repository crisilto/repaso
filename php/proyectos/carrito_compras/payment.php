<?php
session_start();

//Simulamos el proceso de pago y luego limpiamos el carrito de compras.
if (isset($_SESSION['total'])) {
    $total = $_SESSION['total'];

    //Limpieza de la sesión del carrito después del pago.
    unset($_SESSION['carrito']); 
    unset($_SESSION['total']);

    //Restablecemos la variable de sesión del carrito a un arreglo vacío.
    $_SESSION['carrito'] = [];

    $mensaje = "Pago realizado con éxito. Total pagado: $total";
} else {
    //Si no hay un total, redireccionamos al index.php.
    $timestamp = time();
    header("Location: index.php?nocache=$timestamp");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de pago</title>
</head>

<body>
    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
    <a href="index.php">Volver a la tienda</a>
</body>

</html>
