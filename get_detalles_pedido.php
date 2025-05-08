<?php
require 'conexion.php';

if (isset($_GET['numero_pedido'])) {
    $numero_pedido = $_GET['numero_pedido'];

    // Obtener los detalles del pedido
    $query_pedido = "SELECT * FROM pedidos WHERE numero_pedido = '$numero_pedido' LIMIT 1";
    $result_pedido = mysqli_query($conectar, $query_pedido);
    $pedido = mysqli_fetch_assoc($result_pedido);

    // Separar la fecha y la hora
    $fecha_completa = $pedido['fecha_pedido'];
    $fecha_sola = date('Y-m-d', strtotime($fecha_completa)); // Solo la fecha
    $hora_sola = date('H:i:s', strtotime($fecha_completa)); // Solo la hora

    // Obtener los detalles de las comidas
    $query_detalles = "SELECT * FROM detalle_pedido WHERE numero_pedido = '$numero_pedido'";
    $result_detalles = mysqli_query($conectar, $query_detalles);

    $comidas = [];
    while ($detalle = mysqli_fetch_assoc($result_detalles)) {
        $comidas[] = [
            'nombre_comida' => $detalle['nombre_comida'],
            'cantidad' => $detalle['cantidad'],
            'ingredientes_excluidos' => $detalle['ingredientes_excluidos']
        ];
    }

    // Preparar los datos para enviar como respuesta JSON
    $response = [
        'fecha_pedido' => $fecha_sola,
        'hora_pedido' => $hora_sola,
        'numero_pedido' => $pedido['numero_pedido'],
        'estatus' => $pedido['estado'], // Incluyendo el estado
        'comidas' => $comidas
    ];

    echo json_encode($response);
}
?>
