<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "Restaurante_Chucho";

$conectar = mysqli_connect($host, $usuario, $contrasena, $basedatos);

if (!$conectar) {
  echo "No se pudo conectar con el servidor";
}