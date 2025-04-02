<?php
require "conexion.php";

if (isset($_POST['id']) && isset($_POST['nombre_comida']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
    $id = mysqli_real_escape_string($conectar, $_POST['id']);
    $nombre_comida = mysqli_real_escape_string($conectar, $_POST['nombre_comida']);
    $descripcion = mysqli_real_escape_string($conectar, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conectar, $_POST['precio']);

    // Si se subió una nueva imagen, procesa el archivo
    if (!empty($_FILES['imagen']['name'])) {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_imagen = 'img/' . basename($nombre_imagen);

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Actualiza los datos, incluyendo la nueva ruta de imagen
            $sql = "UPDATE comidas SET nombre_comida='$nombre_comida', descripcion='$descripcion', precio='$precio', ruta='$ruta_imagen' WHERE id='$id'";
        } else {
            echo "<script>
                    alert('Error al subir la imagen.');
                    window.location.href = 'menuA.php';
                  </script>";
            exit();
        }
    } else {
        // Actualiza sin cambiar la imagen si no se sube una nueva
        $sql = "UPDATE comidas SET nombre_comida='$nombre_comida', descripcion='$descripcion', precio='$precio' WHERE id='$id'";
    }

    if (mysqli_query($conectar, $sql)) {
        echo "<script>
                alert('Comida actualizada correctamente');
                window.location.href = 'menuA.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar la comida: " . mysqli_error($conectar) . "');
                window.location.href = 'menuA.php';
              </script>";
    }

    mysqli_close($conectar);
} else {
    echo "<script>
            alert('Error: Datos incompletos');
            window.location.href = 'menuA.php';
          </script>";
}
?>
