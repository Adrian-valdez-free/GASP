<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Chucho</title>
    <link rel="stylesheet" href="diseño1.css">
    <script>
        // Redirigir automáticamente a generar_pdf.php después de 3 segundos
        setTimeout(function() {
            // Obtener el número de pedido de la URL
            const numeroPedido = new URLSearchParams(window.location.search).get('numero_pedido');
            if (numeroPedido) {
                window.location.href = "generar_pdf.php?numero_pedido=" + numeroPedido;
            }
        }, 500); // 500ms = 0.5 segundos
    </script>
</head>
<body>
<?php
  include "encabezado.php";
  include "Menu_botonesE.php";
  ?>
  <br>


    <div class="confirmacion-container">
        <h1 class="TituloPersonal">¡Pedido realizado con éxito!</h1>
        <?php
$mensaje_exito = "El pedido fue realizado con éxito."; // Definir la variable
?>


        <p>El PDF de tu pedido se descargará automáticamente en breve. Si no comienza, haz clic <a href="generar_pdf.php?numero_pedido=<?php echo $_GET['numero_pedido']; ?>">aquí</a>.</p>

        <!-- Aquí va un enlace a la página principal -->
        <a href="MenuE.php" class="boton">Volver a la página principal</a>
    </div>
</body>
</html>
