<?php
require "conexion.php";

if (isset($_POST['id'], $_POST['nombre_complemento'], $_POST['descripcion'], $_POST['precio'])) {
    $id = mysqli_real_escape_string($conectar, $_POST['id']);
    $nombre_complemento = mysqli_real_escape_string($conectar, $_POST['nombre_complemento']);
    $descripcion = mysqli_real_escape_string($conectar, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conectar, $_POST['precio']);

    // Inicializa la consulta SQL
    $sql = "";

    // Si se sube una imagen nueva
    if (!empty($_FILES['imagen']['name'])) {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_imagen = 'fotos/' . basename($nombre_imagen);

        // Verifica si la imagen se subió correctamente
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            $sql = "UPDATE complementos SET nombre_complemento='$nombre_complemento', descripcion='$descripcion', precio='$precio', ruta='$ruta_imagen' WHERE id='$id'";
        } else {
            echo "<script>
                    alert('Error al subir la imagen.');
                    window.location.href = 'menuA.php';
                  </script>";
            exit();
        }
    } else {
        // Actualiza sin cambiar la imagen
        $sql = "UPDATE complementos SET nombre_complemento='$nombre_complemento', descripcion='$descripcion', precio='$precio' WHERE id='$id'";
    }

    // Ejecutar la consulta
    if (mysqli_query($conectar, $sql)) {
        echo "<script>
                alert('Complemento actualizado correctamente.');
                window.location.href = 'menuA.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar el complemento: " . mysqli_error($conectar) . "');
                window.location.href = 'menuA.php';
              </script>";
    }

    mysqli_close($conectar);
} else {
    echo "<script>
            alert('Error: Datos incompletos.');
            window.location.href = 'menuA.php';
          </script>";
}
?>
