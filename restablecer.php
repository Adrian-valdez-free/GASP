<?php
require "conexion.php";

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar si el token es válido y no ha expirado
    $consulta = "SELECT * FROM usuarios WHERE token_recuperacion = ? AND expira_token > NOW() LIMIT 1";
    $stmt = mysqli_prepare($conectar, $consulta);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nueva_contrasena = $_POST['nueva_contrasena'];

            // Hashear la nueva contraseña antes de guardarla
            $hash = password_hash($nueva_contrasena, PASSWORD_BCRYPT);

            // Actualizar la contraseña y eliminar el token
            $sql = "UPDATE usuarios SET contrasena = ?, token_recuperacion = NULL, expira_token = NULL WHERE token_recuperacion = ?";
            $stmt = mysqli_prepare($conectar, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $hash, $token);
            mysqli_stmt_execute($stmt);

            echo "<script>alert('Contraseña restablecida correctamente.'); location.href='index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Token inválido o expirado.'); location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Token no proporcionado.'); location.href='index.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Chucho</title>
    <link rel="stylesheet" href="diseño1.css">
</head>
<body>

    <?php 
    include "encabezado.php";
    ?>

    <div class="panel1">
        <br><br>
        

        <h1>Nueva Contraseña</h1><br><br>

        <div class="panel2">
            <h3>* Campos obligatorios</h3><br><br>
            <form method="post">
                <label>al menos 8 carateres, incluye al menos una mayúscula y un número.</label>
                <br><br>
                <label for="">Nueva contraseña<span>*</span> :</label>&nbsp;&nbsp;
                <input 
                    type="password" 
                    name="nueva_contrasena" 
                    id= "contrasena"
                    pattern="^(?=.*[A-Z])(?=.*\d).{8,}$" 
                    title="La contraseña debe al menos 8 caracteres, incluyendo al menos una mayúscula y un número." 
                    required
                >
                <button type="button" id="togglePassword"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg></button>
                <br><br>

                <button type="submit" class="boton1" >Modificar</button>

                <br><br>
            </form>
        </div>
    </div>
    <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        let passwordInput = document.getElementById("contrasena");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="0.75"> <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4"></path> <path d="M3 15l2.5 -3.8"></path> <path d="M21 14.976l-2.492 -3.776"></path> <path d="M9 17l.5 -4"></path> <path d="M15 17l-.5 -4"></path> </svg> `; // Cambia el icono a ocultar
        } else {
            passwordInput.type = "password";
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg> `; // Cambia el icono a mostrar
        }
    });
</script>
</body>
</html>