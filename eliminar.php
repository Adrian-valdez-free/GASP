<?php

require "conexion.php";

$id_usuario = $_GET['id'];

// Paso 1: Eliminar el registro
$eliminar = "DELETE FROM usuarios WHERE id = '$id_usuario'";
$Resultado = mysqli_query($conectar, $eliminar);

if ($Resultado) {
    // Paso 2: Reiniciar los IDs
    $reset_ids = "
        SET @num := 0;
        UPDATE usuarios SET id = @num := (@num+1);
        ALTER TABLE usuarios AUTO_INCREMENT = 1;
    ";

    // Ejecutar las consultas para reiniciar los IDs
    mysqli_multi_query($conectar, $reset_ids);

    // Esperar a que todas las consultas se completen
    while (mysqli_next_result($conectar)) {;}

    // Redirigir a la página de lista de usuarios
    header("location:ListaU.php");
} else {
    echo "No se pudo eliminar el registro";
}