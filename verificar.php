<?php
require "conexion.php";
session_start();

// Validar entrada
if (empty($_POST["usuario"]) || empty($_POST["contrasena"])) {
    echo '<script>alert("Debes llenar todos los campos"); location.href="index.php";</script>';
    exit();
}

$usuario = trim($_POST["usuario"]);
$contrasena = $_POST["contrasena"];

// Preparar consulta segura
$stmt = mysqli_prepare($conectar, "SELECT contrasena FROM usuarios WHERE correo = ?");
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Verificar si el usuario existe
if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Verificar la contraseña hasheada
    if (password_verify($contrasena, $hashed_password)) {
        $stmt = mysqli_prepare($conectar, "SELECT id_tipo1 FROM usuarios WHERE correo = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $id_tipo);
        mysqli_stmt_fetch($stmt);
        if ($id_tipo == 1){
        $_SESSION["usuario"] = $usuario;
        $_SESSION["autentificado"] = "SI";
        header("Location: menu.php");
        exit();
        }else{
            $_SESSION["usuario"] = $usuario;
            $_SESSION["autentificado"] = "SI";
            header("Location: menuA.php");
            exit();
        }
    }
}

// Si no coincide, mostrar mensaje de error
echo '<script>alert("Usuario o contraseña incorrectos"); location.href="index.php";</script>';

mysqli_stmt_close($stmt);
?>
