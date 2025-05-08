<?php
require 'conexion.php';

if (isset($_POST['numero_pedido'])) {
    $numero_pedido = $_POST['numero_pedido'];

    // Marcar el pedido como finalizado
    $query = "UPDATE pedidos SET estado = 'completado' WHERE numero_pedido = '$numero_pedido'";
    mysqli_query($conectar, $query);

    echo 'Pedido marcado como finalizado';
}

mysqli_close($conectar);
?>
