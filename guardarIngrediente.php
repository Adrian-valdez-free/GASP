<?php
require "conexion.php";

$rutatemporal = $_FILES ['imagen'] ['tmp_name'];


$rutaservidor = 'fotos';
$nombreimagen = $_FILES ['imagen'] ['name'];
$rutadestino = $rutaservidor."/".$nombreimagen;


move_uploaded_file($rutatemporal,$rutadestino);


$nombre_ingrediente = $_POST ['nombre_ingrediente'];


$insertar = "INSERT INTO ingredientes (ruta, nombre_ingrediente) VALUES ('$rutadestino', '$nombre_ingrediente')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script> alert('datos guardados correctamente'); window.location.href='nuevacomida.php';</script>";
  
}
else{
  echo "<script> alert('no se guardaron tus datos'); window.location.href='nuevacomida.php';</script>";
}


?>