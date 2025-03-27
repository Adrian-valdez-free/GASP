<?php
    include "seguridad.php";
    require "conexion.php"
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
  ?>
  <br>
  <div class="Despligue">
  <h1>Lista de usuarios</h1>
  <br>
  <table>
	<tbody>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>correo</th>
			<th>telefono</th>
			<th>Eliminar</th>
		</tr>
    <?php

      $todos_datos = "SELECT * FROM usuarios WHERE id_tipo1 = 2";

    			$resultado = mysqli_query($conectar, $todos_datos);

			while ($fila = mysqli_fetch_assoc($resultado)) {
			?>
		<tr>

			<td><?php echo $fila["id"]; ?></td>
	    <td><?php echo $fila["nombre"]; ?></td>
      <td><?php echo $fila["correo"]; ?></td>
			<td><?php echo $fila["telefono"]; ?></td>
      <td><a href='#' onClick = "validar('eliminar.php?id=<?php echo $fila["id"]; ?>')"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
  <path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3"></path>
  <path d="M18 13.3l-6.3 -6.3"></path>
</svg></a></td>

     

      
     


			

		</tr>
	<?php
			}
	?>
	</tbody>
</table>
  </div>
  <script>
    function validar(url) {
			var eliminar = confirm("Realmente deseas ELIMINAR al usuario");
			if (eliminar == true) {
				window.location = url;
			}
		}
  </script>
</body>
</html>