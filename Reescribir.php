<?php
require "seguridad.php";

$id_usuario = addslashes($_POST["id"]);
$Nombre = addslashes($_POST["nombre"]);
$fecha_in = addslashes($_POST["fecha_in"]);
$telefono = addslashes($_POST["telefono"]);

// echo $id_usuario;
// echo $Nombres;
// echo $Apellidos;
// echo $Contrasenas;
// echo $emails;
// echo $fecha_nacs;

require "conexion.php";

$Reescribir = "UPDATE usuarios SET nombre = '$Nombre',  fecha_ingreso = '$fecha_in', telefono = '$telefono' WHERE id = '$id_usuario'";

$resultado = mysqli_query($conectar, $Reescribir);
if ($resultado) {
  echo '
	<script>
      alert("Se EDITARON correctamente");
      location.href = "ListaU.php?id='. $id_usuario .'";
    </script>
		';

} else {
  echo '
      <script>
        alert("Ha ocurrido un error al guardar los datos");
        window.history.go(-1);
        location.href = "EditarUsuario.php?id='. $id_usuario .'";

      </script>
    ';
}

?>