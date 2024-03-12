<?php
session_start();
include 'products.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_to_cart':
            $producto_id = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];

            if (!isset($productos[$producto_id])) {
                sendJsonResponse("Producto no encontrado.");
            }

            if (isset($_SESSION['carrito'][$producto_id])) {
                $_SESSION['carrito'][$producto_id] += $cantidad;
            } else {
                $_SESSION['carrito'][$producto_id] = $cantidad;
            }

            sendJsonResponse("Producto agregado al carrito correctamente.");
            error_log(print_r($_SESSION['carrito'], true));
            break;

        case 'update_cart':
            $producto_id = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION['carrito'][$producto_id])) {
                if ($cantidad <= 0) {
                    unset($_SESSION['carrito'][$producto_id]);
                    sendJsonResponse("Producto eliminado del carrito.");
                } else {
                    $_SESSION['carrito'][$producto_id] = $cantidad;
                    sendJsonResponse("Cantidad actualizada.");
                }
            } else {
                sendJsonResponse("El producto no está en el carrito.");
            }
            break;

        case 'remove_from_cart':
            $producto_id = $_POST['producto_id'];

            if (isset($_SESSION['carrito'][$producto_id])) {
                unset($_SESSION['carrito'][$producto_id]);
                sendJsonResponse("Producto eliminado del carrito.");
            } else {
                sendJsonResponse("El producto no está en el carrito.");
            }
            break;

        case 'checkout':
            $total = 0;
            foreach ($_SESSION['carrito'] as $id => $cantidad) {
                $total += $cantidad * $productos[$id]['precio'];
            }
            $_SESSION['total'] = $total;
            header("Location: payment.php");
            exit();
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'get_cart') {
    //Lógica para devolver la vista actualizada del carrito
    $cart_view = "";
    if (!empty($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
            $cart_view .= "<li>" . $productos[$producto_id]['nombre'] . " - Cantidad: " . $cantidad . "</li>";
        }
    } else {
        $cart_view = "<p>El carrito está vacío.</p>";
    }
    echo $cart_view;
    exit();
}

//edirigimos de vuelta a la página principal
header("Location: index.php");
exit();

function sendJsonResponse($message)
{
    header('Content-Type: application/json');
    echo json_encode(["mensaje" => $message]);
    exit();
}
