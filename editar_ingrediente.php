<?php
require "conexion.php";

if (isset($_POST['id'], $_POST['nombre_ingrediente'])) {
    $id = mysqli_real_escape_string($conectar, $_POST['id']);
    $nombre_ingrediente = mysqli_real_escape_string($conectar, $_POST['nombre_ingrediente']);
 
    // Inicializa la consulta SQL
    $sql = "";

    // Si se sube una imagen nueva
    if (!empty($_FILES['imagen']['name'])) {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_imagen = 'img/' . basename($nombre_imagen);

        // Verifica si la imagen se subió correctamente
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            $sql = "UPDATE ingredientes SET nombre_ingrediente='$nombre_ingrediente', ruta='$ruta_imagen' WHERE id='$id'";
        } else {
            echo "<script>
                    alert('Error al subir la imagen.');
                    window.location.href = 'menuA.php';
                  </script>";
            exit();
        }
    } else {
        // Actualiza sin cambiar la imagen
        $sql = "UPDATE ingredientes SET nombre_ingrediente='$nombre_ingrediente' WHERE id='$id'";
    }

    // Ejecutar la consulta
    if (mysqli_query($conectar, $sql)) {
        echo "<script>
                alert('ingredientes actualizado correctamente.');
                window.location.href = 'menuA.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar el ingredientes: " . mysqli_error($conectar) . "');
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