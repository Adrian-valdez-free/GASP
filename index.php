<?php
  session_start();
  if (isset($_SESSION["autentificado"]) == "SI") { {
    header("Location: menu.php");
    exit();
  }

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
    <div class="encabezado">
        <div class="imagen">
            <img class="ima1" src="imagenes/logo.png" alt="">
        </div>
        <div class="titulo"><h1>El Chucho</h1></div>
    </div>
    <div class="login">
        <div class="login2">
            <h1 class="titulo2">LOGIN</h1>
            <form action="verificar.php" method="post">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="usuario">CORREO:</label>
                <input type="text" name="usuario" required><br><br>
                <label for="contrasena">CONTRASEÑA:</label>
                <input type="password" name="contrasena" id= "contrasena" required>
                <button type="button" id="togglePassword"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg></button>

                <br><br>
                <button class="boton1" type="submit">INICIAR SESION</button><br><br>
                <a href="registro_usuario.php">REGISTRAR USUARIO</a>
                <a href = "FormsRecuperar.php">Recuperar contraseña</a>
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