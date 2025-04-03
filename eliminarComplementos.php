<?php 
include "conexion.php";
$id = $_GET ['id'];


$consulta = "DELETE FROM complementos WHERE id = '$id' ";
$resultado = mysqli_query($conectar, $consulta);

if ($resultado){
  echo "
  <script>
      alert('Datos eliminados');
      location.href= 'menuA.php';
  </script>
  "; 
}else{
  echo "
  <script>
      alert('No se pudo eliminar los datos');
      location.href= 'menuA.php';
  </script>
  "; 
}

?>