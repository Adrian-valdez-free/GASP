<?php
require('fpdf.php');
require 'conexion.php';

// Obtener el número de pedido desde la URL
$numero_pedido = isset($_GET['numero_pedido']) ? $_GET['numero_pedido'] : '';

// Verificar si el número de pedido está presente
if (empty($numero_pedido)) {
    die('Pedido no encontrado.');
}

// Obtener los detalles del pedido desde la base de datos
$query_pedido = "SELECT * FROM pedidos WHERE numero_pedido = '$numero_pedido' LIMIT 1";
$result_pedido = mysqli_query($conectar, $query_pedido);

if ($row_pedido = mysqli_fetch_assoc($result_pedido)) {
    // Separar fecha y hora
    $fecha_hora = $row_pedido['fecha_pedido'];
    $fecha = date('d-m-Y', strtotime($fecha_hora));
    $hora = date('H:i:s', strtotime($fecha_hora));

    // Generación del ticket en PDF
    $pdf = new FPDF('P', 'mm', array(80, 200)); // Tamaño personalizado
    $pdf->AddPage();
    $pdf->SetMargins(5, 5, 5); // Márgenes estrechos
    $pdf->SetFont('Arial', 'B', 12);

    // Logo y título
    $pdf->Image('imagenes/logo.png', 25, 5, 30); // Centrar logo
    $pdf->Ln(25); // Espacio debajo del logo
    $pdf->Cell(70, 5, 'El chucho', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(70, 5, 'Merida, Yucatan', 0, 1, 'C');
    $pdf->Cell(70, 5, 'Calle 28a #4213 x 42 y 44', 0, 1, 'C');
    $pdf->Cell(70, 5, 'Colonia Fracciomiento Chuburna', 0, 1, 'C');
    $pdf->Ln(5);

    // Fecha y hora separadas
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(70, 5, "Fecha: " . $fecha, 0, 1, 'L');
    $pdf->Cell(70, 5, "Hora: " . $hora, 0, 1, 'L');
    $pdf->Cell(70, 5, "Pedido N#: " . $numero_pedido, 0, 1, 'L');
    $pdf->Ln(5);

    // Encabezado para los detalles
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 5, 'Comida', 0, 0, 'L');
    $pdf->Cell(15, 5, 'Cantidad', 0, 0, 'C');
    $pdf->Cell(15, 5, 'Precio', 0, 1, 'R');
    $pdf->Ln(2);

    // Detalles del pedido
    $query_detalle = "SELECT * FROM detalle_pedido WHERE numero_pedido = '$numero_pedido'";
    $result_detalle = mysqli_query($conectar, $query_detalle);

    $pdf->SetFont('Arial', '', 10);
    while ($row_detalle = mysqli_fetch_assoc($result_detalle)) {
        $ingredientes_excluidos = !empty($row_detalle['ingredientes_excluidos']) ? $row_detalle['ingredientes_excluidos'] : 'Ninguno';
        $pdf->Cell(40, 5, $row_detalle['nombre_comida'], 0, 0, 'L');
        $pdf->Cell(15, 5, $row_detalle['cantidad'], 0, 0, 'C');
        $pdf->Cell(15, 5, "$" . number_format($row_detalle['precio'], 2), 0, 1, 'R');
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(70, 5, "Sin: " . $ingredientes_excluidos, 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);
    }

    // Total
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(70, 5, "Total: $" . number_format($row_pedido['total'], 2), 0, 1, 'R');
    $pdf->Ln(10);

    // Mensaje de agradecimiento
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(70, 5, 'Gracias por su compra!', 0, 1, 'C');

    // Limpiar el búfer de salida antes de generar el PDF
    ob_end_clean();

    // Generar y mostrar el PDF en el navegador
    $pdf->Output('D', 'ticket_' . $numero_pedido . '.pdf');
} else {
    die('Pedido no encontrado.');
}

mysqli_close($conectar);
?>
