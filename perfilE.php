<?php
    include "seguridad.php";
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
  include "Menu_botonesE.php";
  ?>
  <br><br>
  <div class="ContPerfil">

<section class="datos">
    <h5>Datos del personal</h5>

    <?php
require "conexion.php";


$usuario = $_SESSION['usuario'];

$Recuperar = "SELECT * FROM usuarios INNER JOIN tipo_usuario ON usuarios.id_tipo1 = tipo_usuario.id_tipo WHERE correo = '$usuario'";
      $resultado = mysqli_query($conectar, $Recuperar);

      while ($fila = mysqli_fetch_assoc($resultado)) {

      ?>

      <p>ID:<?php echo $fila["id"] ;?> </p>
      <p>Nombre:<?php echo $fila["nombre"];?></p>
      <p>Nombre:<?php echo $fila["correo"];?></p>
      <p>Telefono:<?php echo  $fila["telefono"];?></p>
      <p>Fecha de ingreso:<?php echo $fila["fecha_ingreso"];?></p>
      <p>Rol:<?php echo $fila["tipo"];?></p>

    <?php
      }
      ?>


    </section>

    <br><br>
        <section class="cambiar_contra">
            
            <div class="form-container">
                <h5 id="CCntra">Cambiar Contraseña</h5><br>
                <form action="procesar_cambio_contrasenaA.php" method="POST">
                <label>al menos 8 carateres, incluye al menos una mayúscula y un número.</label><br>
                <label>Nueva contraseña:</label>
                <input type="password" id="contrasena1" name="nueva" pattern="^(?=.*[A-Z])(?=.*\d).{8,}$" 
    title="La contraseña debe al menos 8 caracteres, incluyendo al menos una mayúscula y un número."  required>
<button type="button" class="togglePassword" data-target="contrasena1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
        stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> 
        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> 
        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> 
    </svg>
</button>
<br>

<label for="confirmar">Confirmar nueva contraseña:</label>
<input type="password" id="contrasena2" name="confirmar" pattern="^(?=.*[A-Z])(?=.*\d).{8,}$" 
    title="La contraseña debe al menos 8 caracteres, incluyendo al menos una mayúscula y un número." required>
<button type="button" class="togglePassword" data-target="contrasena2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
        stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> 
        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> 
        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> 
    </svg>
</button>
<br>

<button class="cambiar" type="submit">Cambiar contraseña</button>

</form>

    </div>
    
</section>

</div>


<script>
document.querySelectorAll(".togglePassword").forEach(button => {
    button.addEventListener("click", function() {
        let passwordInput = document.getElementById(this.getAttribute("data-target"));
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
});
</script>
</body>
</html> 
