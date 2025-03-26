<?php
require "conexion.php";

$rutatemporal = $_FILES ['imagen'] ['tmp_name'];


$rutaservidor = 'fotos';
$nombreimagen = $_FILES ['imagen'] ['name'];
$rutadestino = $rutaservidor."/".$nombreimagen;


move_uploaded_file($rutatemporal,$rutadestino);


$nombre_complemento = $_POST ['nombre_complemento'];
$descripcion = $_POST ['descripcion'];
$precio = $_POST ['precio'];

$insertar = "INSERT INTO complementos (ruta, nombre_complemento, descripcion, precio) VALUES ('$rutadestino', '$nombre_complemento', '$descripcion','$precio')";

$query = mysqli_query($conectar, $insertar);

if($query){
  echo "<script> alert('datos guardados correctamente'); window.location.href='nuevacomida.php';</script>";
  
}
else{
  echo "<script> alert('no se guardaron tus datos'); window.location.href='nuevacomida.php';</script>";
}


?>