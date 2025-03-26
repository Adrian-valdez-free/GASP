<?php
require "conexion.php";

// Capturar los datos del formulario
$Fecha = $_POST['Fecha'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$tipo = $_POST['tipo'];


// Hashear la contraseña antes de almacenarla
$hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

// Verificar si el usuario ya existe
$verificar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
    <script>
    alert("Este usuario ya está registrado.");
    history.go(-1);
    </script>';
    exit();
}

// Insertar usuario en la base de datos
$stmt = mysqli_prepare($conectar, "INSERT INTO usuarios (fecha_ingreso, nombre, correo, telefono, contrasena, id_tipo1) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssss", $Fecha, $nombre, $correo, $telefono, $hashed_password, $tipo);

$query = mysqli_stmt_execute($stmt);

// Verificar si se guardó correctamente
if ($query) {
    echo '
    <script>
    alert("Datos guardados correctamente.");
    location.href="registro_usuario.php";
    </script>';
} else {
    echo '
    <script>
    alert("Error al guardar los datos.");
    location.href="registro_usuario.php";
    </script>';
}

mysqli_stmt_close($stmt);
?>

