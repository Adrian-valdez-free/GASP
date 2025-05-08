<?php
require 'conexion.php';

// Obtener los pedidos pendientes
$query_pendientes = "SELECT * FROM pedidos WHERE estado = 'pendiente' ORDER BY fecha_pedido DESC";
$result_pendientes = mysqli_query($conectar, $query_pendientes);

// Obtener los pedidos completados
$query_completados = "SELECT * FROM pedidos WHERE estado = 'completado' ORDER BY fecha_pedido DESC";
$result_completados = mysqli_query($conectar, $query_completados);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Chucho</title>
    <link rel="stylesheet" href="diseño1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
  include "encabezado.php";
  include "Menu_botonesE.php";
  ?>
    <div class="container-pedidos-q5er">
        <h1>Pedidos Pendientes</h1>
        <br>
        <!-- Lista de pedidos pendientes -->
        <div class="list-pedidos-27vs">
            <?php while ($pedido = mysqli_fetch_assoc($result_pendientes)) { ?>
                <button class="btn-pedido-94kj" data-pedido-id="<?php echo $pedido['numero_pedido']; ?>">
                    <?php echo $pedido['numero_pedido']; ?>
                </button>
            <?php } ?>
        </div>
<br>
        <h1>Pedidos Completados</h1>
<br>
        <!-- Lista de pedidos completados -->
        <div class="list-pedidos-27vs">
            <?php while ($pedido = mysqli_fetch_assoc($result_completados)) { ?>
                <button class="btn-pedido-94kj completado-9wpr" data-pedido-id="<?php echo $pedido['numero_pedido']; ?>">
                    <?php echo $pedido['numero_pedido']; ?>
                </button>
            <?php } ?>
        </div>
        <br>
        <!-- Modal para mostrar los detalles del pedido -->
        <div id="pedidoModal" class="modal-pd-d2kd">
            <div class="modal-content-84sy">
                <span class="close-btn-w12d">&times;</span>
                <h2>Detalles del Pedido</h2>
                <div id="pedidoDetalles"></div>
                <button id="finalizarPedido" class="finalizar-btn-v3sy" style="display: none;">Marcar como Completado</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    // Mostrar detalles del pedido cuando se hace clic en el número de pedido
    $('.btn-pedido-94kj').click(function() {
        var pedidoId = $(this).data('pedido-id');
        var isCompletado = $(this).hasClass('completado-9wpr');

        // Hacer una solicitud AJAX para obtener los detalles del pedido
        $.ajax({
            url: 'get_detalles_pedido.php',
            method: 'GET',
            data: { numero_pedido: pedidoId },
            success: function(response) {
                var datos = JSON.parse(response);
                var modal = $('#pedidoModal');
                var detalles = $('#pedidoDetalles');

                // Llenar el modal con los detalles del pedido
                detalles.html('<p><strong>Estado:</strong> ' + (datos.estatus === 'completado' ? 'Completado' : 'Pendiente') + '</p>' +
                              '<p><strong>Fecha:</strong> ' + datos.fecha_pedido + '</p>' +
                              '<p><strong>Hora:</strong> ' + datos.hora_pedido + '</p>' +
                              '<p><strong>Pedido N°:</strong> ' + datos.numero_pedido + '</p>' +
                              '<h3>Comidas:</h3>');

                datos.comidas.forEach(function(item) {
                    detalles.append('<p>' + item.nombre_comida + ' (Cantidad: ' + item.cantidad + ')<br>' +
                                    'Ingredientes excluidos: ' + item.ingredientes_excluidos + '</p>');
                });

                // Mostrar el botón de finalizar sólo si no es un pedido completado
                if (!isCompletado) {
                    $('#finalizarPedido').show();
                } else {
                    $('#finalizarPedido').hide();
                }

                // Mostrar el modal
                modal.show();

                // Marcar el pedido como finalizado
                $('#finalizarPedido').off('click').click(function() {
                    $.ajax({
                        url: 'finalizar_pedido.php',
                        method: 'POST',
                        data: { numero_pedido: pedidoId },
                        success: function() {
                            modal.hide();
                            location.reload(); // Recargar la página para ver la lista actualizada
                        }
                    });
                });
            }
        });
    });

    // Cerrar el modal
    $('.close-btn-w12d').click(function() {
        $('#pedidoModal').hide();
    });
});
    </script>
</body>
</html>
