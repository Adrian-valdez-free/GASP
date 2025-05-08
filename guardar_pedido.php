<?php
require 'conexion.php';

// Recibir los datos enviados desde el frontend (por ejemplo, con fetch o AJAX)
$data = json_decode(file_get_contents('php://input'), true);

$carrito = $data['carrito'];
$total = $data['total'];
$usuario_id = $data['usuario_id'];

// Generar un número de pedido único
$numero_pedido = 'PED' . strtoupper(bin2hex(random_bytes(4))); // Esto generará un código aleatorio como "PEDabcd1234"

// Guardar el pedido principal
$query_pedido = "INSERT INTO pedidos (numero_pedido, usuario_id, total, fecha_pedido) VALUES ('$numero_pedido', $usuario_id, $total, NOW())";
if (mysqli_query($conectar, $query_pedido)) {
    // Guardar los detalles del pedido
    foreach ($carrito as $item) {
        $nombre_comida = mysqli_real_escape_string($conectar, $item['nombre']);
        $cantidad = $item['cantidad'];
        $precio = $item['precio'];
        $ingredientes_excluidos = !empty($item['ingredientes']) ? implode(', ', array_map(fn($i) => $i['nombre'], $item['ingredientes'])) : 'Ninguno';
        $tipo = isset($item['esComplemento']) && $item['esComplemento'] ? 'complemento' : 'comida';

        $query_detalle = "INSERT INTO detalle_pedido (numero_pedido, nombre_comida, cantidad, precio, ingredientes_excluidos, tipo) 
                          VALUES ('$numero_pedido', '$nombre_comida', $cantidad, $precio, '$ingredientes_excluidos', '$tipo')";
        mysqli_query($conectar, $query_detalle);
    }

    // Redirigir al usuario a la página de confirmación
    echo json_encode(['status' => 'success', 'redirect' => 'confirmacion.php?numero_pedido=' . $numero_pedido]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al guardar el pedido.']);
}

mysqli_close($conectar);
?>
