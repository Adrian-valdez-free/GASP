<?php
require "conexion.php"; // Asegúrate de que esta conexión usa $conectar correctamente
session_start(); // Iniciar sesión si no está iniciada

// Obtener las contraseñas enviadas por el formulario
$nueva_contrasena = $_POST['nueva'];
$confirmar_contrasena = $_POST['confirmar'];
$usuario = $_SESSION['usuario'];

// Validar que ambas contraseñas coincidan
if ($nueva_contrasena !== $confirmar_contrasena) {
    echo "<script>alert('Las contraseñas no coinciden, intenta de nuevo'); location.href='perfilA.php';</script>";
    exit;
}

// Hashear la nueva contraseña con BCRYPT
$hashed_password = password_hash($confirmar_contrasena, PASSWORD_BCRYPT);

// Usar consultas preparadas para evitar inyecciones SQL
$actualizacion = "UPDATE usuarios SET contrasena = ? WHERE correo = ?";
$stmt = mysqli_prepare($conectar, $actualizacion);
mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $usuario);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Contraseña actualizada correctamente'); window.location.href='perfilA.php';</script>";
} else {
    echo "<script>alert('Error al actualizar la contraseña'); window.location.href='perfilA.php';</script>";
}

// Cerrar la consulta
mysqli_stmt_close($stmt);
?>

