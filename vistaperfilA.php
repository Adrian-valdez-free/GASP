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
   <div class="Perfil">
   <?php
    $id_usuario = $_GET['id'];

      $Recuperar = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
      $resultado = mysqli_query($conectar, $Recuperar);

      while ($fila = mysqli_fetch_assoc($resultado)) {

      ?>
   <h1>Perfil de <?php echo $fila["nombre"];?> </h1>
    <br><br>
    
<br>
<div class="LW">
      <p>ID:<?php echo $fila["id"] ;?> </p>
      <p>Nombre:<?php echo $fila["nombre"];?></p>
      <p>Correo:<?php echo  $fila["correo"];?></p>
      </div>
      <div class="RW">
      <p>telefono:<?php echo $fila["telefono"];?></p>
      <p>Fecha de ingreso:<?php echo $fila["fecha_ingreso"];?></p>
        </div>

    <?php
      }
      ?>
      </div>
</body>
</html>