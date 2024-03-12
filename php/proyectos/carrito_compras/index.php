<?php
session_start();

include 'products.php';

//Restablecer el carrito si está vacío después de un pago.
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <script>
        function addToCart(producto_id) {
            var cantidad = document.getElementById('cantidad_' + producto_id).value;
            sendCartRequest("add_to_cart", producto_id, cantidad);
        }

        function updateCartItem(producto_id) {
            var cantidad = document.getElementById('cantidad_' + producto_id).value;
            sendCartRequest("update_cart", producto_id, cantidad);
        }

        function removeCartItem(producto_id) {
            sendCartRequest("remove_from_cart", producto_id);
        }

        function sendCartRequest(action, producto_id, cantidad = null) {
            var xhr = new XMLHttpRequest();
            var params = `action=${action}&producto_id=${producto_id}`;
            if (cantidad !== null) {
                params += `&cantidad=${cantidad}`;
            }
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.mensaje);
                    updateCartView();
                }
            };
            xhr.send(params);
        }

        function updateCartView() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "cart.php?action=get_cart", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("carrito").innerHTML = xhr.responseText;
                    checkCartAndTogglePayButton();
                }
            };
            xhr.send();
        }

        function checkCartAndTogglePayButton() {
            var btnPagar = document.getElementById('btnPagar');
            if (!btnPagar) return; //Si no existe el botón, termina la función

            var carrito = document.getElementById('carrito');
            if (carrito && carrito.innerHTML.includes("Cantidad:")) {
                //Si el carrito contiene al menos un producto, muestra el botón
                btnPagar.style.display = '';
            } else {
                //Si el carrito está vacío, oculta el botón
                btnPagar.style.display = 'none';
            }
        }

        function checkout() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    window.location.href = "payment.php";
                }
            };
            xhr.send("action=checkout");
        }

        //Llama a checkCartAndTogglePayButton al cargar la página para asegurarse
        //de que el botón de pagar se muestre u oculte correctamente según el contenido del carrito.
        document.addEventListener('DOMContentLoaded', function() {
            updateCartView(); //Esto también llamará a checkCartAndTogglePayButton
        }, false);
    </script>

</head>

<body>
    <header>
        <h1>Productos Disponibles</h1>
    </header>
    <div id="productos_disponibles">
        <?php foreach ($productos as $id => $producto) : ?>
            <div>
                <h2><?php echo $producto['nombre']; ?></h2>
                <p><?php echo $producto['precio']; ?></p>
                <input type="number" id="cantidad_<?php echo $id; ?>" value="1" min="1">
                <button onclick="addToCart(<?php echo $id; ?>)">Agregar al Carrito</button>
                <button onclick="updateCartItem(<?php echo $id; ?>)">Actualizar Cantidad</button>
                <button onclick="removeCartItem(<?php echo $id; ?>)">Eliminar del Carrito</button>
            </div>
        <?php endforeach; ?>

        <div id="carrito">
            <?php
            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                echo "<h2>Carrito de Compras</h2>";
                echo "<ul>";
                foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
                    echo "<li>" . $productos[$producto_id]['nombre'] . " - Cantidad: " . $cantidad . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>El carrito está vacío.</p>";
            }
            ?>
        </div>
        <?php if (!empty($_SESSION['carrito'])) : ?>
            <form action="cart.php" method="post">
                <input type="hidden" name="action" value="checkout">
                <button type="submit" id="togglePayButton">Pagar</button>
            </form>
        <?php endif; ?>


</body>

</html>