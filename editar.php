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
  include "Menu_botones.php";
  require 'conexion.php'
  ?>
   <br><br>
   <?php 
    require "conexion.php";

    $id_usuario = $_GET['id'];


    $Recuperar = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
    $resultado = mysqli_query($conectar, $Recuperar);

    
    $fila = mysqli_fetch_assoc($resultado)

    ?>
    
    <a class = "boton1" href = "ListaU.php?id=<?php echo $fila['id'];?>" >Ver lista de usuarios</a><br>
    <br>
    <div class="login2">
      <br>
   
  <h2>Perfil de <?php echo $fila["nombre"];?> </h2><br>

  <form method="post" action="Reescribir.php" id = "myform" onsubmit = "validarFormulario(event)" >

   <input type = "hidden" name = "id" value = "<?php echo $fila["id"];?>">

   <input type = "hidden" name = "correo" value = "<?php echo $fila["correo"];?>">

  <input type="text" name = "nombre" placeholder = "Escribe tu nombre" id = "nombre" value ="<?php echo $fila["nombre"];?>"><br><br>

  <input type = "telephone" name = "telefono" placeholder = "Número de celular" id = "telefono" value ="<?php echo $fila["telefono"];?>"><br><br>
    <label>No se puede modificar</label><br>
    <input type="text" name="usuario" placeholder="Correo Electrónico" id="email" value="<?php echo $fila["correo"];?>" disabled><br><br>


    <label class = "left">Fecha de ingreso</label><br>
    <input type="date" id="fecha" name="fecha_in"value ="<?php echo $fila["fecha_ingreso"];?>">
    <br><br>
     <button type="submit" name="Registro">Hacer cambios</button>

  
</form>
</div>
<script>
function validarFormulario(event) {
    event.preventDefault(); // Evita el envío automático

    let nombre = document.getElementById("nombre").value;
    let telefono = document.getElementById("telefono").value;
    let email = document.getElementById("email").value; // antes
    let fecha = document.getElementById("fecha").value;

    let mensajeError = "";

    if (nombre.trim() === "") {
        mensajeError += "El nombre es obligatorio.\n";
    }

    if (email.trim() === "" || !email.includes("@")) {
        mensajeError += "Ingrese un correo electrónico válido.\n";
    }

    if (telefono.trim() === "") {
        mensajeError += "El campo teléfono no puede estar vacío.\n";
    } 

    if (fecha === "") {
        mensajeError += "Ingrese su fecha de nacimiento.\n";
    }

    if (mensajeError) {
        alert(mensajeError);
    } else {
        document.getElementById("myform").submit(); // Envía el formulario si todo está correcto
    }
}

    </script>
</body>
</html>