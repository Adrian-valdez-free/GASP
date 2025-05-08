<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurante Chucho</title>
    <link rel="stylesheet" href="diseño1.css">
</head>
<body>

 <?php
  include "encabezado.php";
  include "Menu_botonesE.php";
  ?>
   <br>   <br>



<div class="centrar">
    <section>
        <div id="carrito"></div>
        <h2 id="total"></h2>
        <button onclick="pagar()" id="btnCobrar" class="BtnEdit" disabled>Cobrar</button>
    </section>
</div>

<script>
// Recuperar y mostrar el carrito
function mostrarCarrito() {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const carritoDiv = document.getElementById("carrito");
    carritoDiv.innerHTML = "";
    let total = 0;

    carrito.forEach((item, index) => {
        const ingredientesTexto = item.ingredientes.length > 0 
            ? item.ingredientes.map(ingrediente => ingrediente.nombre).join(', ') 
            : "Ninguno";

        carritoDiv.innerHTML += `
            <div class="pedidosc">
                <div class="cajapedidos">
                    <h3>${item.nombre}</h3>
                    <p>Ingredientes excluidos: ${ingredientesTexto}</p>
                    <p class="cuadrosG">Cantidad: 
                        <input type="number" value="${item.cantidad}" min="1" onchange="editarCantidad(${index}, this.value)" class="OtherIn">
                    </p>
                    <p>Precio: $${item.precio}</p>
                    <p>Subtotal: $${(item.precio * item.cantidad).toFixed(2)}</p>
                    <button onclick="quitarDelCarrito(${index})" class="BtnEdit">Quitar</button>
                </div>
            </div>
            <br>
        `;

        total += item.precio * item.cantidad;
    });

    document.getElementById("total").innerText = `Total a pagar: $${total.toFixed(2)}`;
    document.getElementById("btnCobrar").disabled = carrito.length === 0;
}

// Editar la cantidad de un producto en el carrito
function editarCantidad(index, nuevaCantidad) {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    nuevaCantidad = parseInt(nuevaCantidad, 10);

    // Asegurarse de que la cantidad es al menos 1
    if (nuevaCantidad > 0) {
        carrito[index].cantidad = nuevaCantidad;
        localStorage.setItem("carrito", JSON.stringify(carrito));
        mostrarCarrito();
    } else {
        alert("La cantidad debe ser al menos 1.");
    }
}

// Quitar productos del carrito
function quitarDelCarrito(index) {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.splice(index, 1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    mostrarCarrito();
}

// Función para realizar el pago
function pagar() {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const total = carrito.reduce((acc, item) => acc + item.precio * item.cantidad, 0);

    fetch('guardar_pedido.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ carrito, total, usuario_id: 1 }) // Asumiendo que el usuario_id es 1 para esta prueba
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("¡Pedido realizado con éxito!");
            localStorage.removeItem("carrito");
            window.location.href = data.redirect;
        } else {
            alert("Error al realizar el pedido: " + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Llamar a mostrarCarrito cuando se cargue la página
mostrarCarrito();
</script>



</body>
</html>
